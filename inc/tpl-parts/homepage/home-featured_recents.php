<?php
	$tin_noi_bat = get_post_meta(get_the_ID(), 'danhmuc_recents', true);

	if($tin_noi_bat) {
		$news_tax_query = array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $tin_noi_bat
			)
		);
	} else { $news_tax_query = NULL; }

	global $post;
	$args = array(
		'post_type' =>'post',
		'numberposts' => 4,
		'tax_query' => $news_tax_query,
		'order' => 'DESC',
		'suppress_filters' => false
	);
	$news_posts = get_posts($args);
?>

<div class="g-row">
	<?php
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
