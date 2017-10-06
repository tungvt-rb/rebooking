<?php 
	get_header();
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	global $catID;
	$catID = $term->term_id;
?>



<?php get_footer(); ?>