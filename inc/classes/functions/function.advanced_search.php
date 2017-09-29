<?php

	// if( is_admin() || ! $query->is_main_query() ) {
	// 	return;
	// }

	// if (!is_post_type_archive('property')) {
	// 	return;
	// }

if (isset($_REQUEST['search']) && $_REQUEST['search'] == 'advanced' && !is_admin() && $query->is_main_query()) {

	$meta_query = array();

	$query->set( 'paged', ( get_query_var('paged') ) ? get_query_var('paged') : 1 );
	$query->set( 'posts_per_page', 2 );
	$query->set( 'post_type', array( 'property' ) );

	if (!empty( get_query_var('min_price') ) && !empty(get_query_var('max_price'))) {
		$meta_query[] = array(
			'key'		=> 'property_price',
			'value'		=> array(get_query_var('min_price'), get_query_var('max_price')),
			'type'		=> 'numeric',
			'compare'	=> 'BETWEEN',
		);
	}

	if (!empty( get_query_var('bedrooms') )) {
		$meta_query[] = array(
			'key'		=> 'property_bedroom',
			'value'		=> get_query_var('bedrooms'),
			'compare'	=> 'LIKE',
		);
	}

	if (!empty( get_query_var('bathrooms') )) {
		$meta_query[] = array(
			'key'		=> 'property_bathroom',
			'value'		=> get_query_var('bathrooms'),
			'compare'	=> 'LIKE',
		);
	}

	if (!empty( get_query_var('location') )) {
		$meta_query[] = array(
			'key'		=> 'property_location',
			'value'		=> get_query_var('location'),
			'compare'	=> 'LIKE',
		);
	}

	if ( count($meta_query) > 1 ) {
		$meta_query['relation'] = 'AND';
	}

	if ( count($meta_query) > 0 ) {
		$query->set( 'meta_query', $meta_query );
	}
}

// if (isset($_REQUEST['search']) && $_REQUEST['search'] == 'advanced' && !is_admin() && $query->is_main_query()) {
// 	$query->set('post_type', 'property');

// 	$_minprice 	= ($_GET['min_price'] != '') ? $_GET['min_price'] : '';
// 	$_maxprice 	= ($_GET['max_price'] != '') ? $_GET['max_price'] : '';
// 	$_bedrooms 	= ($_GET['bedrooms'] != '') ? $_GET['bedrooms'] : '';
// 	$_bathrooms = ($_GET['bathrooms'] != '') ? $_GET['bathrooms'] : '';
// 	$_location 	= ($_GET['location'] != '') ? $_GET['location'] : '';
// 	$_s 		= ($_GET['s'] != '') ? $_GET['s'] : '';

// 	$meta_query = array(
// 		// array(
// 		// 	'relation' => 'OR',
// 		// 	array(
// 		// 		'key'		=> 's',
// 		// 		'value'		=> $_s,
// 		// 		'compare'	=> 'LIKE',
// 		// 	),
// 		// ),
// 		array(			
// 			'key'		=> 'property_bedroom',
// 			'value'		=> $_bedrooms,
// 			'type'		=> 'numeric',
// 			'compare'	=> 'LIKE',
// 		),
// 		array(
// 			'key'		=> 'property_bathroom',
// 			'value'		=> $_bathrooms,
// 			'type'		=> 'numeric',
// 			'compare'	=> 'LIKE',
// 		),
// 		array(
// 			'key'		=> 'property_location',
// 			'value'		=> $_location,
// 			'compare'	=> 'LIKE',
// 		),
// 		array(
// 			'key'		=> 'property_price',
// 			'value'		=> array($_minprice, $_maxprice),
// 			'type'		=> 'numeric',
// 			'compare'	=> 'BETWEEN',
// 		),
		
// 	);

// 	$query->set('meta_query', $meta_query);

// }