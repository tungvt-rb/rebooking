<?php 
	get_header();
?>

<!--<div class="section pagehead">
	<div class="wrapper">
		<div class="g-row">
			<div class="full-width">
				<h1>DỰ ÁN</h1>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div> .pagehead -->

<div class="archives">
	<div class="wrapper">
		<div class="g-row">
			<div class="full-width">
				<ul class="tabs duan clearfix">
					<?php
						$_count = 0;	
						$cat = get_terms('danh-muc-du-an', array('exclude' => array('3'),'hide_empty' => 0,'order' => 'DESC'));				
						foreach ($cat as $key=>$value) {
							$_count++;
					?>
					<li <?php echo ($_count==1) ? 'class="cur"' : '' ?>>
						<a href="#" rel="<?php echo $value->slug ?>"><i class="pe-7s-way pe-va"></i> <?php echo $value->name ?></a>
					</li>
					<?php } ?>
				</ul><!-- .tabs -->

				<div class="tab-container clearfix">
					<?php
						$_count = 0;
						global $catID;
						$cat = get_terms('danh-muc-du-an', array('exclude' => array('3'),'hide_empty' => 0,'order' => 'DESC'));
						foreach ($cat as $key=>$value) {
							$_count++;
							$catID = $value->term_id;
					?>
					<div class="duan-content tab-content tab-<?php echo $value->slug ?> clearfix" <?php echo ($_count==1) ? 'style="display:block;"' : '' ?>>
						<?php require(TEMPLATEPATH . '/inc/archives/archive-duan.php'); ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div><!-- .wrapper -->
</div><!-- .archives -->

<?php get_footer(); ?>