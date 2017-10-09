<?php get_header(); ?>

	<div class="wrapper content">
		<div class="g-row">
			<div class="full-width">
				<?php if (function_exists('kmf_breadcrumbs')) kmf_breadcrumbs(); ?>
			</div>
			<div class="clear"></div>
			<div class="two-thirds">

				<div class="search-results mrg-btm">
					<?php
						$_count = 0;
						while (have_posts()) : the_post();
							$_count++;
							$featured_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ,'full') , 300, 280, true );

							$re_price 			= get_post_meta(get_the_ID(), 'property_price', true);
							$re_area 			= get_post_meta(get_the_ID(), 'property_area', true);
							$re_builtin 		= get_post_meta(get_the_ID(), 'property_builtin', true);
							$re_bedroom			= get_post_meta(get_the_ID(), 'property_bedroom', true);
							$re_bathroom		= get_post_meta(get_the_ID(), 'property_bathroom', true);
							$re_bathroom_type	= get_post_meta(get_the_ID(), 'property_bathroom_type', true);
							$re_location		= get_post_meta(get_the_ID(), 'property_location', true);
							$re_includeof		= get_post_meta(get_the_ID(), 'property_kitchen', true);
					?>
					<div class="property-item">
						<?php if( has_post_thumbnail() ) { ?>
						<div class="item-thumb">
							<a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>">
								<span class="fa fa-search thumb-overlay"></span>
							</a>
						</div><!-- .item-thumb -->
						<?php } ?>
						<div class="item-info">
							<?php require ( TEMPLATEPATH . '/inc/tpl-parts/tables/tpl.search.result.php' ); ?>
						</div><!-- .item-info -->
						<div class="clear"></div>
					</div>
					<?php endwhile; ?>
				</div><!-- .search-results -->
				
				<div class="pagination">
				<?php
					$REBooking->pagination();

					wp_reset_postdata();
				?>
				</div><!-- .pagination -->
			</div>

			<div class="one-third">
				<?php dynamic_sidebar( 'default-sidebar' ); ?>
			</div>
		</div>
	</div><!-- .wrapper -->

<?php get_footer();?>