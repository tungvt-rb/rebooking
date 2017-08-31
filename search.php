<?php get_header(); ?>

	<div class="wrapper content">
		<div class="g-row">
			<div class="two-thirds">

				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

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
						<table class="tbl">
							<thead>
								<tr><th colspan="2"><?php the_title(); ?></th></tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<div class="tleft"><?php pll_e('Price'); ?></div>
										<div class="tright"><i class="fa fa-money"></i> <?php pll_e('$') ?> <?php echo $re_price; ?></div>
										<div class="clear"></div>
									</td>
									<td>
										<div class="tleft"><?php pll_e('Location'); ?></div>
										<div class="tright"><?php echo $re_location; ?></div>
										<div class="clear"></div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="tleft"><?php pll_e('Location'); ?></div>
										<div class="tright"><i class="fa fa-map-marker"></i> <?php echo $re_location; ?></div>
										<div class="clear"></div>
									</td>
									<td>
										<div class="tleft"><?php pll_e('Living area') ?></div>
										<div class="tright"><i class="fa fa-expand"></i> <?php echo $re_area; ?> <span>m<sup>2</sup></span></div>
										<div class="clear"></div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="tleft"><?php pll_e('Bathroom') ?></div>
										<div class="tright"><i class="fa fa-bath"></i></i> <?php echo $re_bathroom; ?></div>
										<div class="clear"></div>
									</td>
									<td>
										<div class="tleft"><?php pll_e('Bathroom Type') ?></div>
										<div class="tright"><i class="fa fa-bath"></i> <i class="fa fa-shower"></i> <?php echo $re_bathroom_type; ?></div>
										<div class="clear"></div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="tleft"><?php pll_e('Bedroom'); ?></div>
										<div class="tright"><i class="fa fa-bed"></i> <?php echo $re_bedroom; ?></div>
										<div class="clear"></div>
									</td>
									<td>

										<div class="tleft">Built in</div>
										<div class="tright"><?php echo $re_builtin; ?></div>
										<div class="clear"></div>
									</td>
								</tr>
							</tbody>
						</table>
					</div><!-- .item-info -->
					<div class="clear"></div>
				</div>
				<?php endwhile; ?>

			</div>

			<div class="one-third">
				<?php dynamic_sidebar( 'default-sidebar' ); ?>
			</div>
		</div>
	</div><!-- .wrapper -->

<?php get_footer();?>