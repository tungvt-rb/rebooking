<?php
get_header();

$blog_small_caption 	= vrOptionTree('blog_small_caption', '', 0);
$posts_per_page 		= vrOptionTree('posts_per_page', '', 0);
$tag       				= get_queried_object();
?>
<div class="section pagehead">
	<div class="wrapper">
		<div class="g-row">
			<div class="full-width">
				<h1><?php echo $tag->name ?></h1>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div><!-- .pagehead -->

<div class="blogs">
	<div class="wrapper">
		<div class="g-row">
			<div class="full-width">
				<div class="w-blog type_masonry imgpos_attop meta_comments more_hidden">
					<div class="w-blog-h">
						<div class="w-blog-list">

							<?php
								
								$args=array(
									'tag' => $tag->slug,
								);
								query_posts($args);

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