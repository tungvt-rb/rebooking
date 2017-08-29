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

	function __construct()
	{
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
		add_action('wp_enqueue_scripts', array(&$this, 'wp_enqueue_scripts'));
		add_action('pre_get_posts', array(&$this, 'advanced_search_query'));
		
		// Filters
		add_filter('the_excerpt_rss', array(&$this, 'the_excerpt_rss'));
		add_filter('query_vars', array(&$this, 'register_query_vars'));

		//Newsletter
		add_action('wp_ajax_vr_contact', array(&$this, 'submit_contact'));
		add_action('wp_ajax_nopriv_vr_contact', array(&$this, 'submit_contact'));

	}

	function image_size_names_choose($sizes)
	{
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

	function the_excerpt_rss($content, $totalWords=30)
	{
		$aWords = explode(' ', $content);
		$aWordsNew = array_slice($aWords, 0, $totalWords);
		return implode(' ', $aWordsNew) . '...';
	}

	function getSlider($postID)
	{
		$slider = get_post_meta($postID, 'slider', true);
		if (!empty($slider))
			$slides = unserialize($slider);

		if (!$slides)
			$slides = array();

		require_once(TEMPLATEPATH . '/inc/slider.php');
	}

	function submit_contact()
	{
		$email = isset($_POST['email']) ? trim($_POST['email']) : '';
		$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
		$name = isset($_POST['name']) ? trim($_POST['name']) : '';
		$errors = array();
		
		if (empty($phone)) $errors['phone'] = 'Bạn cần nhập số điện thoại.';
		if (empty($name)) $errors['name'] = 'Bạn cần nhập họ tên.';
		if (empty($email)) $errors['email'] = 'Bạn cần nhập địa chỉ email.';
		elseif (!is_email($email)) $errors['email'] = 'Địa chỉ email sai. Hãy nhập lại.';

		if (sizeof($errors)) {
			echo json_encode(array(
				'status' => 'FAILED',
				'errors' => $errors
			));
		} else {
			// send mail
			$subject 		= 'Gửi từ [' . get_bloginfo('name') . ']';
			$content 		= "Name: $name" . "\n";
			$content 		.= "Phone: $phone" . "\n";
			$content 		.= "Email: $email" . "\n";
			$content 		.= "Dự án quan tâm: $subject" . "\n";
			$content 		.= "Message:" . "\n"
								. '----------------------------------------' . "\n"
								. stripslashes($message) . "\n"
								. '----------------------------------------' . "\n"
								. "\n";
			$content 		.= "Tin nhắn này được gửi từ trang " . get_bloginfo('home');
			$to 			= 'tungvt1611@gmail.com';
			$headers 		= 'From: webmaster@example.com' . "\r\n" .
								'Reply-To: webmaster@example.com' . "\r\n" .
								'X-Mailer: PHP/' . phpversion();
			//mail($to, $subject, $content, $headers);

			// insert post
			$postID = wp_insert_post(array(
				'comment_status' => 'closed',
				'ping_status' => 'open',
				'post_content' => $content,
				'post_status' => 'private',
				'post_title' => $name . '[Contact Page]',
				'post_type' => 'newsletter',
				'post_excerpt' => $content,
			));

			if ($postID) {

				echo json_encode(array(
					'status' => 'SUCCESS',
					'body' => '<div class="success">' . vrOptionTree('thankyou_message', '', 0) . '</div>',
				));

			} else {
				echo json_encode(array(
					'status' => 'FAILED',
					'errors' => 'Error occured while submitting your story. Please try again later.',
				));
			}

		}
		exit();
	}	

	function get_posts_grid()
	{
		$foo = new WP_Query(array(
			'order' => 'DESC',
		));
		require_once(TEMPLATEPATH . '/inc/posts_grid.php');
		wp_reset_query();
	}

}