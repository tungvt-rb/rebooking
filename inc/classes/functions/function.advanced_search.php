<?php

if (isset($_REQUEST['search']) && $_REQUEST['search'] == 'advanced' && !is_admin() && $query->is_main_query()) {
	$query->set('post_type', 'property');

	$_minprice 	= ($_GET['min_price'] != '') ? $_GET['min_price'] : '';
	$_maxprice 	= ($_GET['max_price'] != '') ? $_GET['max_price'] : '';
	$_bedrooms 	= ($_GET['bedrooms'] != '') ? $_GET['bedrooms'] : '';
	$_bathrooms = ($_GET['bathrooms'] != '') ? $_GET['bathrooms'] : '';
	$_location 	= ($_GET['location'] != '') ? $_GET['location'] : '';
	$_s 		= ($_GET['s'] != '') ? $_GET['s'] : '';

	$meta_query = array(
		// array(
		// 	'relation' => 'OR',
		// 	array(
		// 		'key'		=> 's',
		// 		'value'		=> $_s,
		// 		'compare'	=> 'LIKE',
		// 	),
		// ),
		array(			
			'key'		=> 'property_bedroom',
			'value'		=> $_bedrooms,
			'type'		=> 'numeric',
			'compare'	=> 'LIKE',
		),
		array(
			'key'		=> 'property_bathroom',
			'value'		=> $_bathrooms,
			'type'		=> 'numeric',
			'compare'	=> 'LIKE',
		),
		array(
			'key'		=> 'property_location',
			'value'		=> $_location,
			'compare'	=> 'LIKE',
		),
		array(
			'key'		=> 'property_price',
			'value'		=> array($_minprice, $_maxprice),
			'type'		=> 'numeric',
			'compare'	=> 'BETWEEN',
		),
		
	);

	$query->set('meta_query', $meta_query);

}