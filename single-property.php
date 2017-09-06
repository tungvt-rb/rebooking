<?php get_header();?>

<?php 
	if (have_posts()) :
		while (have_posts()) :
			the_post();

			$re_free_services		= get_post_meta( get_the_ID(), 'property_free_services', true );
			$re_pay_services		= get_post_meta( get_the_ID(), 'property_pay_services', true );
			$re_envoiment			= get_post_meta( get_the_ID(), 'property_envoiment', true );
			$re_furniture			= get_post_meta( get_the_ID(), 'property_furniture', true );
			$re_equipment			= get_post_meta( get_the_ID(), 'property_equipment', true );
			$re_details				= get_post_meta( get_the_ID(), 'property_details', true );
			$re_gallery				= get_post_meta( get_the_ID(), 'property_gallery', true );
			$re_gallery_img_ids		= wp_parse_id_list( $re_gallery );
?>

<div class="wrapper content">
	<div class="g-row">
		<div class="full-width">
			<?php if ( function_exists( 'kmf_breadcrumbs' ) ) kmf_breadcrumbs(); ?>
		</div>
		<div class="clear"></div>

		<div class="two-thirds">
			<ul class="bxslider">
				<?php
					foreach ( $re_gallery_img_ids as $key=>$value ) :
						$img_title_alt	= get_the_excerpt($value);
						$img_url		= wp_get_attachment_image_src($value, 'full');
				?>
				<li>
					<img src="<?php echo $img_url[0] ?>" title="<?php echo $img_title_alt ?>" alt="<?php echo $img_title_alt ?>">
				</li>
				<?php endforeach; ?>
			</ul>

			<div class="property_details">
				<h3><?php pll_e('Details of apartment for rent') ?></h3>

				
			</div>
		

			<?php
				// var_dump($re_gallery_img_ids);
				// foreach ($re_gallery_img_ids as $key => $value) {
				// 	$img = wp_get_attachment_image_src($value, 'full');
				// 	var_dump($img);
				// 	if($img) {
				// 		echo $img[0];
				// 		echo get_the_excerpt($value);
				// 	}
				// }
			?>
		</div>

		<div class="one-third">
			<?php dynamic_sidebar( 'default-sidebar' ); ?>
		</div>
	</div>
</div><!-- .wrapper -->

<?php
		endwhile;
	endif;
?>

<?php get_footer(); ?>