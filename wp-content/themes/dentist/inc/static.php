<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Include static files: javascript and css
 */

if ( is_admin() ) {
	return;
}


/**
 * Load required JavaScripts
 */
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

wp_enqueue_script( 'js-modernizr', get_template_directory_uri() . '/public/js/vendor/modernizr.custom.js' );

// lazy method :)
$scripts = array(
	'/js/assets/slick.js',
	'/js/assets/tinynav.js',
	'/js/assets/scrollspy.js',
	'/js/assets/smoothScroll.js',
	'/js/assets/scrollReveal.js',
	'/js/assets/wow.js',
	// '/js/assets/retina.js', - not needed for now
	'/js/assets/masonry.js',
	'/js/assets/imagesLoaded.js',
	'/js/assets/bgCheck.js',
	'/js/assets/social-likes.js',
	'/js/assets/magnific-popup.js',
	'/js/assets/matchHeight.js',
	'/js/assets/parallax.js',
	'/js/main.js',
);

foreach ( $scripts as $script ) {
	$handle  = basename( $script, '.js' );
	$handle  = str_replace( 'jq.', '', $handle );
	$handle  = 'dentist-js-' . strtolower( $handle );
	$script  = '/public' . $script;
	$js_path = get_template_directory_uri() . $script;

	if ( file_exists( get_stylesheet_directory() . $script ) ) {
		$js_path = get_stylesheet_directory_uri() . $script;
	}

	wp_enqueue_script( $handle, $js_path, array( 'jquery' ), '', true );
}

// child theme support
if ( file_exists( get_stylesheet_directory() . '/js/scripts.js' ) ) {
	wp_enqueue_script( 'child-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array(), '', true );
}

/**
 * Localize scripts
 */
$translation_array = array(
	'back_to_services' => __( 'Back to services list', 'dentist' ),
);
wp_localize_script( 'dentist-js-main', 'DentistLG', $translation_array );



/**
 * Load fonts
 *
 * fonts are included via standard VafPress method:
 * http://vafpress.com/documentation/vafpress-framework/usage-sample/google-web-fonts.html
 */
VP_Site_GoogleWebFont::instance()->add(
	'Droid Serif',
	array('400italic')
);
VP_Site_GoogleWebFont::instance()->add(
	fw_get_opt('primary-font/family'),
	array(fw_get_opt('primary-font/style'), '300', '400', '400italic', '700')
);
VP_Site_GoogleWebFont::instance()->add(
	fw_get_opt('secondary-font/family'),
	fw_get_opt('secondary-font/style'),
	array('normal', 'italic')
);

VP_Site_GoogleWebFont::instance()->register_and_enqueue();


/**
 * Pass data to LESS engine
 */
add_filter( 'less_vars', '_set_less_vars', 10, 2 );
function _set_less_vars( $vars ) {

	if(!is_array($vars)) {
		$vars = array();
	}

	// general
	$vars['assetsdir']     = '~"' . get_template_directory_uri() . '/public"';
	$vars['head-info-height'] = fw_get_opt( 'header_height', '40' ) . 'px';

	// fonts
	$default_fonts                  = '"Helvetica Neue", Helvetica, Arial, sans-serif';
	$vars['font-family-sans-serif'] = '"' . fw_get_opt( 'primary-font/family', 'Open Sans' ) . '", ' . $default_fonts;

	$vars['font-weight-base']      = dentist_clear_str( fw_get_opt( 'primary-font/style', 'normal' ) );
	$vars['font-size-base']        = fw_get_opt( 'primary-font/size', '14' ) . 'px';
	$vars['secondary-font-family'] = '"' . fw_get_opt( 'secondary-font/family', 'Georgia' ) . '", ' . $vars['font-family-sans-serif'];

	$vars['headings-font-weight'] = dentist_clear_str( fw_get_opt( 'secondary-font/style', '300' ) );

	// colors
	$vars['brand-primary']     = fw_get_opt( 'primary-color', '#2488dd' );
	$vars['text-color']        = fw_get_opt( 'primary-font/color', '#000000' );
	$vars['body-bg']           = fw_get_opt( 'body-bg', '#ffffff' );
	$vars['footer-bg']         = fw_get_opt( 'footer-bg', '#1a171b' );
	$vars['footer-text-color'] = fw_get_opt( 'footer-text-color', '#f3f3f3' );

	return $vars;
}


/**
 * Load required styles
 */
wp_enqueue_style( 'twbs', get_template_directory_uri() . '/public/less/bootstrap.less' );
wp_enqueue_style( 'flaticons', get_template_directory_uri() . '/public/flaticon/flaticon.css' );
wp_enqueue_style( 'animate-module', get_template_directory_uri() . '/public/animate.css' );

wp_dequeue_style('fw-font-awesome'); // hack for older versions of unyson
wp_enqueue_style('font-awesome', get_template_directory_uri() . '/public/fontawesome/font-awesome.css');

if(!function_exists('fw')) { // apply unyson grid if plugin isn't active
	wp_enqueue_style('fw-grid-system', get_template_directory_uri() . '/public/fw-grid.css');
}

wp_enqueue_style( 'style-main', get_template_directory_uri() . '/public/less/style.less' );
wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style.css', array( 'fw-font-awesome' ) );