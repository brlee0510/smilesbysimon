<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

$options = array(
	'container_id' => array(
		'type'     => 'box',
		'title'    => __( 'Page properties', 'dentist' ),
		'priority' => 'core',
		'context'  => 'side',
		'options'  => array(

			'header_mode' => array(
				'type'    => 'select',
				'value'   => 'automatically',
				'label'   => __( 'Page header show mode', 'dentist' ),
				'choices' => array(
					'automatically' => __( 'Automatically', 'dentist' ),
					'hide'          => __( 'Hide anyway', 'dentist' ),
					'show'          => __( 'Show anyway', 'dentist' ),
				)
			),

			'page_title' => array(
				'type'  => 'text',
				'label' => __( 'Alternate page title', 'dentist' ),
				'desc' => __('Will be displayed on the top instead of main title. You can use * symbols to highlight words.', 'dentist')
			),

		)
	)
);