<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'overlay' => array(
		'type'  => 'switch',
		'value' => 'show',
		'label' => __('Dark overlay', 'dentist'),
		'desc'  => __('Each slide have semi-transparent dark layer between text and background image. This did to increase contrast and readability of slide text. You can hide that layer with this option.', 'dentist'),
		'left-choice' => array(
			'value' => 'show',
			'label' => __('Show', 'dentist'),
		),
		'right-choice' => array(
			'value' => 'hide',
			'label' => __('Hide', 'dentist'),
		),
	),

	'text_position' => array(
		'label'   => __( 'Text position', 'dentist' ),
		'desc'    => __( 'Where text will be placed on this slide', 'dentist' ),
		'type'    => 'select',
		'choices' => array(
			'center' => __( 'Center', 'dentist' ),
			'left'   => __( 'On the left side', 'dentist' ),
			'right'  => __( 'On the right side', 'dentist' )
		),
		'value'   => 'center',
	),

	// button
	'button'        => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'enable' => array(
				'label'        => __( 'Add a button?', 'dentist' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => __( 'Yes', 'dentist' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => __( 'No', 'dentist' )
				),
				'value'        => 'no',
			)
		),
		'choices'      => array(
			'yes' => array(
				'text' => array(
					'type'  => 'text',
					'label' => __( 'Button text', 'dentist' ),
				),
				'url'  => array(
					'type'  => 'text',
					'label' => __( 'Button URL', 'dentist' ),
				),
			),
			'no'  => array()
		),
		'show_borders' => false,
	),
);

