<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'transition' => array(
		'label' => __('Type of Transition', 'dentist'),
		'desc'  => __('Type of transition between slides', 'dentist'),
		'type'  => 'select',
		'choices' => array(
			'horizontal' => __('Horizontal', 'dentist'),
			'vertical' => __('Vertical', 'dentist'),
			'fade' => __('Fade', 'dentist')
		),
		'value' => 'horizontal',
	),

	'speed' => array(
		'type'  => 'slider',
		'value' => 5,
		'properties' => array(
			'min' => 1,
			'max' => 30,
			'sep' => 1,
		),
		'label' => __('Autoplay speed', 'dentist'),
		'desc'  => __('In seconds', 'dentist'),
	)
);
