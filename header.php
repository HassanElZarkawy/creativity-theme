<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Creativity
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body>
<div id="page" class="site">
	<?php 
		$id = get_queried_object_id();
		$metas = get_post_meta($id);
		$display_feature = $metas['is_page_feature_image'][0] === 'yes' ? true : false;
	?>
	<!-- Header -->
	<header id="<?php echo $display_feature ? 'home' : ''?>">
		<?php if ($display_feature) { ?>
			<?php
				$background = '';
				if ( has_post_thumbnail( $id ) ) {
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );
					$background = $image[0];
				}
			?>
			<!-- Background Image -->
			<div class="bg-img" style="background-image: url('<?php echo $background ?>');">
				<div class="overlay"></div>
			</div>
			<!-- /Background Image -->
		<?php } ?>

		<!-- Nav -->
		<nav id="nav" class="navbar <?php echo $display_feature ? 'nav-transparent' : '' ?>">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
								$custom_logo = $image[0];
							?>
							<img class="logo" src="<?php echo $custom_logo ?>" alt="logo">
							<img class="logo-alt" src="<?php echo $custom_logo ?>" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_class'     => 'main-nav nav navbar-nav navbar-right',
						'container' => 'ul',
					) )
				?>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		<?php if ($display_feature) { ?>
			<!-- home wrapper -->
			<div class="home-wrapper">
				<div class="container">
					<div class="row">
						<!-- home content -->
						<div class="col-md-10 col-md-offset-1">
							<div class="home-content">
								<h1 class="white-text"><?php echo $metas['page_title'][0] ?></h1>
								<p class="white-text"> <?php echo $metas['page_subtitle'][0] ?> </p>
								<a class="white-btn" href="<?php echo $metas['primary_button_link'][0] ?>"><?php echo $metas['primary_button_text'][0] ?></a>
								<a class="main-btn" href="<?php echo $metas['secondary_button_link'][0] ?>"><?php echo $metas['secondary_button_text'][0] ?></a>
							</div>
						</div>
						<!-- /home content -->
					</div>
				</div>
			</div>
			<!-- /home wrapper -->
		<?php } ?>

	</header>
	<!-- /Header -->

	<div id="content" class="site-content">
