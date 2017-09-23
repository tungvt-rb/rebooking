<div class="contact-bl-person">
	<img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>">
	<div class="person-details">
		<span class="p-name"><i class="fa fa-user-circle-o"></i> <?php echo $value->post_title ?> (<?php echo $bm_notes ?>)</span>
		<span class="p-mobile"><i class="fa fa-mobile"></i> <?php echo $bm_mobile ?></span>
		<span class="p-mail"><i class="fa fa-envelope"></i> <a href="mailto:<?php echo $bm_email ?>"><?php echo $bm_email ?></a></span>
		<span class="p-companies">
			<ul>
				<li><i class="fa fa-id-card-o"></i></li>
			<?php
				if( !empty($terms) ) {
					foreach ($terms as $term => $value) {
						echo '<li>' . $value->name . '</li>';
					}
				} else {
					echo '<li>';
					pll_e('No company selected!');
					echo '</li>';
				}
			?>
			</ul>
		</span>
	</div><!-- .person-details -->
</div><!-- .contact-bl-person -->