<?php 
	get_header();
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	global $catID;
	$catID = $term->term_id;
?>

<!--<div class="section pagehead">
	<div class="wrapper">
		<div class="g-row">
			<div class="full-width">
				<h1><?php echo $term->name; ?></h1>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div> .pagehead -->

<div class="archives">
	<div class="wrapper">
		<div class="g-row">
			<div class="full-width">
				<?php require(TEMPLATEPATH . '/inc/archives/archive-duan.php'); ?>
			</div>
		</div>
	</div><!-- .wrapper -->
</div><!-- .archives -->

<?php get_footer(); ?>