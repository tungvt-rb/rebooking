<?php

$showitems = ($range * 2)+1; 
global $paged;
if(empty($paged)) $paged = 1;

if($pages == '') {
	global $wp_query;
	$pages = $wp_query->max_num_pages;
	if(!$pages) {
		$pages = 1;
	}
}

if($pages != 1) {
	for ($i=1; $i <= $pages; $i++) {
		if (1 !== $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
			echo ($paged == $i)? "<a href='".get_pagenum_link($i)."' class=\"g_pagination_item active\">".$i."</a>":"<a href='".get_pagenum_link($i)."' class=\"g_pagination_item\">".$i."</a>";
		}
	}
}