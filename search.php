<?php get_header(); ?>

	<div class="wrapper">
		<div class="g-row">
			<div class="two-thirds">

				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

				<?php get_template_part('loop', 'post');?>

			</div>

			<div class="one-third">
				<?php dynamic_sidebar( 'default-sidebar' ); ?>
			</div>
		</div>
	</div><!-- .wrapper -->

<?php get_footer();?>