<?php

class Show_Immediate_Contact_Widget extends WP_widget {
	function __construct() {
		parent::__construct(
			'show_immediate_contact_widget',
			esc_html__('Show Contact Persons', 'text_domain'),
			array( 'description' => esc_html__('List contact person and tick the persons want to show in sidebar', 'text_domain') )
		);
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$text = $instance[ 'text' ];

		echo $before_widget;

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}

			$args = array(
				'post_type' => 'businessman',
			);
			global $posts;
			$posts = get_posts($args);

			if($posts) {
				foreach ($posts as $post => $value) {
					if($instance["businessman-$value->ID"] == $value->ID) {
							$args = array(
								'post_type' => 'businessman',
								'p'		=> $instance["businessman-$value->ID"],
							);

							$query = new WP_Query($args);

							if( $query->have_posts() ) {
								while( $query->have_posts() ) : $query->the_post();
									$featured_image 		= aq_resize( wp_get_attachment_url( get_post_thumbnail_id($value->ID) ,'full') , 100, 100, true );
									$bm_mobile				= get_post_meta(get_the_ID(), 'businessman_mobile', true);
									$bm_email				= get_post_meta(get_the_ID(), 'businessman_email', true);
									$bm_notes				= get_post_meta(get_the_ID(), 'businessman_notes', true);

									$terms = wp_get_post_terms($value->ID, 'businessman-category');

									require ( TEMPLATEPATH . '/inc/tpl-parts/widgets/tpl.widget.show_businessman.php' );

								endwhile;
							} else {
								pll_e('No post found!');
							}
							wp_reset_query();
					}
				}
			}
			wp_reset_postdata();

		echo $after_widget;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Immediate Contact', 'text_domain' );

		require ( TEMPLATEPATH . '/inc/tpl-parts/widgets/tpl.widget.show_businessman.admin.php' );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );

		$instance[ 'avatar' ] = $new_instance[ 'avatar' ];

		$args = array(
			'post_type' =>'businessman',
		);
		global $posts;
		$posts = get_posts($args);

		if($posts) {
			$_post_count=0;
			foreach($posts as $post) : setup_postdata($post);
				$_post_count++;
				$instance[ "businessman-$post->ID" ] = $new_instance[ "businessman-$post->ID" ];
			endforeach;
		}
		wp_reset_postdata();
		return $instance;
	}
}
register_widget('Show_Immediate_Contact_Widget');