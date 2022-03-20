<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
/**
 * Filters and Actions
 */

if ( ! function_exists( '_action_theme_setup' ) ) : /**
 * Theme setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 * @internal
 */ {
	function _action_theme_setup() {

		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'dentist', get_template_directory() . '/languages' );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );

		// Enable title-tag support
		add_theme_support( 'title-tag' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );
	}
}
endif;
add_action( 'init', '_action_theme_setup' );


/**
 * Dashboard styles & scripts
 */
add_action( 'admin_enqueue_scripts', '_admin_enqueue_scripts' );
function _admin_enqueue_scripts() {

	$translation_array = array(
		'theme_version' => wp_get_theme( get_template() )->get( 'Version' ),
		'theme_name'    => basename( get_template_directory() ),
		'site_url'      => site_url()
	);

	wp_enqueue_script( 'wph-admin-scripts', get_template_directory_uri() . '/public/admin.js', array( 'jquery' ) );
	wp_localize_script( 'wph-admin-scripts', 'DENTIST_DATA', $translation_array );
}


/**
 * Register placeholder functions
 * @internal
 */
add_action( 'init', '_define_proxy_functions' );
function _define_proxy_functions() {

	if(!function_exists('fw_get_opt')):
		function fw_get_opt($index, $default = false) {

			if(!function_exists('fw_get_db_settings_option')) {
				return $default;
			}

			return fw_get_db_settings_option($index, $default);
		}
	endif;

	if ( ! function_exists( 'fw_ext_page_builder_is_builder_post' ) ):
		function fw_ext_page_builder_is_builder_post( $post_id = '' ) {
			return false;
		}
	endif;

}


/**
 * Contact From 7 shortcodes
 * @internal
 */
add_filter( 'wpcf7_form_elements', '_wpcf7_form_elements' );
function _wpcf7_form_elements( $form ) {
	$form = do_shortcode( $form );

	return $form;
}


/**
 * Register widget areas.
 * @internal
 */
function _action_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Widget Area', 'dentist' ),
		'id'            => 'sidebar-blog',
		'description'   => __( 'Appears in the blog section of the site.', 'dentist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h1 class="title">',
		'after_title'   => '</h1>',
	) );
}

add_action( 'widgets_init', '_action_theme_widgets_init' );


/**
 * Excerpt control
 * @internal
 */
function _custom_excerpt_more( $more ) { return '..'; }
function _custom_excerpt_length( $length ) { return 30; }

add_filter( 'excerpt_length', '_custom_excerpt_length', 999 );
add_filter( 'excerpt_more', '_custom_excerpt_more' );


/**
 * Language switcher markup
 * @internal
 */
add_action( 'fw_ext_translation_change_render_language_switcher', '_translation_switcher_markup', 10, 2 );
function _translation_switcher_markup( $html, $frontend_urls ) {
	$html = '';

	$translation = fw()->extensions->get( 'translation' );
	$active_lang = $translation->get_frontend_active_language();

	// render current lang first
	$url = $frontend_urls[$active_lang];
	$lang_code = $active_lang;
	$html .= '<li class="active">' .
	         '<a href="' . esc_attr( $url ) . '">' .
	         strtoupper( $lang_code ) .
	         '<i class="fa fa-caret-down"></i>' .
	         '</a></li>';

	// unset current lang and render others
	unset($frontend_urls[$active_lang]);
	foreach ( $frontend_urls as $lang_code => $url ) {
		$html .= '<li><a href="' . esc_attr( $url ) . '">' . strtoupper( $lang_code ) . '</a></li>';
	}

	return '<ul>' . $html . '</ul>';
}