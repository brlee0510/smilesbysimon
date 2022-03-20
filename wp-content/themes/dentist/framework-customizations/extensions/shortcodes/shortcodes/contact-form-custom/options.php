<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'form-width'     => array(
		'type'       => 'slider',
		'label'      => __( 'Form block width', 'dentist' ),
		'help'       => __( 'in pixels.', 'dentist' ),
		'value'      => 650,
		'properties' => array(
			'min' => 450,
			'max' => 1000,
			'step' => 50,
		),
	),

	'form-bg-color' => array(
		'type'  => 'color-picker',
		'label' => __( 'Form block background', 'dentist' ),
		'value' => '#FFFFFF'
	),

	'form-shortcode' => array(
		'type'  => 'text',
		'label' => __( 'Form shortcode', 'dentist' ),
		'desc'  => __( 'Get them from your contact form plugin like <em>Contact form 7</em>.', 'dentist' )
	)

);