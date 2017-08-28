<?php
/**
 * Template Name: Contact Template
 */
get_header();
?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

<div class="section pagehead">
	<div class="wrapper">
		<div class="g-row">
			<div class="full-width">
				<h1><?php the_title(); ?></h1>
				<div class="clear"></div>

				<?php
					var $color = color.RGBA{0xff, 0xeb, 0xee, 0xff} // rgb(255, 235, 238);

				?>

			</div>
		</div>
	</div>
</div><!-- .pagehead -->

<div class="contact-page">
	<div class="wrapper">
		<div class="g-row">

			<div class="two-thirds centered contact-page-main">
				<h3>LIÊN HỆ VỚI CHÚNG TÔI</h3>
				<p>Vui lòng nhập các thông tin có dấu (*)</p>

				<form class="form contact-form" action="<?php echo admin_url('admin-ajax.php');?>" method="post">
					<input type="hidden" name="action" value="vr_contact" />
						<div class="one-third">
							<label for="fullname">Họ tên <span>(*)</span></label>
						</div>
						<div class="two-thirds">
							<input type="text" name="fullname" id="fullname">
						</div>
						<div class="clear"></div>
						<div class="one-third">
							<label for="mobile">Số điện thoại <span>(*)</span></label>
						</div>
						<div class="two-thirds">
							<input type="text" name="mobile" id="mobile">
						</div>
						<div class="clear"></div>
						<div class="one-third">
							<label for="email1">Email <span>(*)</span></label>
						</div>
						<div class="two-thirds">
							<input type="text" name="email1" id="email1">
						</div>
						<div class="clear"></div>
						<div class="one-third">
							<label for="subject">Dự án quan tâm</label>
						</div>
						<div class="two-thirds">
							<input type="text" name="subject" id="subject">
						</div>
						<div class="clear"></div>
						<div class="one-third">
							<label for="subject">Nội dung</label>
						</div>
						<div class="two-thirds">
							<textarea name="message" id="message"></textarea>
						</div>
						<div class="clear"></div>
						<div class="one-third centered submit">
							<a href="javascript:;" class="button submit-form">Gửi yêu cầu</a>
						</div>
				</form><!-- .form -->
			</div>
			
		</div>
	</div>
</div><!-- .contact-page -->

	<?php endwhile; ?>
<?php endif; ?>

<?php

//get template footer
get_footer(); ?>