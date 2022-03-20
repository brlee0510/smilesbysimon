<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

// theme slug
$manifest['id'] = 'dentist';

// allowed extensions
$manifest['supported_extensions'] = array(
	'page-builder' => array(),
	'slider'       => array(),
	'backup'       => array(),
	'seo'          => array(),
	'analytics'    => array(),
);

// theme requirements
$manifest['requirements'] = array(
	'wordpress'  => array(
		'min_version' => '4.0',
	),
	'framework'  => array(
		'min_version' => '2.3.0',
		//'max_version' => '2.4.99'
	),
	'extensions' => array(
		'page-builder' => array(),
		'slider'       => array()
	)
);