<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">Title</label>
	<input class="widefat"  id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'title' ] ); ?>" />
</p>

<?php
	$terms = get_terms([
		'taxonomy'		=> 'businessman-category',
		'hide_empty'	=> false,
		'orderby'		=> 'parent',
	]);
	$_count = 0;

	//show businessman category
	foreach ($terms as $term) {
		$_count++;
		echo $term->name;

		$tax_query = array(
			array(
				'taxonomy' => 'businessman-category',
				'id' => 'id',
				'terms' => $term->term_id,
			)
		);

		// global $post;
		$args = array(
			'post_type' =>'businessman',
			'tax_query' => $tax_query,
			'order' => 'DESC',
			'suppress_filters' => false
		);
		$posts = get_posts($args);

		if($posts) {
			$_post_count=0;
			foreach($posts as $post) : setup_postdata($post);
				$_post_count++;
?>
<p>
	<input class="checkbox" type="checkbox" <?php checked( $instance[ "businessman-$post->ID" ], $post->ID ); ?> id="<?php echo $this->get_field_id( "businessman-$post->ID" ); ?>" name="<?php echo $this->get_field_name( "businessman-$post->ID" ); ?>" value="<?php echo $post->ID ?>" /> 
	<label for="<?php echo $this->get_field_id( "businessman-$post->ID" );?>"><?php echo $post->post_title ?></label>
</p>
<?php
			endforeach;
			wp_reset_query();
		} else {
			echo "<li><h4 style='font-weight:500;'>";
			pll_e("No post found!");
			echo "</h4></li>";
		}
	}
?>