<?php
/**
 * Template Name: Landing Page Template
 */
get_header();

?>

<div class="wrapper">
	<div class="property-list">
		<div class="g-row">
			<div class="full-width"><h2 class="p-title"><?php pll_e('PROPERTY LIST') ?></h2></div>
			<div class="clear"></div>
			
			<?php
				$args = array(
					'post_type' =>'property',
					'numberposts' => 12,
					'order' => 'DESC',
				);
				$posts = get_posts($args);

				if($posts) {
					$_post_count=0;
					foreach($posts as $post) : setup_postdata($post);
						$_post_count++;
						$featured_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ,'full') , 280, 280, true );

						$re_price 		= get_post_meta(get_the_ID(), 'property_price', true);
						$re_area 		= get_post_meta(get_the_ID(), 'property_area', true);
						$re_builtin 	= get_post_meta(get_the_ID(), 'property_builtin', true);
						$re_bedroom		= get_post_meta(get_the_ID(), 'property_bedroom', true);
						$re_bathroom	= get_post_meta(get_the_ID(), 'property_bathroom', true);
						$re_furnished	= get_post_meta(get_the_ID(), 'property_furnished', true);
						$re_equipped 	= get_post_meta(get_the_ID(), 'property_equipped', true);
						$re_location	= get_post_meta(get_the_ID(), 'property_location', true);
			?>
			<div class="one-sixth">
				<?php if( has_post_thumbnail() ) { ?>
				<div class="tooltip">
					<a class="thumb tooltip" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>">
						<span class="fa fa-search thumb-overlay"></span>
					</a>
					<?php require ( TEMPLATEPATH . '/inc/tpl-parts/template.table_hover.php' ); ?>
				</div>
				
				<?php } ?>
			</div>
			<?php echo ($_post_count%6==0) ? '<div class="clear"></div>' : ''; ?>
			<?php
					endforeach;
					wp_reset_query();
				} else {
					echo "<div class='full-width'><h4 style='font-weight:500;'>";
					pll_e("No post found!");
					echo "</h4></div>";
				}
			?>
		</div>
	</div>
</div>

<div class="wrapper content">
	<div class="g-row">
		<div class="full-width"><h2 class="p-title"><?php pll_e('SEARCH BY TYPE & LOCATION') ?></h2></div>
		<div class="clear"></div>

		<?php
			$terms = get_terms([
				'taxonomy'		=> 'property-category',
				'hide_empty'	=> false,
				'orderby'		=> 'parent',
				// 'order'			=> 'DESC',
			]);

			$_count = 0;

			foreach( $terms as $term ) {
				$_count++;
		?>
		
		<div class="one-third">
			<div class="re-block">
				<div class="re-catname"><i class="fa fa-folder<?php echo ($term->count==0) ? '' : '-open' ?>"></i><?php echo $term->name. ' (' .$term->count . ') '; ?></div>
				<div class="list-post">
					<?php
						$tax_query = array(
							array(
								'taxonomy' => 'property-category',
								'id' => 'id',
								'terms' => $term->term_id,
							)
						);

						// global $post;
						$args = array(
							'post_type' =>'property',
							'numberposts' => 3,
							'tax_query' => $tax_query,
							'order' => 'DESC',
							'suppress_filters' => false
						);
						$posts = get_posts($args);
					?>
					<ul>
					<?php
						if($posts) {
							$_post_count=0;
							foreach($posts as $post) : setup_postdata($post);
								$_post_count++;

								$re_price 		= get_post_meta(get_the_ID(), 'property_price', true);
								$re_area 		= get_post_meta(get_the_ID(), 'property_area', true);
								$re_builtin 	= get_post_meta(get_the_ID(), 'property_builtin', true);
								$re_bedroom		= get_post_meta(get_the_ID(), 'property_bedroom', true);
								$re_bathroom	= get_post_meta(get_the_ID(), 'property_bathroom', true);
								$re_furnished	= get_post_meta(get_the_ID(), 'property_furnished', true);
								$re_equipped 	= get_post_meta(get_the_ID(), 'property_equipped', true);
								$re_location	= get_post_meta(get_the_ID(), 'property_location', true);

					?>

						<li>
							<h4 class="tooltip">
								<i class="fa fa-bookmark"></i>
								<a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth($post->post_title, 0, 50, '...') ?></a>
								<?php require ( TEMPLATEPATH . '/inc/tpl-parts/template.table_hover.php' ); ?>
							</h4>
						</li>
							
					<?php 
							endforeach;
							wp_reset_query();
						} else {
							echo "<li><h4 style='font-weight:500;'>";
							pll_e("No post found!");
							echo "</h4></li>";
						}
					?>
					</ul>
				</div>
			</div><!-- .re-block -->
		</div>
		<?php echo ($_count%3==0) ? '<div class="clear"></div>' : ''; ?>
		<?php
			}
		?>
		
	</div>
</div><!-- .wrapper -->

<?php get_footer(); ?>