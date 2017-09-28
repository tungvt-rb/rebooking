<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<div class="wrapper content">
			<div class="g-row">
				<div class="full-width">
					<?php if (function_exists('kmf_breadcrumbs')) kmf_breadcrumbs(); ?>
				</div>
				<div class="clear"></div>

				<div class="two-thirds">
					<h1 class="p-title"><?php the_title(); ?></h1>
					
					<?php the_content(); ?>

				</div>

				<div class="one-third">
					<?php dynamic_sidebar( 'default-sidebar' ); ?>
				</div>
			</div>
		</div><!-- .wrapper -->
		
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer();?>