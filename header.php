<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	
	<?php
		if (is_single() || is_page()) {
			$title = strip_tags(the_title('','',false));
		}
	?>

	<?php
		$currentLanguage  = get_bloginfo('language');
		if($currentLanguage == 'en-US') $currentLanguage = 'en';
		if($currentLanguage == 'vi') $currentLanguage = 'vn'
	?>

	<title><?php echo ($title != '') ? $title .' - ' . get_bloginfo( 'name' ) : get_bloginfo( 'name' ) ?></title>
	
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Tungvt">
	<link rel="icon" type="favicon" href="<?php bloginfo('template_url');?>/assets/images/favicon.ico">
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css">

	<?php wp_head(); ?>
	
</head>
<body class="<?php echo $currentLanguage; ?>">

	<div class="wrapper">
		<div class="top-head">
			<div class="g-row">
				<div class="one-third">
					<div id="weather"></div><!-- #weather -->
				</div>
				<div class="two-thirds">
					<div class="top-nav">
						<div class="top-nav-container">
							<?php wp_nav_menu(array('menu'=>'top-menu', 'menu_id'=>'top-nav', 'menu_class'=>'top-nav', 'container'=>false, 'after'=>'<i class="fa fa-circle"></i>')); ?>
						</div>
					</div>
				</div>
			</div>
		</div><!-- .top-head -->

		<div class="header">
			<div class="g-row">
				<div class="one-third">
					<?php 
						$logoURL = vrOptionTree('logo_url', '', 0);
						if($logoURL) { 
					?>
						<h1 class="logo">
							<a href="<?php echo home_url(); ?>" title="get_bloginfo( 'name' )" rel="home">
								<img src="<?php echo $logoURL; ?>" alt="<?php get_bloginfo( 'name' ) ?>" />
							</a>
						</h1>
					<?php } else { ?>
						<h1 class="logo">
							<a href="<?php echo home_url(); ?>" title="<?php get_bloginfo( 'name' ); ?>" rel="home">
								<?php echo get_bloginfo( 'name' ); ?>
							</a>
						</h1>
					<?php } ?>
					<!-- .logo -->
				</div>
				<div class="one-third">
					<h2><?php pll_e('HANOI HOUSING SERVICES') ?></h2>
				</div>
				<div class="one-third">
					<?php wp_nav_menu(array('menu'=>'switcher-menu', 'menu_id'=>'lang-nav', 'menu_class'=>'lang-switcher-nav', 'container'=>false)); ?>
				</div>
			</div>
		</div><!-- .header -->
		<div class="main-nav-container">
			<?php wp_nav_menu(array('menu'=>'main-menu', 'menu_id'=>'main-nav', 'menu_class'=>'main-nav', 'container'=>false)); ?>
		</div>

		<?php if (is_page_template('template-landing.php')) { ?>
		<div class="head-info content">
			<div class="g-row">
				<div class="one-half">
					<iframe width="100%" height="268" src="https://www.youtube.com/embed/h48kEQWwm1Q" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="one-half">
					<img src="<?php bloginfo('template_url');?>/assets/images/map-home2.jpg">
				</div>
			</div>
		</div><!-- .head-info -->
		<?php } ?>

	</div><!-- .wrapper -->

	<div class="wrapper">
		<div class="search-property">
			<div class="g-row">
				<div class="one-quarter">
					<img class="icon-search-advanced" src="<?php bloginfo('template_url');?>/assets/images/search-house.png ?>">
				</div>
				<div class="three-quarters">
					<h3><?php pll_e('Property Search') ?></h3>
					<?php
						$action = esc_url( site_url('/') );
						
						if (pll_current_language() == 'vi') {
							$action = esc_url( site_url('/') . 'vi/' );
						} else {
							$action = esc_url( site_url('/') );
						}
					?>
					<form method="get" id="advanced-searchform" role="search" action="<?php echo $action; ?>">
						<input type="hidden" name="search" value="advanced">

						<div class="one-third">
							<select name="bedrooms" id="bedrooms" class="slb">
								<option value=""><?php pll_e('Bedrooms') ?></option>
								<option value="1" <?php echo ($_GET['bedrooms'] == '1') ? 'selected' : '' ?>><?php _e( '1', 'textdomain' ); ?></option>
								<option value="2" <?php echo ($_GET['bedrooms'] == '2') ? 'selected' : '' ?>><?php _e( '2', 'textdomain' ); ?></option>
								<option value="3" <?php echo ($_GET['bedrooms'] == '3') ? 'selected' : '' ?>><?php _e( '3', 'textdomain' ); ?></option>
								<option value="4" <?php echo ($_GET['bedrooms'] == '4') ? 'selected' : '' ?>><?php _e( '4', 'textdomain' ); ?></option>
								<option value="5" <?php echo ($_GET['bedrooms'] == '5') ? 'selected' : '' ?>><?php _e( '5', 'textdomain' ); ?></option>
							</select>
						</div>
						<div class="one-third">
							<select name="bathrooms" id="bathrooms" class="slb">
								<option value=""><?php pll_e('Bathrooms') ?></option>
								<option value="1" <?php echo ($_GET['bathrooms'] == '1') ? 'selected' : '' ?>><?php _e( '1', 'textdomain' ); ?></option>
								<option value="2" <?php echo ($_GET['bathrooms'] == '2') ? 'selected' : '' ?>><?php _e( '2', 'textdomain' ); ?></option>
								<option value="3" <?php echo ($_GET['bathrooms'] == '3') ? 'selected' : '' ?>><?php _e( '3', 'textdomain' ); ?></option>
								<option value="4" <?php echo ($_GET['bathrooms'] == '4') ? 'selected' : '' ?>><?php _e( '4', 'textdomain' ); ?></option>
								<option value="5" <?php echo ($_GET['bathrooms'] == '5') ? 'selected' : '' ?>><?php _e( '5', 'textdomain' ); ?></option>
							</select>
						</div>
						<div class="one-third">
							<select name="location" id="location" class="slb">
								<option value=""><?php pll_e('Location') ?></option>
								<option value="Tay Ho" <?php echo ($_GET['location'] == 'Tay Ho') ? 'selected' : '' ?>><?php _e( 'Tay Ho', 'textdomain' ); ?></option>
								<option value="Thanh Xuan" <?php echo ($_GET['location'] == 'Thanh Xuan') ? 'selected' : '' ?>><?php _e( 'Thanh Xuan', 'textdomain' ); ?></option>
								<option value="Ba Dinh" <?php echo ($_GET['location'] == 'Ba Dinh') ? 'selected' : '' ?>><?php _e( 'Ba Dinh', 'textdomain' ); ?></option>
								<option value="Cau Giay" <?php echo ($_GET['location'] == 'Cau Giay') ? 'selected' : '' ?>><?php _e( 'Cau Giay', 'textdomain' ); ?></option>
							</select>
						</div>
						<div class="clear"></div>

						<div class="one-quarter">
							<input type="text" value="<?php echo $_GET['min_price'] ?>" name="min_price" id="min_price" placeholder="<?php pll_e('Min Price') ?>" />
						</div>
						<div class="one-quarter">
							<input type="text" value="<?php echo $_GET['max_price'] ?>" name="max_price" id="max_price" placeholder="<?php pll_e('Max Price') ?>" />
						</div>
						<div class="one-quarter">
							<input type="text" value="<?php echo $_GET['s'] ?>" name="s" id="name" placeholder="<?php pll_e('Keywords or ID'); ?>" />
						</div>
						<div class="one-quarter">
							<input type="submit" id="searchsubmit" value="<?php pll_e('Search') ?>" class="btnSubmit" />
						</div>
						<div class="clear"></div>
					</form>
				</div>
			</div>			
		</div><!-- .search-property -->
	</div><!-- .wrapper -->