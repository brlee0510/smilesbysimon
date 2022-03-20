<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'icons' => array(
		'type' => 'addable-popup',
		'label' => __('Icons', 'dentist'),
		'size' => 'medium',
		'template' => '{{- text }}',

		'popup-options' => array(

			'icon' => array(
				'type' => 'icon',
				'label' => __('Choose icon', 'dentist')
			),

			'text' => array(
				'type' => 'textarea',
				'label' => __('Choose text', 'dentist')
			)

		),
	)

);