<h3><?php pll_e('Request for showing') ?></h3>
<form class="form" method="post" action="<?php echo admin_url('admin-ajax.php');?>">
	<input type="hidden" name="action" value="reb_request_showing" />
	<div class="one-third">
		<input type="text" name="full-name" placeholder="Full name">
	</div>
	<div class="one-third">
		<input type="text" name="email" placeholder="Your email">
	</div>
	<div class="one-third">
		<input type="text" name="phone" placeholder="Your phone">
	</div>
	<div class="clear"></div>

	<div class="full-width">
		<input type="text" name="property-title" value="<?php the_title(); ?>">
	</div>
	<div class="clear"></div>

	<div class="full-width">
		<textarea placeholder="Your comment"></textarea>
	</div>
	<div class="clear"></div>

	<div class="one-third">
		<input type="text" name="secure-code" maxlength="5" placeholder="Secure code">
	</div>
	<div class="one-third">
		<img class="secureimage" src="<?php echo admin_url('admin-ajax.php?action=reb_secure_image');?>" alt="secure image" />
		<a href="javascript:;" class="reload-secureimage"><i class="fa fa-refresh"></i></a>
	</div>
	<div class="one-third">
		<input type="submit" name="submit" value="Send" class="btnSubmit">
	</div>
	<div class="clear"></div>
</form>