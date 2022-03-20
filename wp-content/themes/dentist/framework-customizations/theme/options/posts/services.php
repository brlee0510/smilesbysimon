<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

$options = array(
	'container_id' => array(
		'type'     => 'box',
		'title'    => __( 'Item properties', 'dentist' ),
		'priority' => 'high',
		'options'  => array(

			'image' => array(
				'type'  => 'upload',
				'label' => __( 'Image', 'dentist' ),
			)

		)
	)
);