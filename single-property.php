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
			$re_kitchen				= get_post_meta( get_the_ID(), 'property_kitchen', true );
			$re_details				= get_post_meta( get_the_ID(), 'property_details', true );
			$re_balcony				= get_post_meta( get_the_ID(), 'property_balcony', true );
			$re_contact_person		= get_post_meta( get_the_ID(), 'property_contact_person', true );
			$re_gallery				= get_post_meta( get_the_ID(), 'property_gallery', true );
			$re_gallery_img_ids		= wp_parse_id_list( $re_gallery );

			$re_address				= get_post_meta(get_the_ID(), 'property_address', true);

			$re_price 				= get_post_meta(get_the_ID(), 'property_price', true);
			$re_area 				= get_post_meta(get_the_ID(), 'property_area', true);
			$re_builtin 			= get_post_meta(get_the_ID(), 'property_builtin', true);
			$re_bedroom				= get_post_meta(get_the_ID(), 'property_bedroom', true);
			$re_bathroom			= get_post_meta(get_the_ID(), 'property_bathroom', true);
			$re_bathroom_type		= get_post_meta(get_the_ID(), 'property_bathroom_type', true);
			$re_furnished			= get_post_meta(get_the_ID(), 'property_furnished', true);
			$re_equipped			= get_post_meta(get_the_ID(), 'property_equipped', true);
			$re_floor				= get_post_meta(get_the_ID(), 'property_floor', true);
?>

<div class="wrapper content">
	<div class="g-row">
		<div class="full-width">
			<?php if ( function_exists( 'kmf_breadcrumbs' ) ) kmf_breadcrumbs(); ?>
		</div>
		<div class="clear"></div>

		<div class="two-thirds">
			<?php if ( $re_gallery ) { ?>
			<ul class="bxslider">
				<?php
					foreach ( $re_gallery_img_ids as $key=>$value ) :
						$img_title_alt	= get_the_excerpt($value);
						$img_url		= wp_get_attachment_image_src($value, 'full');
				?>
				<li><img src="<?php echo $img_url[0] ?>" title="<?php echo $img_title_alt ?>" alt="<?php echo $img_title_alt ?>"></li>
				<?php endforeach; ?>
			</ul>
			<?php } ?>
			<div class="clear"></div>

			<div class="property-details">
				<div class="details-header">
					<h3><?php pll_e('Details of apartment for rent') ?></h3>
					<span class="property-id"><?php pll_e('Property ID'); echo ': ';?><span class="id-info"><?php echo get_the_ID(); ?></span> (<?php pll_e('Please use this'); ?>)</span>
					<span class="property-price"><?php pll_e('Price'); echo ': '; ?><span class="price-info"><?php pll_e('$'); echo $re_price . '/'; pll_e('month'); ?></span></span>
					<div class="clear"></div>
				</div><!-- .property-details-head -->				

				<div class="tbl-details mrg-btm">
					<table class="tbl">
						<tbody>
							<tr>
								<td>
									<div class="tleft"><i class="fa fa-object-group"></i></div>
									<div class="tright"><?php echo $re_furnished; ?> <?php pll_e('Furnished'); ?></div>
									<div class="clear"></div>
								</td>
								<td>
									<div class="tleft"><i class="fa fa-object-group"></i></div>
									<div class="tright"><?php echo $re_equipped; ?> <?php pll_e('Equipped'); ?></div>
									<div class="clear"></div>
								</td>
								<td>
									<div class="tleft"><img src="<?php bloginfo('template_url') ?>/assets/images/balcony.png" title="Balcony" class="icon-balcony"></div>
									<div class="tright"><?php echo $re_balcony; ?></div>
									<div class="clear"></div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="tleft"><i class="fa fa-expand"></i></div>
									<div class="tright"><?php echo $re_area; ?> <span>m<sup>2</sup></span></div>
									<div class="clear"></div>
								</td>
								<td>
									<div class="tleft"><img src="<?php bloginfo('template_url') ?>/assets/images/upstairs.png" title="Balcony"></div>
									<div class="tright"><?php echo $re_floor; ?></div>
									<div class="clear"></div>
								</td>
								<td>
									<div class="tleft"><i class="fa fa-calendar"></i></div>
									<div class="tright"><?php pll_e('Built in'); ?> <?php echo $re_builtin; ?></div>
									<div class="clear"></div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="tleft"><i class="fa fa-bed"></i></div>
									<div class="tright"><?php echo $re_bedroom; ?> <?php pll_e('Bedroom'); ?></div>
									<div class="clear"></div>
								</td>
								<td>
									<div class="tleft"><i class="fa fa-bath"></i></div>
									<div class="tright"><?php echo $re_bathroom; ?> <?php pll_e('Bathroom'); ?></div>
									<div class="clear"></div>
								</td>
								<td>
									<div class="tleft"><i class="fa fa-bath"></i> <i class="fa fa-shower"></i></div>
									<div class="tright"><?php echo $re_bathroom_type; ?></div>
									<div class="clear"></div>
								</td>
							</tr>
						</tbody>
					</table>
				</div><!-- .tbl-details -->

				<div class="tbl-services mrg-btm">
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
							<?php if(!empty($re_kitchen)) { ?>
							<tr>
								<th><?php pll_e('Kitchen') ?></th>
								<td><?php echo $re_kitchen ?></td>
							</tr>
							<?php } ?>
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

				<div class="property-content mrg-btm">
					<?php the_content(); ?>
				</div><!-- !property-content -->

				<div class="property-map mrg-btm">
					<?php require( TEMPLATEPATH . '/inc/tpl-parts/tpl.map.php' ); ?>
				</div><!-- .property-map -->

				<div class="contact-bl">
					<div class="one-half no-pad">
						<?php
							if( !empty($re_contact_person) ) {
								$args = array(
									'post_type' => 'businessman',
									'p'		=> $re_contact_person,
								);

								$query = new WP_Query($args);

								if( $query->have_posts() ) {
									while( $query->have_posts() ) : $query->the_post();
										$featured_image 		= aq_resize( wp_get_attachment_url( get_post_thumbnail_id($post->ID) ,'full') , 100, 100, true );
										$bm_mobile				= get_post_meta(get_the_ID(), 'businessman_mobile', true);
										$bm_email				= get_post_meta(get_the_ID(), 'businessman_email', true);
										$bm_notes				= get_post_meta(get_the_ID(), 'businessman_notes', true);

										$terms = wp_get_post_terms($post->ID, 'businessman-category');
						?>
						<div class="contact-bl-person">
							<img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>">
							<div class="person-details">
								<span class="p-name"><i class="fa fa-user-circle-o"></i> <?php echo $post->post_title ?> (<?php echo $bm_notes ?>)</span>
								<span class="p-mobile"><i class="fa fa-mobile"></i> <?php echo $bm_mobile ?></span>
								<span class="p-mail"><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $bm_email ?>"><?php echo $bm_email ?></a></span>
								<span class="p-companies">
									<ul>
										<li><i class="fa fa-id-card-o"></i></li>
									<?php										
										if( !empty($terms) ) {
											foreach ($terms as $term => $value) {
												echo '<li>' . $value->name . '</li>';
											}
										} else {
											echo '<li>';
											pll_e('No company selected!');
											echo '</li>';
										}
									?>
									</ul>
								</span>
							</div><!-- .person-details -->
						</div><!-- .contact-bl-person -->
						<?php 
									endwhile;
								} else {
									pll_e('No post found!');
								}
							} else {
								pll_e('No contact!');
							}

							wp_reset_query(); 
						?>
					</div>
					<div class="one-half">
						<p>Social Links!!!</p>
					</div>
					<div class="clear"></div>
				</div>
			</div><!-- .property-details -->
		</div>

		<div class="one-third">
			<div class="widget-block mrg-btm">
				<?php dynamic_sidebar( 'default-sidebar' ); ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div><!-- .wrapper -->

<?php
		endwhile;
	endif;
?>

<?php get_footer(); ?>