<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	
	<?php
		if (is_singular('du-an') || is_single() || is_page()) {
			$title = strip_tags(the_title('','',false));
		}
	?>

	<title><?php echo ($title != '') ? $title .' - ' . get_bloginfo( 'name' ) : get_bloginfo( 'name' ) ?></title>
	
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Tungvt">
	<link rel="icon" type="favicon" href="<?php bloginfo('template_url');?>/assets/images/favicon-1.png">
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css">

	<?php wp_head(); ?>
	
</head>
<body>

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
					<h2><?php pll_e('HANOI HOUSING SERVICE') ?></h2>
				</div>
				<div class="one-third">
					<?php wp_nav_menu(array('menu'=>'switcher-menu', 'menu_id'=>'lang-nav', 'menu_class'=>'lang-switcher-nav', 'container'=>false)); ?>
				</div>
			</div>
		</div><!-- .header -->
		<div class="main-nav-container">
			<?php wp_nav_menu(array('menu'=>'main-menu', 'menu_id'=>'main-nav', 'menu_class'=>'main-nav', 'container'=>false)); ?>
		</div>

	</div><!-- .wrapper -->

	<div class="wrapper">
		<div class="search-property">
			<div class="g-row">
				<div class="one-quarter">
					<img src="<?php bloginfo('template_url');?>/assets/images/search-house.png ?>">
				</div>
				<div class="three-quarters">
					<h3><?php pll_e('Property Search') ?></h3>

					<form method="get" id="advanced-searchform" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>">

						<input type="hidden" name="search" value="advanced">

						<select name="bedrooms" id="bedrooms">
							<option value=""><?php pll_e('Bedrooms') ?></option>
							<option value="1" <?php echo ($_GET['bedrooms'] == '1') ? 'selected' : '' ?>><?php _e( '1', 'textdomain' ); ?></option>
							<option value="2" <?php echo ($_GET['bedrooms'] == '2') ? 'selected' : '' ?>><?php _e( '2', 'textdomain' ); ?></option>
							<option value="3" <?php echo ($_GET['bedrooms'] == '3') ? 'selected' : '' ?>><?php _e( '3', 'textdomain' ); ?></option>
							<option value="4" <?php echo ($_GET['bedrooms'] == '4') ? 'selected' : '' ?>><?php _e( '4', 'textdomain' ); ?></option>
							<option value="5" <?php echo ($_GET['bedrooms'] == '5') ? 'selected' : '' ?>><?php _e( '5', 'textdomain' ); ?></option>
						</select>

						<select name="bathrooms" id="bathrooms">
							<option value=""><?php pll_e('Bathrooms') ?></option>
							<option value="1" <?php echo ($_GET['bedrooms'] == '1') ? 'selected' : '' ?>><?php _e( '1', 'textdomain' ); ?></option>
							<option value="2" <?php echo ($_GET['bedrooms'] == '2') ? 'selected' : '' ?>><?php _e( '2', 'textdomain' ); ?></option>
							<option value="3" <?php echo ($_GET['bedrooms'] == '3') ? 'selected' : '' ?>><?php _e( '3', 'textdomain' ); ?></option>
							<option value="4" <?php echo ($_GET['bedrooms'] == '4') ? 'selected' : '' ?>><?php _e( '4', 'textdomain' ); ?></option>
							<option value="5" <?php echo ($_GET['bedrooms'] == '5') ? 'selected' : '' ?>><?php _e( '5', 'textdomain' ); ?></option>
						</select>

						<select name="location" id="location">
							<option value=""><?php pll_e('Location') ?></option>
							<option value="Tay Ho"><?php _e( 'Tay Ho', 'textdomain' ); ?></option>
							<option value="Thanh Xuan"><?php _e( 'Thanh Xuan', 'textdomain' ); ?></option>
							<option value="Ba Dinh"><?php _e( 'Ba Dinh', 'textdomain' ); ?></option>
							<option value="Cau Giay"><?php _e( 'Cau Giay', 'textdomain' ); ?></option>
						</select>

						<label for="min_price"><?php pll_e('Min Price') ?></label><br>
						<input type="text" value="<?php echo $_GET['min_price'] ?>" name="min_price" id="min_price" />
						<label for="max_price"><?php pll_e('Max Price') ?></label><br>
						<input type="text" value="<?php echo $_GET['max_price'] ?>" name="max_price" id="max_price" />

						<label for="s" class=""><?php _e( 'Name: ', 'textdomain' ); ?></label><br>
						<input type="text" value="" placeholder="<?php _e( 'Type the Price', 'textdomain' ); ?>" name="s" id="name" />

						<input type="submit" id="searchsubmit" value="Search" />

					</form>
				</div>
			</div>			
		</div><!-- .search-property -->
	</div><!-- .wrapper -->