<?php

class REBooking
{
	var $themeMods;
	var $templateURL;
	var $imageSizes = array(
        'vr_60x60' => array(
            'label' => 'Fixed Size 60x60 px',
            'width' => 60,
            'height' => 60,
            'crop' => true,
        )
	);

	function __construct() {
		$this->templateURL = get_bloginfo('template_url');
		$this->themeMods = get_theme_mods();
		
		// Setup Option Tree
		add_filter('ot_show_pages', '__return_false');
		add_filter('ot_show_new_layout', '__return_false');
		add_filter('ot_theme_mode', '__return_true');
		load_template( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

		// Theme Support & thumbnail sizes
		add_theme_support('post-thumbnails');
		foreach ($this->imageSizes as $type=>$details)
		{
			add_image_size($type, $details['width'], $details['height'], $details['crop']);
		}
		add_filter('image_size_names_choose', array(&$this, 'image_size_names_choose'));

		// Actions
		add_action('init', array(&$this, 'init'));
		add_action('widgets_init', array(&$this, 'widgets_init'));
		add_action('tgmpa_register', array(&$this, 'register_required_plugins'));
		add_action('wp_enqueue_scripts', array(&$this, 'wp_enqueue_scripts'));
		add_action('pre_get_posts', array(&$this, 'advanced_search_query'));
		
		// Filters
		add_filter('the_excerpt_rss', array(&$this, 'the_excerpt_rss'));
		add_filter('query_vars', array(&$this, 'register_query_vars'));
		add_filter('pre_get_posts', array(&$this, 'set_pre_get_posts'));

		//AJAX
		add_action('wp_ajax_reb_request_showing', array(&$this, 'submit_request_showing'));
		add_action('wp_ajax_nopriv_reb_request_showing', array(&$this, 'submit_request_showing'));
		add_action('wp_ajax_reb_secure_image', array(&$this, 'secure_image'));
		add_action('wp_ajax_nopriv_reb_secure_image', array(&$this, 'secure_image'));
	}

	function image_size_names_choose($sizes) {
		foreach ($this->imageSizes as $type=>$details)
		{
			$sizes[$type] = $details['label'];
		}
		return $sizes;
	}

	function init() {
		require_once ( TEMPLATEPATH . '/inc/classes/functions/function.custom_post_types.php' );
	}

	function widgets_init()	{
		require_once ( TEMPLATEPATH . '/inc/classes/functions/function.menu_widgets.php' );
	}

	function wp_enqueue_scripts() {
		require_once ( TEMPLATEPATH . '/inc/classes/functions/function.scripts.php' );
	}

	function register_required_plugins() {
		$plugins = array(
			array(
				'name'					=> 'Polylang', // The plugin name.
				'slug'					=> 'polylang', // The plugin slug (typically the folder name).
				'source'				=> 'https://downloads.wordpress.org/plugin/polylang.2.2.3.zip', // The plugin source.
				'required'				=> true, // If false, the plugin is only 'recommended' instead of required.
				'version'				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
				'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'			=> '', // If set, overrides default API URL and points to an external URL.
				'is_callable'			=> '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),
			array(
				'name'					=> 'Category and Taxonomy Image', // The plugin name.
				'slug'					=> 'wp-custom-taxonomy-image', // The plugin slug (typically the folder name).
				'source'				=> 'https://downloads.wordpress.org/plugin/wp-custom-taxonomy-image.zip', // The plugin source.
				'required'				=> true, // If false, the plugin is only 'recommended' instead of required.
				'version'				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
				'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation'	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'			=> '', // If set, overrides default API URL and points to an external URL.
				'is_callable'			=> '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),
		);

		$config = array(
			'id'				=> 'test',					// Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path'		=> '',						// Default absolute path to bundled plugins.
			'menu'				=> 'tgmpa-install-plugins', // Menu slug.
			'has_notices'		=> true,					// Show admin notices or not.
			'dismissable'		=> true,					// If false, a user cannot dismiss the nag message.
			'dismiss_msg'		=> '',						// If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic'		=> false,					// Automatically activate plugins after installation or not.
			'message'			=> '',
		);

		tgmpa( $plugins, $config );
	}

	function set_pre_get_posts($query) {
		if ( !is_admin() && ( is_tax() || is_archive() || is_search() ) ) {
			$query->set( 'paged', ( get_query_var('paged') ) ? get_query_var('paged') : 1 );
		}
		return $query;
	}

	function pagination($pages = '', $range = 4) {
		require_once ( TEMPLATEPATH . '/inc/classes/functions/function.pagination.php' );
	}

	function advanced_search_query($query) {
		require_once ( TEMPLATEPATH . '/inc/classes/functions/function.advanced_search.php' );
	}

	function register_query_vars($vars) {
		$vars[] = 'min_price';
		$vars[] = 'max_price';
		$vars[] = 'bedrooms';
		$vars[] = 'bathrooms';
		$vars[] = 'location';

		return $vars;
	}

	function secure_image() {
		require_once ( TEMPLATEPATH . '/inc/classes/functions/function.secureimage.php' );
	}

	function submit_request_showing() {
		require_once ( TEMPLATEPATH . '/inc/classes/functions/forms/function.request_showing.php' );
	}

	function the_excerpt_rss($content, $totalWords=30) {
		$aWords = explode(' ', $content);
		$aWordsNew = array_slice($aWords, 0, $totalWords);
		return implode(' ', $aWordsNew) . '...';
	}

	function getSlider($postID) {
		$slider = get_post_meta($postID, 'slider', true);
		if (!empty($slider))
			$slides = unserialize($slider);

		if (!$slides)
			$slides = array();

		require_once(TEMPLATEPATH . '/inc/slider.php');
	}
}