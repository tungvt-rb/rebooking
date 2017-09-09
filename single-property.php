<?php get_header();?>

<?php 
	if (have_posts()) :
		while (have_posts()) :
			the_post();

			$re_free_services		= get_post_meta( get_the_ID(), 'property_free_services', true );
			$re_pay_services		= get_post_meta( get_the_ID(), 'property_pay_services', true );
			$re_environment			= get_post_meta( get_the_ID(), 'property_environment', true );
			$re_furniture			= get_post_meta( get_the_ID(), 'property_furniture', true );
			$re_equipment			= get_post_meta( get_the_ID(), 'property_equipment', true );
			$re_details				= get_post_meta( get_the_ID(), 'property_details', true );
			$re_gallery				= get_post_meta( get_the_ID(), 'property_gallery', true );
			$re_gallery_img_ids		= wp_parse_id_list( $re_gallery );

			$re_price 			= get_post_meta(get_the_ID(), 'property_price', true);
			$re_area 			= get_post_meta(get_the_ID(), 'property_area', true);
			$re_builtin 		= get_post_meta(get_the_ID(), 'property_builtin', true);
			$re_bedroom			= get_post_meta(get_the_ID(), 'property_bedroom', true);
			$re_bathroom		= get_post_meta(get_the_ID(), 'property_bathroom', true);
			$re_bathroom_type	= get_post_meta(get_the_ID(), 'property_bathroom_type', true);
			$re_location		= get_post_meta(get_the_ID(), 'property_location', true);
			$re_includeof		= get_post_meta(get_the_ID(), 'property_kitchen', true);
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

			<div class="property-details">
				<h3><?php pll_e('Details of apartment for rent') ?></h3>

				<div class="tbl-details">
					<table class="tbl">
						<tbody>
							<tr>
								<td>
									<div class="tleft"><?php pll_e('Price'); ?></div>
									<div class="tright"><i class="fa fa-money"></i> <?php pll_e('$') ?> <?php echo $re_price; ?></div>
									<div class="clear"></div>
								</td>
								<td>
									<div class="tleft"><?php pll_e('Location'); ?></div>
									<div class="tright"><i class="fa fa-map-marker"></i> <?php echo $re_location; ?></div>
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
									<div class="tleft"><?php pll_e('Bathroom'); ?></div>
									<div class="tright"><i class="fa fa-bath"></i></i> <?php echo $re_bathroom; ?></div>
									<div class="clear"></div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="tleft"><?php pll_e('Living area'); ?></div>
									<div class="tright"><i class="fa fa-expand"></i> <?php echo $re_area; ?> <span>m<sup>2</sup></span></div>
									<div class="clear"></div>
								</td>
								<td>
									<div class="tleft"><?php pll_e('Built in'); ?></div>
									<div class="tright"><i class="fa fa-calendar"> </i><?php echo $re_builtin; ?></div>
									<div class="clear"></div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="tleft"><?php pll_e('Furnished'); ?></div>
									<div class="tright"><i class="fa fa-object-group"></i> <?php echo $re_furnished; ?></div>
									<div class="clear"></div>
								</td>
								<td>
									<div class="tleft"><?php pll_e('Equipped'); ?></div>
									<div class="tright"><i class="fa fa-object-group"></i> <?php echo $re_equipped; ?></div>
									<div class="clear"></div>
								</td>
							</tr>
						</tbody>
					</table>
				</div><!-- .tbl-details -->

				<div class="tbl-services">
					<table>
						<tbody>
							<tr>
								<th><?php pll_e('Free services') ?></th>
								<td><?php echo $re_free_services; ?></td>
							</tr>
							<tr>
								<th><?php pll_e('Pay Services') ?></th>
								<td><?php echo $re_pay_services ?></td>
							</tr>
							<tr>
								<th><?php pll_e('Environment') ?></th>
								<td><?php echo $re_environment ?></td>
							</tr>
							<tr>
								<th><?php pll_e('Furniture') ?></th>
								<td><?php echo $re_furniture ?></td>
							</tr>
							<tr>
								<th><?php pll_e('Equipment') ?></th>
								<td><?php echo $re_equipment ?></td>
							</tr>
							<tr>
								<th><?php pll_e('Details') ?></th>
								<td><?php echo $re_details ?></td>
							</tr>
						</tbody>
					</table>
				</div><!-- .tbl-services -->
			</div><!-- .property-details -->
		</div>

		<div class="one-third">
			<div class="widget-block">
				<?php dynamic_sidebar( 'default-sidebar' ); ?>
			</div>
		</div>
	</div>
</div><!-- .wrapper -->

<?php
		endwhile;
	endif;
?>

<?php get_footer(); ?>