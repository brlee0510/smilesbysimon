<?php if (!defined('FW')) die('Forbidden');

// find the uri to the shortcode folder
$uri = fw_get_template_customizations_directory_uri('/extensions/shortcodes/shortcodes/photoset-grid');

wp_enqueue_script(
	'photoset-grid-js',
	$uri . '/static/js/photoset-grid.js',
	array('jquery')
);

wp_enqueue_script(
	'photoset-grid-main-js',
	$uri . '/static/js/main.js',
	array('jquery')
);