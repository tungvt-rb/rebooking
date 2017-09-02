<?php
/*
 * WordPress Breadcrumbs
 * author: Dimox
 * version: 2017.21.01
 * license: MIT
*/

function kmf_breadcrumbs() {

	/* OPTIONS */
	$text['home']		= '<i class="fa fa-home"></i>';
	$text['category']	= 'Archive by category "%s"';
	$text['search']		= 'Search results';
	$text['tag']		= 'Posts tagged "%s"';
	$text['author']		= 'Articles posted by "%s"';
	$text['404']		= 'Error 404 "%s"';
	$text['page']		= 'Page "%s"';
	$text['cpage']		= 'Comment page "%s"';

	$wrap_before		= '<ul class="breadcrumbs">';
	$wrap_after			= '</ul>';
	$sep 				= '';
	$show_home_link		= 1;
	$show_on_home		= 0;
	$show_current		= 1;
	$before 			= '<li class="current">';
	$after 				= '</li>';

	global $post;
	$home_url 			= home_url('/');
	$link_before 		= '<li>';
	$link_after 		= '</li>';
	$link 				= $link_before . '<a href="%1$s">%2$s</a>' . $link_after;
	$frontpage_id		= get_option('page_on_front');
	$parent_id			= ($post) ? $post->post_parent : '';
	$home_link 			= $link_before . '<a href="' . $home_url . '" class="home">' . $text['home'] . '</a>' . $link_after;

	if ( is_home() || is_front_page() ) {
		if($show_on_home) echo $wrap_before . $home_link . $wrap_after;
	} else {
		echo $wrap_before;

		if ( is_category() ) {
			$cat = get_category(get_query_var('cat'), false);
			if( $cat->parent != 0 ) {
				$cats = get_category_parents($cat->parent, TRUE, $sep);
				$cats = $link_before . '<a$1>$2</a>' . $link_after;
				if ( $show_home_link ) echo $sep;
				echo $cats;
			}
			if ( get_query_var('paged') ) {
				$cat = $cat->cat_ID;
				echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ( $show_current ) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
			}
		} elseif ( is_search() ) {
			if ( have_posts() ) {
				if ( $show_home_link && $show_current ) echo $sep;
				if ( $show_current ) echo $before . sprintf($text['search'], get_search_query()) . $after;
			} else {
				if ( $show_home_link ) echo $sep;
				echo $before . sprintf($text['search'], get_search_query()) . $after;
			}
		} elseif ( is_single() && !is_attachment() ) {
			if ($show_home_link) echo $sep;
			
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				if ($show_current) echo $sep . $before . get_the_title() . $after;
				printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $sep);
				if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				echo $cats;
				if ( get_query_var('cpage') ) {
					echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
				} else {
					if ($show_current) echo $before . get_the_title() . $after;
				}
			}
		} elseif ( is_page() ) {

			if ($show_home_link) echo $sep;
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $sep;
				}
			}
			if ($show_current) echo $sep . $before . get_the_title() . $after;
		} elseif ( is_day() ) {
			if ( $show_home_link ) echo $sep;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
			echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
			if( $show_current ) echo $sep . $before . get_the_time('d') . $after;
		}

		if ( $show_home_link ) echo $home_link;

		echo $wrap_after;

	}

}

// function dimox_breadcrumbs() {


// 	if (is_home() || is_front_page()) {

// 		if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

// 	} else {

// 		echo $wrap_before;
// 		if ($show_home_link) echo $home_link;

//		elseif ( is_month() ) {
// 			if ($show_home_link) echo $sep;
// 			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
// 			if ($show_current) echo $sep . $before . get_the_time('F') . $after;

// 		} elseif ( is_year() ) {
// 			if ($show_home_link && $show_current) echo $sep;
// 			if ($show_current) echo $before . get_the_time('Y') . $after;

// 		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
// 			$post_type = get_post_type_object(get_post_type());
// 			if ( get_query_var('paged') ) {
// 				echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
// 			} else {
// 				if ($show_current) echo $sep . $before . $post_type->label . $after;
// 			}

// 		} elseif ( is_attachment() ) {
// 			if ($show_home_link) echo $sep;
// 			$parent = get_post($parent_id);
// 			$cat = get_the_category($parent->ID); $cat = $cat[0];
// 			if ($cat) {
// 				$cats = get_category_parents($cat, TRUE, $sep);
// 				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
// 				echo $cats;
// 			}
// 			printf($link, get_permalink($parent), $parent->post_title);
// 			if ($show_current) echo $sep . $before . get_the_title() . $after;

// 		} elseif ( is_page() && !$parent_id ) {
// 			if ($show_current) echo $sep . $before . get_the_title() . $after;

// 		} elseif ( is_page() && $parent_id ) {
// 			if ($show_home_link) echo $sep;
// 			if ($parent_id != $frontpage_id) {
// 				$breadcrumbs = array();
// 				while ($parent_id) {
// 					$page = get_page($parent_id);
// 					if ($parent_id != $frontpage_id) {
// 						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
// 					}
// 					$parent_id = $page->post_parent;
// 				}
// 				$breadcrumbs = array_reverse($breadcrumbs);
// 				for ($i = 0; $i < count($breadcrumbs); $i++) {
// 					echo $breadcrumbs[$i];
// 					if ($i != count($breadcrumbs)-1) echo $sep;
// 				}
// 			}
// 			if ($show_current) echo $sep . $before . get_the_title() . $after;

// 		} elseif ( is_tag() ) {
// 			if ( get_query_var('paged') ) {
// 				$tag_id = get_queried_object_id();
// 				$tag = get_tag($tag_id);
// 				echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
// 			} else {
// 				if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
// 			}

// 		} elseif ( is_author() ) {
// 			global $author;
// 			$author = get_userdata($author);
// 			if ( get_query_var('paged') ) {
// 				if ($show_home_link) echo $sep;
// 				echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
// 			} else {
// 				if ($show_home_link && $show_current) echo $sep;
// 				if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
// 			}

// 		} elseif ( is_404() ) {
// 			if ($show_home_link && $show_current) echo $sep;
// 			if ($show_current) echo $before . $text['404'] . $after;

// 		} elseif ( has_post_format() && !is_singular() ) {
// 			if ($show_home_link) echo $sep;
// 			echo get_post_format_string( get_post_format() );
// 		}

// 		echo $wrap_after;

// 	}
// } // end of dimox_breadcrumbs()