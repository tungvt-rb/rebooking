<?php
/**
 * Template Name: Blog Page Template
 */
get_header();

$blog_small_caption = vrOptionTree('blog_small_caption', '', 0);
$posts_per_page = vrOptionTree('posts_per_page', '', 0);;

$blog_filter_parent = '';
$blog_parent = vrOptionTree('category_blog', '', 0);
if(!empty($blog_parent)) { $blog_filter_parent = $blog_parent; } else { $blog_filter_parent = NULL; }

?>
<!--<div class="section pagehead">
	<div class="wrapper">
		<div class="g-row">
			<div class="full-width">
				<h1><?php the_title(); ?></h1>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div> .pagehead -->

<div class="blogs">
	<div class="wrapper">
		<div class="g-row">
			<div class="full-width">
				<div class="w-blog type_masonry imgpos_attop meta_comments more_hidden">
					<div class="w-blog-h">
						<div class="w-blog-list">

							<?php
							//tax query
							if($blog_filter_parent) {
								$sass_tax_query = array(
									array(
											'taxonomy' => 'category',
											'field' => 'id',
											'terms' => $blog_filter_parent,
										)
									);
							} else { $sass_tax_query = NULL; }
							
								query_posts(
									array(
										'post_type'=> 'post',
										// 'posts_per_page' => $posts_per_page,
										// 'paged'=>$paged,
										'tax_query' => $sass_tax_query
									)
								);

							//loop
							if (have_posts()) :
								//get entry template
								get_template_part( 'loop', 'post');            	
							endif;
						?>

						<div class="w-blog-pagination">
							<div class="g-pagination">
							<?php
								//show pagination
								// $VGP->pagination();
							?>
							</div>
						</div>
						<?php
							//reset query
							wp_reset_query(); 
						?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .wrapper -->
</div><!-- .blogs -->
<?php get_footer(); ?>