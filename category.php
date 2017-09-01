<?php get_header(); ?>

		<div class="single-content">
			<div class="wrapper">
				<div class="g-row">
					<div class="one-third">
						<?php dynamic_sidebar( 'default-sidebar' ); ?>
					</div>
					<div class="two-thirds">
						<h1 class="single-title"><?php the_title(); ?></h1>

						<?php if (function_exists('kmf_breadcrumbs')) kmf_breadcrumbs(); ?>

						<div class="single-body">
								<?php
									$catID = get_queried_object_id();
									if($catID) {
										$cat_tax_query = array(
											array(
												'taxonomy' => 'category',
												'id' => 'id',
												'terms' => $catID
											)
										);
									} else { $cat_tax_query = NULL; }

									$args = array(
										'post_type' =>'post',
										'numberposts' => -1,
										'tax_query' => $cat_tax_query,
										'order' => 'ASC',
									);
									$news_posts = get_posts($args);

									if($news_posts) {
										$sass_count=0;
										foreach($news_posts as $post) : setup_postdata($post);
											$sass_count++;
											$sass_featured_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ,'full') , 220, 150, true );
								?>
								<div class="one-half">
									<?php if( has_post_thumbnail() ) { ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<div class="thumb">
											<img src="<?php echo $sass_featured_image; ?>" alt="<?php the_title(); ?>">
											<span class="fa fa-link thumb-overlay"></span>
										</div>
										<h3><?php the_title(); ?></h3>
										<div class="excerpt-recent">
											<?php
												//show excerpt
												$content = $post->post_content;
												$content_stripped = strip_shortcodes($content);
												$sass_post_excerpt = !empty($post->post_excerpt) ? wp_trim_words($post->post_excerpt, 30) : wp_trim_words($content_stripped, 30);
												echo $sass_post_excerpt;
											?>
										</div>
									</a>
									<?php } ?>
								</div>
								<?php 
											echo ($sass_count % 2 == 0) ? '<div class="clear"></div>' : '';
										endforeach;
									}
									wp_reset_postdata();
								?>
						</div>
					</div>
				</div>
			</div><!-- .wrapper -->
		</div><!-- .single-content -->
		
<?php get_footer();?>