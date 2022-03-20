<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$animation_settings = array();
$animation_file = get_template_directory() . '/framework-customizations/extensions/shortcodes/animation-option.php';
if(file_exists($animation_file)) {
	$animation_settings = include($animation_file);
}

$options = array(

	'animation' => $animation_settings,

	'animation_delay' => array(
		'type'       => 'slider',
		'label'      => __( 'Animation delay', 'dentist' ),
		'desc'       => __( 'Delay before animation starts', 'dentist' ),
		'value'      => 0,
		'properties' => array(
			'min'  => 0,
			'max'  => 1000,
			'step' => 100,
		),
	),

);
