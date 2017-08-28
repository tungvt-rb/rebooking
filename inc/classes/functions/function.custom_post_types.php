<?php

// register custom post types

register_post_type('newsletter',
	array(
		'labels' => array(
			'name' => __( 'Newsletter' ),
			'singular_name' => __( 'Newsletter' ),
			'add_new' => __( 'Add New Newsletter' ),
			'add_new_item' => __( 'Add New Newsletter' ),
			'edit_item' => __( 'Edit Newsletter' ),
			'new_item' => __( 'New Newsletter' ),
			'view_item' => __( 'View Newsletter' ),
			'search_items' => __( 'Search Newsletter' ),
			'not_found' => __( 'No newsletter found' ),
			'not_found_in_trash' => __( 'No newsletter found in Trash' ),
		),
		'public' => true,
		'show_ui' => true,
		//'menu_icon' => $this->templateURL . '/images/member.png',
		'has_archive' => true,
		'rewrite' => array('slug' => 'newsletter'),
		'menu_position' => 5,
		'supports' => array(
			'title',
			'excerpt',
			'editor',
		),
	)
);

register_post_type('property',
	array(
		'labels' => array(
			'name' => __( 'Property' ),
			'singular_name' => __( 'Property' ),
			'add_new' => __( 'Add New Property' ),
			'add_new_item' => __( 'Add New Property' ),
			'edit_item' => __( 'Edit Property' ),
			'new_item' => __( 'New Property' ),
			'view_item' => __( 'View Property' ),
			'search_items' => __( 'Search Property' ),
			'not_found' => __( 'No Property found' ),
			'not_found_in_trash' => __( 'No Property found in Trash' ),
		),
		'public' => true,
		'show_ui' => true,
		//'menu_icon' => $this->templateURL . '/images/member.png',
		'has_archive' => true,
		'rewrite' => array('slug' => 'property'),
		'menu_position' => 6,
		'supports' => array('title','excerpt','editor','thumbnail','page-attributes','author'),
	)
);
register_taxonomy('property-category', 'property',
	array(
		'labels' => array(
			'name'							=> _x( 'Categories', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'					=> _x( 'Category', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'						=> __( 'Categories', 'text_domain' ),
			'all_items'						=> __( 'All Categories', 'text_domain' ),
			'parent_item'					=> __( 'Parent Category', 'text_domain' ),
			'parent_item_colon'				=> __( 'Parent Category:', 'text_domain' ),
			'new_item_name'					=> __( 'New Category Name', 'text_domain' ),
			'add_new_item'					=> __( 'Add New Category', 'text_domain' ),
			'edit_item'						=> __( 'Edit Category', 'text_domain' ),
			'update_item'					=> __( 'Update Category', 'text_domain' ),
			'separate_items_with_commas'	=> __( 'Separate categories with commas', 'text_domain' ),
			'search_items'					=> __( 'Search categories', 'text_domain' ),
			'add_or_remove_items'			=> __( 'Add or remove categories', 'text_domain' ),
			'choose_from_most_used'			=> __( 'Choose from the most used categories', 'text_domain' ),
		),
		'public' => true,
		'show_in_admin_column' => true,
		'hierarchical' => true,
	)
);