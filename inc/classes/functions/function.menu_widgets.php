<?php

// register menus, sidebars
register_nav_menu('top-menu', 'Top Menu');
register_nav_menu('main-menu', 'Main Menu');
register_nav_menu('switcher-menu', 'Switcher Menu');
register_nav_menu('toggle-menu', 'Toggle Menu');

//footer
register_sidebar(array(
	'name' => __( 'Footer','sass'),
	'id' => 'footer',
	'description' => __( 'Widgets in this area are used on the footer if enabled.','sass' ),
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h4>',
	'after_title' => '</h4>',
));

//default
register_sidebar(array(
	'name' => 'Default Sidebar',
	'id' => 'default-sidebar',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="title">',
	'after_title' => '</h3>',
));

//register widgets
require_once ( TEMPLATEPATH . '/inc/classes/functions/widgets/widget.show_businessman.php' );
