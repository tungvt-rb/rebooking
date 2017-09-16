<?php

wp_enqueue_script('jquery');
$jsObject = array(
	'ajaxurl'		=> admin_url('admin-ajax.php'),
	'baseurl'		=> get_bloginfo('wpurl'),
	'is_landing'	=> is_page_template('template-landing.php'),
	'is_blog'		=> is_page_template('template-blog.php'),
	'is_singular'	=> is_singular('property'),
);

wp_localize_script('jquery', 'vr', $jsObject);

wp_enqueue_script('bxslider', $this->templateURL . '/assets/js/jquery.bxslider.min.js', array('jquery'), false, true);
wp_enqueue_script('simpleWeather', $this->templateURL . '/assets/js/jquery.simpleWeather.min.js', array('jquery'), false, true);
wp_enqueue_script('fn', $this->templateURL . '/assets/js/fn.js', array('jquery'), false, true);

if ( $jsObject['is_singular'] ) {
	wp_enqueue_style( 'style-bxslider', $this->templateURL . '/assets/css/jquery.bxslider.min.css');
}