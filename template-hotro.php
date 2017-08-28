<?php
/**
 * Template Name: Ho tro Page Template
 */
get_header();

?>

<div class="section pagehead">
	<div class="wrapper">
		<div class="g-row">
			<div class="full-width">
				<h1><?php the_title(); ?></h1>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div><!-- .pagehead -->

<div class="hotro-page">
	<div class="wrapper">
		<div class="g-row">
			<div class="full-width">
				<ul class="hotro">
					<li>
						<a href="http://lienminhvgp.net/chinh-sach-ban-hang">
							<i class="pe-7s-notebook"></i>
							<span>Chính sách bán hàng</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="pe-7s-like2"></i>
							<span>Thủ tục hợp lý</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="pe-7s-note2"></i>
							<span>Mẫu hợp đồng</span>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="pe-7s-share"></i>
							<span>Đơn vị phân phối chính thức</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>