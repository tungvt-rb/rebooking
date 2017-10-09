<div class="bl-property-categories">
	<a href="<?php echo get_term_link($term->term_id); ?>"><img src="<?php echo $meta_image; ?>" alt="<?php $term->name; ?>"></a>
	<div class="pc-details">
		<span class="pc-name"><?php echo $term->name ?></span>
		<?php if( $term->description ) { ?>
		<span class="pc-desc">
		<?php
			//show excerpt
			echo $content_excerpt = wp_trim_words( strip_shortcodes($term->description), 20 );
		?>
		</span>
		<?php } ?>
	</div><!-- .person-details -->
	<div class="clear"></div>
</div><!-- .contact-bl-person -->