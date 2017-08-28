<?php

class REBookingAdmin
{
	var $templateURL;
	var $postFields = array(
        'huong' => 'text',
        'dien_tich_dat' => 'text',
        'dien_tich_xay_dung' => 'text',
        'vi_tri' => 'text',
        'tien_do_thanh_toan' => 'text',
        'gia' => 'text',
        'status' => 'text',
    );
	
	function __construct()
	{
		$this->templateURL = get_bloginfo('template_url');
		
		add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));
		add_action('add_meta_boxes', array(&$this, 'add_meta_boxes'));
    	add_action('save_post', array(&$this, 'save_post'));

		// add column to posts screen
		add_filter('manage_du-an_posts_columns', array(&$this, 'manage_duan_posts_columns'));
		add_action('manage_du-an_posts_custom_column', array(&$this, 'manage_duan_posts_custom_column'), 1, 2);
	}

	function admin_enqueue_scripts()
    {
        global $hook_suffix;
        wp_enqueue_script('jquery');
        if (in_array($hook_suffix, array('post.php', 'post-new.php'))) {
            wp_enqueue_script('post_js', $this->templateURL . '/assets/js/admin.post.js', array('jquery'), false, true);
        }
    }

    function add_meta_boxes()
    {
        add_meta_box('vr_slider', 'Slider Images', array(&$this, 'metabox_slider'), 'post', 'normal', 'high');
        add_meta_box('vr_slider', 'Slider Images', array(&$this, 'metabox_slider'), 'page', 'normal', 'high');
    }

    function metabox_slider($post)
    {
        $slider = get_post_meta($post->ID, 'slider', true);
        if (!empty($slider))
        	$slides = unserialize($slider);
        if (!isset($slides['image']))
            $slides = false;
        require_once(TEMPLATEPATH . '/inc/metabox_slider.php');
    }

    function post_options($post) 
    {
        foreach ($this->postFields as $field=>$type)
        {
            $$field = get_post_meta($post->ID, $field, true);
        }
        require_once(TEMPLATEPATH . '/inc/post_options.php');
    }

    function save_post($post_id)
    {
    	if ( (defined( 'DOING_AUTOSAVE' ) AND DOING_AUTOSAVE)
            OR !current_user_can( 'edit_post', $post_id ) ) return;

        $aPostTypes = array(
            'post',
        );
        
        foreach ($aPostTypes as $postType)
        {
            if ( !wp_is_post_revision( $post_id ) AND ($_POST['post_type'] == $postType) ) {
                foreach ($this->{$postType."Fields"} as $field=>$type) {
                    if ($type=='checkbox') {
                        update_post_meta($post_id, $field, isset($_POST[$field]) ? trim($_POST[$field]) : '');
                    } else {
                        if (isset($_POST[$field])) {
                            update_post_meta($post_id, $field, stripslashes(trim($_POST[$field])));
                        }
                    }
                }
            }
        }
            
        if ( !wp_is_post_revision( $post_id ) AND ($_POST['post_type'] == 'page') ) {
            update_post_meta($post_id, 'slider', isset($_POST['slider']) ? serialize($_POST['slider']) : null);
        }
        if ( !wp_is_post_revision( $post_id ) AND ($_POST['post_type'] == 'post') ) {
            update_post_meta($post_id, 'slider', isset($_POST['slider']) ? serialize($_POST['slider']) : null);
        }
    }
}