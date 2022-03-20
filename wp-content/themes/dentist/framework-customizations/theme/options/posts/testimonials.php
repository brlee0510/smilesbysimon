<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

$options = array(
	'container_id' => array(
		'type'     => 'box',
		'title'    => __( 'Item properties', 'dentist' ),
		'priority' => 'high',
		'options'  => array(

			'author'      => array(
				'type'  => 'text',
				'label' => __( 'Author name', 'dentist' )
			),

			'author_city' => array(
				'type'  => 'text',
				'label' => __( 'Author city', 'dentist' )
			),

			'links'       => array(
				'type'        => 'addable-box',
				'label'       => __( 'Additional links', 'dentist' ),
				'box-options' => array(
					'text' => array(
						'type'  => 'text',
						'label' => __( 'Link text', 'dentist' )
					),
					'url'  => array(
						'type'  => 'text',
						'label' => __( 'Link URL', 'dentist' )
					),
				),
				'template'    => '{{- text }}', // box title
				'limit'       => 0,
			)

		)
	)
);