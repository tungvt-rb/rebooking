<?php
	$tin_noi_bat = get_post_meta(get_the_ID(), 'danhmuc_tinnoibat', true);

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
				$sass_featured_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ,'full') , 380, 280, true );
	?>
	<div class="one-third">
		<?php if( has_post_thumbnail() ) { ?>
		<a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<img src="<?php echo $sass_featured_image; ?>" alt="<?php the_title(); ?>">
			<span class="pe-7s-link pe-3x thumb-overlay"></span>
			<h3><?php the_title(); ?></h3>
		</a>
		<?php } ?>
	</div>
	<?php 
			endforeach;
		}
		wp_reset_postdata();
	?>

</div>
