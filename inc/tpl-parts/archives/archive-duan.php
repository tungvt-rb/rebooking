<?php
	$duan_cat_id = $catID;

	//tax query
	if($duan_cat_id) {
		$duan_tax_query = array(
			array(
				'taxonomy' => 'danh-muc-du-an',
				'id' => 'id',
				'terms' => $duan_cat_id
			)
		);
	} else { $duan_tax_query = NULL; }

	global $post;
	$args = array(
		'post_type' =>'du-an',
		'numberposts' => -1,
		'tax_query' => $duan_tax_query,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'suppress_filters' => false
	);
	$duan_posts = get_posts($args);
?>

<?php
	if($duan_posts) {
		$sass_count=0;
		foreach($duan_posts as $post) : setup_postdata($post);
			$sass_count++;

			$sass_featured_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id() ,'full') , 550, 350, true );
?>
			<div class="one-third">
				<div class="article-content">
					<div class="article-image">
						<?php if( has_post_thumbnail() ) { ?>
						<a class="thumb" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<img src="<?php echo $sass_featured_image; ?>" alt="<?php the_title(); ?>">
							<span class="pe-7s-link pe-3x thumb-overlay"></span>
						</a>
						<?php } ?>
					</div>
					<div class="article-body bg428BCA">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<p>
						<?php
							$content = get_the_content();
							$content_stripped = strip_shortcodes($content);
							$sass_post_excerpt = !empty($post->post_excerpt) ? wp_trim_words(get_the_excerpt(), 30) : wp_trim_words($content_stripped, 30);
							//echo $sass_post_excerpt;
						?>
						</p>
						<a href="<?php the_permalink(); ?>" class="article-view-more">Xem thêm</a>
					</div>
				</div>
			</div>
			<?php echo ($sass_count%3==0) ? '<div class="clear"></div>' : ''; ?>
<?php 
		endforeach;
	} else {
		echo "Không tìm thấy bài viết nào!";
	}
	wp_reset_postdata();
?>