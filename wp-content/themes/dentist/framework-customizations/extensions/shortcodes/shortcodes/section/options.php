<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$animation_settings = array();
$animation_file     = get_template_directory() . '/framework-customizations/extensions/shortcodes/animation-option.php';
if ( file_exists( $animation_file ) ) {
	$animation_settings = include( $animation_file );
}

$options = array(
	'section_anchor' => array(
		'type'  => 'text',
		'label' => __( 'Section anchor', 'dentist' ),
		'desc'  => __( 'For use in menus & navigation.', 'dentist' ),
		'attr'  => array( 'placeholder' => __( 'Will be generated automatically', 'dentist' ) ),
	),

	'is_fullwidth'     => array(
		'label' => __( 'Full Width', 'dentist' ),
		'type'  => 'switch',
	),

	'padding'          => array(
		'label'      => __( 'Vertical padding', 'dentist' ),
		'desc'       => __( 'Please select the vertical gutters for this section', 'dentist' ),
		'type'       => 'slider',
		'properties' => array(
			'min' => 0,
			'max' => 100,
		),
		'value'      => 0
	),

	'animation'        => $animation_settings,

	'animation_delay'  => array(
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

	'background_color' => array(
		'label' => __( 'Background Color', 'dentist' ),
		'desc'  => __( 'Please select the background color', 'dentist' ),
		'type'  => 'color-picker',
	),

	'text_color'       => array(
		'label' => __( 'Text Color', 'dentist' ),
		'desc'  => __( 'Please select the text color', 'dentist' ),
		'type'  => 'color-picker',
	),

	'background_image' => array(
		'label'   => __( 'Background Image', 'dentist' ),
		'desc'    => __( 'Please select the background image', 'dentist' ),
		'type'    => 'background-image',
		'choices' => array()
	),

	'parallax' => array(
		'type'  => 'slider',
		'label' => __( 'Parallax speed', 'dentist' ),
		'desc'  => __( 'Set 0 to disable parallax', 'dentist' ),
		'properties' => array(
			'min'  => -10,
			'max'  => 10,
			'step' => 1
		),
		'value'      => 0
	)
);
