<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

$options = array(
	'container_id' => array(
		'type'     => 'box',
		'title'    => __( 'User settings', 'dentist' ),
		'priority' => 'high',
		'options'  => array(

			'job'     => array(
				'type'  => 'text',
				'label' => __( 'Job title', 'dentist' )
			),

			'image'   => array(
				'type'  => 'upload',
				'label' => __( 'Member photo', 'dentist' ),
			),

			'link' => array(
				'type'  => 'text',
				'label' => __('Attach link', 'dentist'),
				'desc'  => __('Leave empty to remove link', 'dentist'),
			),

			'socials' => array(
				'label'         => __( 'Social networks', 'dentist' ),
				'type'          => 'addable-popup',
				'template'      => '{{- title }}',
				'popup-options' => array(
					'title' => array(
						'label' => __( 'Network title', 'dentist' ),
						'type'  => 'text',
					),
					'url'   => array(
						'label' => __( 'Network profile URL', 'dentist' ),
						'type'  => 'text',
					),
					'icon'  => array(
						'label' => __( 'Network icon', 'dentist' ),
						'type'  => 'icon',
					),
				)
			),

			'popup_text' => array(
				'type'          => 'wp-editor',
				'label'         => __( 'Popup text', 'dentist' ),
				'desc'          => __( 'Leave empty to remove popup. Can\'t be used with link attached.', 'dentist' ),
				'tinymce'       => true,
				'media_buttons' => true,
				'teeny'         => false,
				'wpautop'       => true,
				'reinit'        => false,
				'size'          => 'large', // small | large
				'editor_type'   => 'tinymce',
				'editor_height' => 400
			)

		)
	)
);