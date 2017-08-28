<?php
/**
 * Template Name: About Page Template
 */
get_header();

$vinpearlvillasintro = vrOptionTree('about_vinpearlresort_villas', '', 0);
$uytin = vrOptionTree('about_vinpearlresort_villas_uytin_tienphong', '', 0);
$sangtrong = vrOptionTree('about_vinpearlresort_villas_sangtrong_quyenru', '', 0);
$quanly = vrOptionTree('about_vinpearlresort_villas_quanly_chuyennghiep', '', 0);
$dautu = vrOptionTree('about_vinpearlresort_villas_dautu_dadang', '', 0);
$bguytin = aq_resize( vrOptionTree('about_vinpearlresort_villas_uytin_tienphong_bg', '', 0) , 670, 460, true );
$bgsangtrong = aq_resize( vrOptionTree('about_vinpearlresort_villas_sangtrong_quyenru_bg', '', 0) , 670, 460, true );
$bgquanly = aq_resize( vrOptionTree('about_vinpearlresort_villas_quanly_chuyennghiep_bg', '', 0) , 670, 460, true );
$bgdautu = aq_resize( vrOptionTree('about_vinpearlresort_villas_dautu_dadang_bg', '', 0) , 670, 460, true );

$condotelintro = vrOptionTree('about_vinpearl_condotel', '', 0);
$hinhthuc = vrOptionTree('about_vinpearl_condotel_hinhthuc_hoatdong', '', 0);
$khonggian = vrOptionTree('about_vinpearl_condotel_khonggian_tinhte', '', 0);
$bghinhthuc = aq_resize( vrOptionTree('about_vinpearl_condotel_hinhthuc_hoatdong_bg', '', 0) , 670, 460, true );
$bgkhonggian = aq_resize( vrOptionTree('about_vinpearl_condotel_khonggian_tinhte_bg', '', 0) , 670, 460, true );

?>

<!--<div class="section pagehead">
	<div class="wrapper">
		<div class="g-row">
			<div class="full-width">
				<h1><?php the_title(); ?></h1>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div> .pagehead -->

<div class="vinpearlvillas">
	<div class="intro">
		<div class="wrapper">
			<div class="g-row">
				<div class="one-third details">
					<?php echo $vinpearlvillasintro ?>
				</div>
				<div class="two-thirds">
					<div class="vinpearlvillassildes">
						<div class="custom-navigation nav-3">
							<a href="#" class="flex-prev"><i class="pe-7s-angle-left-circle pe-3x"></i></a>
							<a href="#" class="flex-next"><i class="pe-7s-angle-right-circle pe-3x"></i></a>
						</div><!-- .custom-navigation -->
						<ul class="slides">
						<?php
							$vinpearlvillasgalleries = vrOptionTree('about_vinpearlresort_villas_slider', '', 0);
							$gallery_img_ids = wp_parse_id_list( $vinpearlvillasgalleries );
							foreach ($gallery_img_ids as $key => $value) {
								$slide_image = aq_resize( wp_get_attachment_url( $value ,'full') , 800, 360, true );
						?>
							<li>
								<img src="<?php echo $slide_image; ?>">
							</li>
						<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .intro -->

	<div class="about">
		<div class="g-row">
			<div class="one-half">
				<div class="box" style="background:url('<?php echo $bguytin ?>');background-position:center !important;background-repeat:no-repeat !important;-webkit-background-size: 100% auto !important;background-size:100% auto !important;">
					<h3 class="txt-1">Uy tín &amp; Tiên phong</h3>
					<p class="txt-2">Xem tiếp</p>
					<div class="box-hidden">
						<div><div><?php echo $uytin ?></div></div>
						<div class="bt-cls">x</div>
					</div>
				</div><!-- .box -->
			</div>
			<div class="one-half">
				<div class="box" style="background:url('<?php echo $bgsangtrong ?>');background-position:center !important;background-repeat:no-repeat !important;-webkit-background-size: 100% auto !important;background-size:100% auto !important;">
					<h3 class="txt-1">Sang trọng &amp; Quyến rũ</h3>
					<p class="txt-2">Xem tiếp</p>
					<div class="box-hidden">
						<div><div><?php echo $sangtrong ?></div></div>
						<div class="bt-cls">x</div>
					</div>
				</div><!-- .box -->
			</div>
			<div class="clear"></div>
			<div class="one-half">
				<div class="box" style="background:url('<?php echo $bgquanly ?>');background-position:center !important;background-repeat:no-repeat !important;-webkit-background-size: 100% auto !important;background-size:100% auto !important;">
					<h3 class="txt-1">Quản lý chuyên nghiệp</h3>
					<p class="txt-2">Xem tiếp</p>
					<div class="box-hidden">
						<div><div><?php echo $quanly ?></div></div>
						<div class="bt-cls">x</div>
					</div>
				</div><!-- .box -->
			</div>
			<div class="one-half">
				<div class="box" style="background:url('<?php echo $bgdautu ?>');background-position:center !important;background-repeat:no-repeat !important;-webkit-background-size: 100% auto !important;background-size:100% auto !important;">
					<h3 class="txt-1">Hình thức đầu tư đa dạng</h3>
					<p class="txt-2">Xem tiếp</p>
					<div class="box-hidden">
						<div><div><?php echo $dautu ?></div></div>
						<div class="bt-cls">x</div>
					</div>
				</div><!-- .box -->
			</div>
		</div>
	</div>
</div><!-- .vinpearlvillas -->

<div class="vinpearlvillas condotel">
	<div class="intro">
		<div class="wrapper">
			<div class="g-row">
				<div class="one-third details">
					<?php echo $condotelintro ?>
				</div>
				<div class="two-thirds">
					<div class="condotelsildes">
						<div class="custom-navigation nav-4">
							<a href="#" class="flex-prev"><i class="pe-7s-angle-left-circle pe-3x"></i></a>
							<a href="#" class="flex-next"><i class="pe-7s-angle-right-circle pe-3x"></i></a>
						</div><!-- .custom-navigation -->
						<ul class="slides">
						<?php
							$condotelgalleries = vrOptionTree('about_vinpearl_condotel_slider', '', 0);
							$gallery_img_ids = wp_parse_id_list( $condotelgalleries );
							foreach ($gallery_img_ids as $key => $value) {
								$slide_image = aq_resize( wp_get_attachment_url( $value ,'full') , 800, 500, true );
						?>
							<li>
								<img src="<?php echo $slide_image; ?>">
							</li>
						<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .intro -->

	<div class="about">
		<div class="g-row">
			<div class="one-half">
				<div class="box" style="background:url('<?php echo $bghinhthuc ?>');background-position:center !important;background-repeat:no-repeat !important;-webkit-background-size: 100% auto !important;background-size:100% auto !important;">
					<h3 class="txt-1">Hình thức hoạt động chuyên nghiệp</h3>
					<p class="txt-2">Xem tiếp</p>
					<div class="box-hidden">
						<div><div><?php echo $hinhthuc ?></div></div>
						<div class="bt-cls">x</div>
					</div>
				</div><!-- .box -->
			</div>
			<div class="one-half">
				<div class="box" style="background:url('<?php echo $bgkhonggian ?>');background-position:center !important;background-repeat:no-repeat !important;-webkit-background-size: 100% auto !important;background-size:100% auto !important;">
					<h3 class="txt-1">Không gian tinh tế & riêng tư</h3>
					<p class="txt-2">Xem tiếp</p>
					<div class="box-hidden">
						<div><div><?php echo $khonggian ?></div></div>
						<div class="bt-cls">x</div>
					</div>
				</div><!-- .box -->
			</div>
		</div>
	</div>
</div><!-- .condotel -->

<?php get_footer(); ?>