<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php // enqueue favicon
		$favicon = fw_get_opt('favicon');
		if( ! function_exists( 'has_site_icon' ) && isset($favicon['url']) ) : ?>
		<link rel="shortcut icon" href="<?php echo esc_url($favicon['url']) ?>">
	<?php endif ?>

	<!--[if lt IE 9]>
		<script src="https://cdn.jsdelivr.net/g/html5shiv@3.7,respond@1.4"></script>
	<![endif]-->

	<style type="text/css">
		.js body, .js .wow { visibility: hidden; }
		.touch .wow { visibility: visible; }
	</style>

	<?php if(fw_get_opt('custom_css', false)) : ?>
		<style type="text/css"><?php echo fw_get_opt('custom_css'); ?></style>
	<?php endif ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- ========= Top menu ========= -->
<div class="scrollspy" id="page-top"></div>
<header id="head-menu"><div class="container">

	<nav>
		<?php if ( has_nav_menu( 'primary' ) ):
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false
			) );
		else:
			echo '<ul class="menu"><li><a href="#">' . __( 'Define your primary menu in dashboard', 'dentist' ) . '</a></li></ul>';
		endif ?>

		<span id="menu-toggle">
			<i class="fa fa-bars"></i>
			<?php _e('Open menu', 'dentist'); ?>
		</span>
	</nav>

	<div class="phone">
		<?php $sphone = esc_html(fw_get_opt('site_phone', '800 111 222 1234')); ?>
		<i class="fa fa-phone"></i>

		<strong class="hidden-xs"><?php echo $sphone; ?></strong>
		<strong class="visible-xs-inline">
			<a href="tel:<?php echo urlencode($sphone); ?>"><?php echo $sphone; ?></a>
		</strong>
	</div>

</div></header>

<!-- ========= Header ========= -->
<section id="head-info"><div class="container">

	<div class="row">

		<?php
			$l_type  = fw_get_opt( 'logo/type', 'text' );
			$l_image = fw_get_opt( 'logo/image/image' );
			$l_text = fw_get_opt('logo/text/text', get_bloginfo('name'));
		?>

		<div class="col-md-6 logo <?php if($l_type == 'image') echo 'image'; ?>" data-mh="dentist-header">
			<?php if($l_type == 'image' && isset($l_image['url'])): ?>
				<a href="<?php echo esc_url(home_url()) ?>">
					<img src="<?php echo esc_url($l_image['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
				</a>
			<?php else: ?>
				<a href="<?php echo esc_url(home_url()) ?>"><h1>
					<?php echo wp_kses_post($l_text); ?>
				</h1></a>
			<?php endif; ?>

			<div class="address"><?php echo wp_kses_post(nl2br(fw_get_opt('site_address', ''))) ?></div>
		</div>

		<div class="col-md-6 second-column" data-mh="dentist-header">
			<?php // display list of social icons
			$socials = fw_get_opt('socials', false);
			if(is_array($socials) && !empty($socials)): ?>

				<div><?php display_socials($socials, 'invert') ?></div>

			<?php else: ?>

				<div class="empty"></div>

			<?php endif; ?>

			<?php dentist_get_lng_switcher() ?>

			<?php // display button for request consultation
			$button_hash = fw_get_opt('request_hash', false);
			if($button_hash) : ?>
			<div><a class="btn btn-lg btn-primary" href="<?php echo esc_attr($button_hash) ?>" data-action="scroll">
					<?php _e('Request a consultation', 'dentist'); ?>
				</a></div>
			<?php endif; ?>
		</div>

	</div>

</div></section>