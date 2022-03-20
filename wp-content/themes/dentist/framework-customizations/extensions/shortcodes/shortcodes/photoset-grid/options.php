<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'lightbox' => array(
		'type'         => 'switch',
		'value'        => true,
		'label'        => __( 'Enable lightbox for images?', 'dentist' ),
		'left-choice'  => array(
			'value' => false,
			'label' => __( 'No', 'dentist' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => __( 'Yes', 'dentist' ),
		),
	),

	'layout'   => array(
		'type'  => 'text',
		'label' => __( 'Layout', 'dentist' ),
		'desc'  => __( '<b>Example. 2331</b>: 1st row has 2 images, 2nd row has 3 images, 3rd row has 3 images, and 4th row has 1 image. <br/> Total of 9 images.', 'dentist' )
	),

	'images'   => array(
		'type'   => 'addable-option',
		'value'  => array(),
		'label'  => __( 'Images', 'dentist' ),
		'option' => array( 'type' => 'upload' ),
	)

);