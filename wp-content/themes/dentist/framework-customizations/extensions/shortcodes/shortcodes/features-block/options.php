<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$icons_url = get_template_directory_uri() . '/public/flaticon/index.html';
$options = array(

	'features' => array(
		'type'          => 'addable-popup',
		'label'         => __( 'Features list', 'dentist' ),
		'size'          => 'medium',
		'template'      => '{{- title }}',
		'popup-title'   => __( 'Add feature', 'dentist' ),
		'popup-options' => array(

			'title' => array(
				'type'  => 'text',
				'label' => __( 'Feature text', 'dentist' )
			),

			'icon'    => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'type' => array(
						'label'        => __( 'Icon type', 'dentist' ),
						'type'         => 'switch',

						'right-choice' => array(
							'value' => 'fa',
							'label' => __( 'Font Awesome', 'dentist' )
						),

						'left-choice'  => array(
							'value' => 'custom',
							'label' => __( 'Custom', 'dentist' )
						),

						'value'        => 'fa',
					)
				),

				'choices'      => array(
					'fa' => array(
						'icon' => array(
							'type'  => 'icon',
							'label' => __( 'Choose icon', 'dentist' ),
						),
					),

					'custom'  => array(
						'icon' => array(
							'type'  => 'text',
							'label' => __( 'CSS class', 'dentist' ),
							'desc'  => __( 'Read more about bundled custom icon font <a href="'.$icons_url.'" target="_blank">here</a>.', 'dentist' ),
							'value' => ''
						)
					),
				),

				'show_borders' => false,
			),

		),
	)

);