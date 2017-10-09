<p>
	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">Title</label>
	<input class="widefat"  id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance[ 'title' ] ); ?>" />
</p>

<!-- ********** SHOW IN EN LANGUAGE ********** -->
<?php
	$terms = get_terms([
		'taxonomy'		=> 'property-category',
		'hide_empty'	=> false,
		'orderby'		=> 'parent',
		// 'lang'			=> 'en',
	]);
	$_count = 0;
	echo "<b>Categories in EN Language</b>";
	if($terms) {
		//show property category
		foreach ($terms as $term) {
			$_count++;
?>
<p>
	<input class="checkbox" type="checkbox" <?php checked( $instance[ "pc-$term->term_id" ], $term->term_id ); ?> id="<?php echo $this->get_field_id( "pc-$term->term_id" ); ?>" name="<?php echo $this->get_field_name( "pc-$term->term_id" ); ?>" value="<?php echo $term->term_id ?>" /> 
	<label for="<?php echo $this->get_field_id( "pc-$term->term_id" );?>"><?php echo $term->name ?></label>
</p>
<?php
		}
	} else {
		echo "<h4 style='font-weight:500;'>";
		pll_e("No categories found!");
		echo "</h4>";
	}
	wp_reset_query();
?>

<!-- ********** SHOW IN VN LANGUAGE ********** 
<?php
	$terms = get_terms([
		'taxonomy'		=> 'property-category',
		'hide_empty'	=> false,
		'orderby'		=> 'parent',
		'lang'			=> 'vi',
	]);
	$_count = 0;
	echo "<b>Categories in VN Language</b>";
	if($terms) {
		//show property category
		foreach ($terms as $term) {
			$_count++;
?>
<p>
	<input class="checkbox" type="checkbox" <?php checked( $instance[ "pc-$term->term_id" ], $term->term_id ); ?> id="<?php echo $this->get_field_id( "pc-$term->term_id" ); ?>" name="<?php echo $this->get_field_name( "pc-$term->term_id" ); ?>" value="<?php echo $term->term_id ?>" /> 
	<label for="<?php echo $this->get_field_id( "pc-$term->term_id" );?>"><?php echo $term->name ?></label>
</p>
<?php
		}
	} else {
		echo "<h4 style='font-weight:500;'>";
		pll_e("No categories found!");
		echo "</h4>";
	}
	wp_reset_query();
?>-->