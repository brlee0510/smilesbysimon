<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }


/**
 * Run theme health checker
 */
define( 'WPH_DNT_IGNORE_HEALTH_CHECKER', false );
require_once get_template_directory() . '/inc/health_check.php';
if ( defined( 'WPH_DNT_STOP_LOADING' ) && WPH_DNT_STOP_LOADING ) { return; }


/**
 * Theme Includes
 */
require_once get_template_directory() .'/inc/init.php';
require_once get_template_directory() .'/WP-Less-Compilator/wp-less.php';


/**
 * TGM Plugin Activation
 */
require_once dirname( __FILE__ ) . '/TGM-Plugin-Activation/class-tgm-plugin-activation.php';

/** @internal */
function _action_theme_register_required_plugins() {
    $plugins = array(
        array(
            'name'             => 'Unyson',
            'slug'             => 'unyson',
            'required'         => true,
            'force_activation' => true,
        ),

        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false
        ),

        array(
            'name' => 'Bootstrap for Contact Form 7',
            'slug' => 'bootstrap-for-contact-form-7',
            'required' => false
        ),

        array(
            'name'             => 'Dentist CPT',
            'slug'             => 'dentist-cpt',
            'source'           => dirname( __FILE__ ) . '/TGM-Plugin-Activation/dentist-cpt.zip',
            'required'         => true,
            'force_activation' => true,
        )
    );

    $config = array(
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => false,
        'dismiss_msg'  => '',
        'is_automatic' => true,
    );

    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', '_action_theme_register_required_plugins' );


/**
 * Display list of social networks
 *
 * @param $data
 * @param $classes
 */
function display_socials($data, $classes = '') {

	if(!is_array($data) || !$data || empty($data)) {
		return;
	}

	?>
	<ul class="socials-list <?php echo esc_attr($classes) ?>">
		<?php foreach($data as $sn): ?>
			<li><a href="<?php echo esc_url($sn['url']) ?>" title="<?php echo esc_attr($sn['title']) ?>">
					<i class="<?php echo esc_attr($sn['icon']) ?>"></i>
				</a></li>
		<?php endforeach; ?>
	</ul>
<?php }


/**
 * Drop input data to the wp_kses function
 *
 * @param $data
 * @param $tags
 *
 * @return string
 */
function _ckses($data, $tags = 'i,u,em,b,strong,a,div,br,p') {

	$tags = array_map('trim', explode($tags, ','));
	$tags_out = array();

	foreach($tags as $i => $tag) {
		$atts = array();

		switch($tag) {
			case 'a':
				$atts['href'] = array();
				$atts['title'] = array();
				$atts['target'] = array();
				$atts['class'] = array();
				break;

			case 'div':
				$atts['class'] = array();
				$atts['title'] = array();
				$atts['style'] = array();
				break;

			case 'p':
				$atts['class'] = array();
				$atts['style'] = array();
				break;
		}

		$tags_out[$tag] = $atts;
	}

	return wp_kses($data, $tags_out);

}


/**
 * Highlight second part of string
 *
 * @param $title
 *
 * @return string
 */
function dentist_custom_archive_title($title) {

	$title_arr = array_map('trim', explode(':', $title, 2));

	if(sizeof($title_arr) == 2) {
		$title_arr[1] = ' *' . $title_arr[1] . '*';
		$title = join(':', $title_arr);
	}

	return $title;
}


/**
 * Show formatted page title
 *
 * @return array|mixed|null|string
 */
function dentist_display_page_title() {

	if(get_page_template_slug() == 'template-blog.php' || (is_single() && get_post_type() == 'post')
		|| is_home()) { // blog title
		$title = fw_get_opt('blog_title', __('*Our* Blog', 'dentist'));

	} else if(is_category()) { // category page title
		$title = single_cat_title( '', false );

	} else if ( is_archive() ) { // archive page title
		$title = dentist_custom_archive_title( get_the_archive_title() );

	} else if ( is_search() ) { // search results page
		$title = dentist_custom_archive_title(
			__( 'Search results for: ', 'dentist' ) . esc_html( get_search_query() )
		);

	} else if (!have_posts() && !is_page()) {
		$title = __('No posts found', 'dentist');

	} else { // custom page title
		if(function_exists('fw_get_db_post_option')) {
			$title = trim( fw_get_db_post_option( null, 'page_title', '' ) );
		} else {
			$title = false;
		}
	}

	// use standard title instead
	if(!$title) {
		$title = trim(get_the_title());

		// if title contain only two words - highlight first
		if(substr_count($title, ' ') === 1) {
			$title = explode(' ', $title);
			$title[0] = '<i>' . $title[0] . '</i>';

			return implode(' ', $title);
		}

		return $title;
	}

	// format custom title
	$title = preg_replace('/\*([^*]+)\*/', '<i>$1</i>', $title);
	return $title;
}


/**
 * Get featured image with placeholder support
 *
 * @param string $size
 *
 * @return mixed
 */
function dentist_get_featured_image($size = 'medium') {

	if ( function_exists( 'fw_locate_theme_path_uri' ) ) {
		$placeholder = fw_locate_theme_path_uri( '/public/images/placeholder.png' );
	} else {
		$placeholder = get_template_directory_uri() . '/public/images/placeholder.png';
	}

	$image = false;
	if ( has_post_thumbnail() ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id(), $size );
	}

	// fallback
	if ( ! $image || !isset( $image[0] ) || !trim( $image[0] ) ) {
		$image = array( $placeholder );
	}

	return $image[0];
}


/**
 * Echo pluralised comment count
 */
function dentist_comment_count() {

	if(!comments_open()) {
		_e('Comments closed', 'dentist');
	} else {
		printf( _n( '1 comment', '%s comments', get_comments_number(), 'dentist' ), get_comments_number() );
	}

}


/**
 * Clean string from any symbols excluding numbers
 *
 * @param $str
 *
 * @return mixed
 */
function dentist_clear_str($str) {
	return preg_replace('/[^0-9]+/', '', $str);
}


/**
 * Display language switcher if available
 */
function dentist_get_lng_switcher() {

	if(!function_exists('fw')) {
		return;
	}

	// Unyson translation extension
	// rendered via function in /inc/hooks.php file
	$translation_ext = fw()->extensions->get('translation');
	if($translation_ext) {
		echo '<div class="lang-selector">';
		echo $translation_ext->frontend_language_switcher();
		echo '</div>';

		return;
	}

	// WPML
	if ( function_exists( 'icl_get_languages' ) ) {
		$languages = icl_get_languages(); usort($languages, 'dentist_sort_lngs');
		$langs     = array();

		foreach ( $languages as $l ) {
			if($l['active']) {
				$langs[] = '<li class="active"><a href="' . esc_attr($l['url']) . '">' .
				           strtoupper($l['language_code']) .
				           '<i class="fa fa-caret-down"></i>' .
				           '</a></li>';
			} else {
				$langs[] = '<li><a href="' . esc_attr($l['url']) . '">' .
				           strtoupper($l['language_code']) .
				           '</a></li>';
			}
		}

		echo '<div class="lang-selector">';
		echo '<ul>' . join( '', $langs ) . '</ul>';
		echo '</div>';

		return;
	}

}

/**
 * Get languages in correct order
 * @internal
 *
 * @return int
 */
function dentist_sort_lngs($a, $b) {
	return ($a['active']) ? -1 : 1;
}