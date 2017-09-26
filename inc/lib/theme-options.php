<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
	/**
	* Get a copy of the saved settings array. 
	*/
	$saved_settings = get_option( 'option_tree_settings', array() );

	/**
	* Custom settings array that will eventually be 
	* passes to the OptionTree Settings API Class.
	*/
	$custom_settings = array(
		'contextual_help' 	=> array( 
			'sidebar'			=> ''
		),
		'sections'			=> array( 
			array(
				'id'			=> 'general_default',
				'title'			=> 'General'
			),
			array(
				'id'			=> 'contact_settings',
				'title'			=> 'Contact Settings'
			),
			array(
				'id'			=> 'footer_settings',
				'title'			=> 'Footer Settings'
			),
		),
		'settings'			=> array(
			array(
				'id'			=> 'vr_logo_url',
				'label'			=> 'Logo',
				'desc'			=> '',
				'std'			=> '',
				'type'			=> 'upload',
				'section'		=> 'general_default',
				'rows'			=> '',
				'post_type'		=> '',
				'taxonomy'		=> '',
				'class'			=> ''
			),
			array(
				'id'			=> 'vr_contact_email',
				'label'			=> 'Contact Email',
				'desc'			=> '',
				'std'			=> '',
				'type'			=> 'text',
				'section'		=> 'contact_settings',
				'rows'			=> '',
				'post_type'		=> '',
				'taxonomy'		=> '',
				'class'			=> ''
			),
			array(
				'id'			=> 'vr_thankyou_message',
				'label'			=> 'Thanks message',
				'desc'			=> '',
				'std'			=> '',
				'type'			=> 'textarea',
				'section'		=> 'contact_settings',
				'rows'			=> '',
				'post_type'		=> '',
				'taxonomy'		=> '',
				'class'			=> ''
			),
			array(
				'id'			=> 'vr_copyright_footer',
				'label'			=> 'Copyright text footer',
				'desc'			=> '',
				'std'			=> '',
				'type'			=> 'textarea',
				'section'		=> 'footer_settings',
				'rows'			=> '',
				'post_type'		=> '',
				'taxonomy'		=> '',
				'class'			=> ''
			),
		),
	);

	/* allow settings to be filtered before saving */
	$custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );

	/* settings are not the same update the DB */
	if ( $saved_settings !== $custom_settings ) {
		update_option( 'option_tree_settings', $custom_settings ); 
	}

	/* Settings for Page, Post, CPT */
	$meta_args_array = array(
		array(
			'id'			=> 'page_settings',
			'title'			=> 'Page Settings',
			'pages'			=> array( 'page' ),
			'context'		=> 'normal',
			'priority'		=> 'high',
			'fields'		=> array(
				// array(
				// 	'label'			=> 'Tin hiện thị trên mỗi trang con.',
				// 	'id'			=> 'danhmuc_newsonpage',
				// 	'type'			=> 'category-select',
				// 	'desc'			=> 'Lựa chọn danh mục tin tức hiển thị trên từng trang con.',
				// 	'taxonomy'		=> 'category',
				// 	'std'			=> 'standard'
				// ),
				// array(
				// 	'id'			=> 'page_gallery',
				// 	'label'			=> __( 'Gallery', 'text-domain' ),
				// 	'desc'			=> __( 'Your description', 'text-domain' ),
				// 	'type'			=> 'gallery',
				// )
			)
		),
		array(
			'id'			=> 'businessman_detail',
			'title'			=> 'Businessman Details',
			'pages'			=> array( 'businessman' ),
			'context'		=> 'side',
			'priority'		=> 'core',
			'fields'		=> array(
				array(
					'id'			=> 'businessman_mobile',
					'label'			=> __( 'Mobile', 'text-domain' ),
					'desc'			=> __( 'mobile', 'text-domain' ),
					'type'			=> 'text',
				),
				array(
					'id'			=> 'businessman_email',
					'label'			=> __( 'Email', 'text-domain' ),
					'desc'			=> __( 'email', 'text-domain' ),
					'type'			=> 'text',
				),
				array(
					'id'			=> 'businessman_notes',
					'label'			=> __( 'Notes', 'text-domain' ),
					'desc'			=> __( 'like eng. speaking or somethings...', 'text-domain' ),
					'type'			=> 'text',
				),
			),
		),
		array(
			'id'			=> 'property_option',
			'title'			=> 'Property Options',
			'pages'			=> array( 'property' ),
			'context'		=> 'side',
			'priority'		=> 'core',
			'fields'		=> array(
				array(
					'id'			=> 'property_price',
					'label'			=> __( 'Price', 'text-domain' ),
					'desc'			=> __( '$/month', 'text-domain' ),
					'type'			=> 'text',
				),
				array(
					'id'			=> 'property_area',
					'label'			=> __( 'Listing area', 'text-domain' ),
					'desc'			=> __( 'Listing area', 'text-domain' ),
					'type'			=> 'text',
				),
				array(
					'id'			=> 'property_builtin',
					'label'			=> __( 'Built in', 'text-domain' ),
					'desc'			=> __( 'Built in', 'text-domain' ),
					'type'			=> 'text',
				),
				array(
					'id'			=> 'property_floor',
					'label'			=> __( 'Number floor', 'text-domain' ),
					'desc'			=> __( 'Number floor of house', 'text-domain' ),
					'type'			=> 'text',
				),
				array(
					'id'			=> 'property_bedroom',
					'label'			=> __( 'Bedroom', 'text-domain' ),
					'desc'			=> __( 'Number bedroom', 'text-domain' ),
					'type'			=> 'select',
					'choices'		=> array( 
						array(
							'value'		=> '1',
							'label'		=> __( '1', 'text-domain' ),
						),
						array(
							'value'		=> '2',
							'label'		=> __( '2', 'text-domain' ),
						),
						array(
							'value'		=> '3',
							'label'		=> __( '3', 'text-domain' ),
						),
						array(
							'value'		=> '4',
							'label'		=> __( '4', 'text-domain' ),
						),
						array(
							'value'		=> '5',
							'label'		=> __( '5', 'text-domain' ),
						),
					)
				),
				array(
					'id'			=> 'property_bathroom',
					'label'			=> __( 'Bathroom', 'text-domain' ),
					'desc'			=> __( 'Number bathroom', 'text-domain' ),
					'type'			=> 'select',
					'choices'		=> array( 
						array(
							'value'		=> '1',
							'label'		=> __( '1', 'text-domain' ),
						),
						array(
							'value'		=> '2',
							'label'		=> __( '2', 'text-domain' ),
						),
						array(
							'value'		=> '3',
							'label'		=> __( '3', 'text-domain' ),
						),
						array(
							'value'		=> '4',
							'label'		=> __( '4', 'text-domain' ),
						),
						array(
							'value'		=> '5',
							'label'		=> __( '5', 'text-domain' ),
						),
					)
				),
				array(
					'id'			=> 'property_bathroom_type',
					'label'			=> __( 'Bathroom Type', 'text-domain' ),
					'desc'			=> __( 'Types of bathrooms', 'text-domain' ),
					'type'			=> 'select',
					'choices'		=> array(
						array(
							'value'		=> 'None',
							'label'		=> __( 'None', 'text-domain' ),
						),
						array(
							'value'		=> 'Shower cabin',
							'label'		=> __( 'Shower cabin', 'text-domain' ),
						),
						array(
							'value'		=> 'Bathtub & Shower',
							'label'		=> __( 'Bathtub & Shower', 'text-domain' ),
						)
					)
				),
				array(
					'id'			=> 'property_furnished',
					'label'			=> __( 'Furnished', 'text-domain' ),
					'desc'			=> __( 'Furnished', 'text-domain' ),
					'type'			=> 'select',
					'choices'		=> array( 
						array(
							'value'		=> 'None',
							'label'		=> __( 'None', 'text-domain' ),
						),
						array(
							'value'		=> 'Fully',
							'label'		=> __( 'Fully', 'text-domain' ),
						),
						array(
							'value'		=> 'Semi',
							'label'		=> __( 'Semi', 'text-domain' ),
						),
					)
				),
				array(
					'id'			=> 'property_equipped',
					'label'			=> __( 'Equipped', 'text-domain' ),
					'desc'			=> __( 'Equipped', 'text-domain' ),
					'type'			=> 'select',
					'choices'		=> array( 
						array(
							'value'		=> 'None',
							'label'		=> __( 'None', 'text-domain' ),
						),
						array(
							'value'		=> 'Fully',
							'label'		=> __( 'Fully', 'text-domain' ),
						),
						array(
							'value'		=> 'Semi',
							'label'		=> __( 'Semi', 'text-domain' ),
						),
					)
				),
				array(
					'id'			=> 'property_balcony',
					'label'			=> __( 'Balcony', 'text-domain' ),
					'desc'			=> __( 'Balcony and Garden', 'text-domain' ),
					'type'			=> 'select',
					'choices'		=> array( 
						array(
							'value'		=> 'None',
							'label'		=> __( 'None', 'text-domain' ),
						),
						array(
							'value'		=> 'Balcony',
							'label'		=> __( 'Balcony', 'text-domain' ),
						),
						array(
							'value'		=> 'Garden',
							'label'		=> __( 'Garden', 'text-domain' ),
						),
						array(
							'value'		=> 'Garden & Balcony',
							'label'		=> __( 'Garden & Balcony', 'text-domain' ),
						),
					)
				),
				array(
					'id'			=> 'property_location',
					'label'			=> __( 'Location', 'text-domain' ),
					'desc'			=> __( 'Location', 'text-domain' ),
					'type'			=> 'select',
					'choices'		=> array( 
						array(
							'value'		=> 'Location',
							'label'		=> __( 'Location', 'text-domain' ),
						),
						array(
							'value'		=> 'Tay Ho',
							'label'		=> __( 'Tay Ho', 'text-domain' ),
						),
						array(
							'value'		=> 'Ciputra',
							'label'		=> __( 'Ciputra', 'text-domain' ),
						),
						array(
							'value'		=> 'Ba Dinh',
							'label'		=> __( 'Ba Dinh', 'text-domain' ),
						),
						array(
							'value'		=> 'Cau Giay',
							'label'		=> __( 'Cau Giay', 'text-domain' ),
						),
						array(
							'value'		=> 'Hoan Kiem',
							'label'		=> __( 'Hoan Kiem', 'text-domain' ),
						),
						array(
							'value'		=> 'Hai Ba Trung',
							'label'		=> __( 'Hai Ba Trung', 'text-domain' ),
						),
						array(
							'value'		=> 'Dong Da',
							'label'		=> __( 'Dong Da', 'text-domain' ),
						),
						array(
							'value'		=> 'Gia Lam',
							'label'		=> __( 'Gia Lam', 'text-domain' ),
						),
						array(
							'value'		=> 'Hoang Mai',
							'label'		=> __( 'Hoang Mai', 'text-domain' ),
						),
						array(
							'value'		=> 'Thanh Xuan',
							'label'		=> __( 'Thanh Xuan', 'text-domain' ),
						),
						array(
							'value'		=> 'Long Bien',
							'label'		=> __( 'Long Bien', 'text-domain' ),
						),
					)
				),
			),
		),
		array(
			'id'			=> 'property_google_map',
			'title'			=> 'Property address',
			'pages'			=> array('property'),
			'context'		=> 'normal',
			'priority'		=> 'core',
			'fields'		=> array(
				array(
					'id'			=> 'property_address',
					'label'			=> __( 'Address', 'text-domain' ),
					'desc'			=> __( 'Enter address to show google maps', 'text-domain' ),
					'type'			=> 'text',
				),
			),
		),
		array(
			'id'			=> 'property_detail',
			'title'			=> 'Property Details',
			'pages'			=> array( 'property' ),
			'context'		=> 'normal',
			'priority'		=> 'core',
			'fields'		=> array(
				array(
					'id'			=> 'property_free_services',
					'label'			=> __('Free Services', 'text-domain'),
					'desc'			=> __('Free Services infomation', 'text-domain'),
					'type'			=> 'text',
				),
				array(
					'id'			=> 'property_pay_services',
					'label'			=> __('Pay Services', 'text-domain'),
					'desc'			=> __('Pay Services infomation', 'text-domain'),
					'type'			=> 'text',
				),
				array(
					'id'			=> 'property_environment',
					'label'			=> __('Environment', 'text-domain'),
					'desc'			=> __('Environment infomation', 'text-domain'),
					'type'			=> 'text',
				),
				array(
					'id'			=> 'property_furniture',
					'label'			=> __('Furniture', 'text-domain'),
					'desc'			=> __('Furniture infomation', 'text-domain'),
					'type'			=> 'text',
				),
				array(
					'id'			=> 'property_equipment',
					'label'			=> __('Equipment', 'text-domain'),
					'desc'			=> __('Equipment infomation', 'text-domain'),
					'type'			=> 'text',
				),
				array(
					'id'			=> 'property_kitchen',
					'label'			=> __('Kitchen', 'text-domain'),
					'desc'			=> __('Kitchen infomation', 'text-domain'),
					'type'			=> 'text',
				),
				array(
					'id'			=> 'property_details',
					'label'			=> __('Details', 'text-domain'),
					'desc'			=> __('Details infomation', 'text-domain'),
					'type'			=> 'text',
				),
				array(
					'id'			=> 'property_contact_person',
					'label'			=> __('Contact person', 'text-domain'),
					'desc'			=> __('Include person to contact', 'text-domain'),
					'type'			=> 'custom-post-type-select',
					'post_type'		=> 'businessman',
				),
				array(
					'id'			=> 'property_gallery',
					'label'			=> __('Gallery', 'text-domain'),
					'desc'			=> __('Gallery property', 'text-domain'),
					'type'			=> 'gallery',
				),
			),
		),

	);

	/* load each metabox */
	foreach( $meta_args_array as $meta_args ) {
		ot_register_meta_box( $meta_args );
	}
}

/*End of theme options*/