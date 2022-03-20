<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' ); }

// find the uri to the shortcode folder
$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/gallery-block');

wp_enqueue_script(
	'gallery-block-jqmobile',
	$uri . '/static/js/jquery.mobile.custom.min.js',
	array('jquery')
);

wp_enqueue_script(
	'gallery-block-main',
	$uri . '/static/js/main.js',
	array('jquery')
);