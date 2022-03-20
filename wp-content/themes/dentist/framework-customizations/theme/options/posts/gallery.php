<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

$options = array(
	'container_id' => array(
		'type'     => 'box',
		'title'    => __( 'Item properties', 'dentist' ),
		'priority' => 'high',
		'options'  => array(

			'image_before' => array(
				'type'  => 'upload',
				'label' => __( 'Image(before)', 'dentist' ),
			),

			'image_after' => array(
				'type'  => 'upload',
				'label' => __( 'Image(after)', 'dentist' ),
			),

			'image_note' => array(
				'type'  => 'html',
				'label' => __('Note', 'dentist'),
				'html'  => __('You <b>can</b> upload only first image(before) and this item will be shown <b>without</b> comparison bar.', 'dentist'),
			)

		)
	)
);