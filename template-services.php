<?php
/**
 * Template Name: Services Page Template
 */
get_header();

$loiich_tax_query = array(
	array(
		'taxonomy' => 'category',
		'field' => 'id',
		'terms' => 12
	)
);

global $post;
$args = array(
	'post_type' =>'post',
	'numberposts' => -1,
	'tax_query' => $loiich_tax_query,
	'order' => 'DESC',
);
$loiich_posts = get_posts($args);

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

<div class="services-page">
	<div class="wrapper">
		<div class="g-row">
			<div class="full-width">
				<?php
					if($loiich_posts) {
				?>

				<ul>

				<?php
					$sass_count=0;
					foreach($loiich_posts as $post) : setup_postdata($post);
						$sass_count++;
						$sass_featured_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ,'full') , 280, 85, true );
				?>
					<li>
						<?php if( has_post_thumbnail() ) { ?>
							<img src="<?php echo $sass_featured_image; ?>" alt="<?php the_title(); ?>">
						<?php } ?>
						<div class="content-service">
							<h3><?php echo $post->post_title ?></h3>
							<p><?php
								//show excerpt
								$content = $post->post_content;
								$content_stripped = strip_shortcodes($content);
								$sass_post_excerpt = !empty($post->post_excerpt) ? wp_trim_words($post->post_excerpt, 30) : wp_trim_words($content_stripped, 30);
								echo $sass_post_excerpt; 
							?></p>
						</div>
						<div class="clear"></div>
					</li>
				<?php endforeach; ?>

				</ul>

				<?php 
					} else { 
						echo "Không tìm thấy bài viết nào.";
					}
				?>
			</div>
		</div>
	</div><!-- .wrapper -->
</div>

<?php get_footer(); ?>