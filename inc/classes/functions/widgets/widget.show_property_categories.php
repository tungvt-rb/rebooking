<?php

class Show_Property_Categories_Widget extends WP_widget {
	function __construct() {
		parent::__construct(
			'show_property_categories_widget',
			esc_html__( 'Show Property Categories', 'text_domain' ),
			array( 'description' => esc_html__('List property categories to show in sidebar', 'text_domain') )
		);
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$text = $instance['text'];

		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}

			$terms = get_terms([
				'taxonomy'		=> 'property-category',
				'hide_empty'	=> false,
				'orderby'		=> 'parent',
				// 'order'			=> 'DESC',
			]);

			$_count = 0;

			if ( $terms ) {
				foreach( $terms as $term ) {
					$_count++;
					if($instance["pc-$term->term_id"] == $term->term_id) {
						$meta_image = ( function_exists( 'get_wp_term_image' ) ) ? get_wp_term_image( $term->term_id ) : '';
						require ( TEMPLATEPATH . '/inc/tpl-parts/widgets/tpl.widget.show_property_categories.php' );
					}
				}
			} else {
				echo 'No Categories found!';
			}
			wp_reset_query();

		echo $after_widget;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Immediate Contact', 'text_domain' );

		require ( TEMPLATEPATH . '/inc/tpl-parts/widgets/tpl.widget.show_property_categories.admin.php' );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );

		$terms = get_terms([
			'taxonomy'		=> 'property-category',
			'hide_empty'	=> false,
			'orderby'		=> 'parent',
		]);
		$_count = 0;

		if( $terms ) {		
			foreach ( $terms as $term ) {
				$_count++;
				$instance["pc-$term->term_id"] = $new_instance["pc-$term->term_id"];
			}
		}
		wp_reset_query();
		return $instance;
	}
}
register_widget('Show_Property_Categories_Widget');