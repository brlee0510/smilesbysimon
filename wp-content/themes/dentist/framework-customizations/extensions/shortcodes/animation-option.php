<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

return array(
	'type'  => 'select',
	'value' => '',
	'label' => __('Reveal animation', 'dentist'),
	'desc'  => __('You can see demo of all animations <a href="http://daneden.github.io/animate.css/" target="_blank">here</a>.', 'dentist'),
	'choices' => array(
		'' => __('Empty(no animation)', 'dentist'),

		array(
			'attr'    => array('label' => __('Bouncing Entrances', 'dentist')),
			'choices' => array(
				'wow bounceIn' => 'bounceIn',
				'wow bounceInDown' => 'bounceInDown',
				'wow bounceInLeft' => 'bounceInLeft',
				'wow bounceInRight' => 'bounceInRight',
				'wow bounceInUp' => 'bounceInUp'
			)
		),

		array(
			'attr'    => array('label' => __('Fading Entrances', 'dentist')),
			'choices' => array(
				'wow fadeIn' => 'fadeIn',
				'wow fadeInDown' => 'fadeInDown',
				'wow fadeInDownBig' => 'fadeInDownBig',
				'wow fadeInLeft' => 'fadeInLeft',
				'wow fadeInLeftBig' => 'fadeInLeftBig',
				'wow fadeInRight' => 'fadeInRight',
				'wow fadeInRightBig' => 'fadeInRightBig',
				'wow fadeInUp' => 'fadeInUp',
				'wow fadeInUpBig' => 'fadeInUpBig'
			)
		),

		array(
			'attr'    => array('label' => __('Flippers', 'dentist')),
			'choices' => array(
				'wow flip' => 'flip',
				'wow flipInX' => 'flipInX',
				'wow flipInY' => 'flipInY'
			)
		),

		array(
			'attr'    => array('label' => __('Lightspeed', 'dentist')),
			'choices' => array(
				'wow lightSpeedIn' => 'lightSpeedIn'
			)
		),

		array(
			'attr'    => array('label' => __('Rotating Entrances', 'dentist')),
			'choices' => array(
				'wow rotateIn' => 'rotateIn',
				'wow rotateInDownLeft' => 'rotateInDownLeft',
				'wow rotateInDownRight' => 'rotateInDownRight',
				'wow rotateInUpLeft' => 'rotateInUpLeft',
				'wow rotateInUpRight' => 'rotateInUpRight'
			)
		),

		array(
			'attr'    => array('label' => __('Sliding Entrances', 'dentist')),
			'choices' => array(
				'wow slideInUp' => 'slideInUp',
				'wow slideInDown' => 'slideInDown',
				'wow slideInLeft' => 'slideInLeft',
				'wow slideInRight' => 'slideInRight'
			)
		),

		array(
			'attr'    => array('label' => __('Zoom Entrances', 'dentist')),
			'choices' => array(
				'wow zoomIn' => 'zoomIn',
				'wow zoomInDown' => 'zoomInDown',
				'wow zoomInLeft' => 'zoomInLeft',
				'wow zoomInRight' => 'zoomInRight',
				'wow zoomInUp' => 'zoomInUp'
			)
		),

		array(
			'attr'    => array('label' => __('Specials', 'dentist')),
			'choices' => array(
				'wow hinge' => 'hinge',
				'wow rollIn' => 'rollIn'
			)
		),
	),
);