<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'general' => array(
		'title'   => __( 'General', 'dentist' ),
		'type'    => 'tab',
		'options' => array(
			'general-box' => array(
				'title'   => __( 'Logo and favicon', 'dentist' ),
				'type'    => 'box',
				'options' => array(

					// logo
					'logo'    => array(
						'type'         => 'multi-picker',
						'label'        => false,
						'desc'         => false,
						'picker'       => array(
							'type' => array(
								'label'        => __( 'Logo type', 'dentist' ),
								'type'         => 'switch',

								'right-choice' => array(
									'value' => 'image',
									'label' => __( 'Image', 'dentist' )
								),

								'left-choice'  => array(
									'value' => 'text',
									'label' => __( 'Text', 'dentist' )
								),

								'value'        => 'yes',
							)
						),
						'choices'      => array(
							'image' => array(
								'image' => array(
									'type'  => 'upload',
									'label' => __( 'Logo image', 'dentist' ),
								),
							),

							'text'  => array(
								'text' => array(
									'type'  => 'text',
									'label' => __( 'Logo text', 'dentist' ),
									'desc'  => __( 'Write your website logo name', 'dentist' ),
									'value' => get_bloginfo( 'name' )
								)
							),
						),

						'show_borders' => false,
					),

					'header_height' => array(
						'type'       => 'slider',
						'value'      => 40,
						'properties' => array(
							'min'  => 40,
							'max'  => 200,
							'step' => 10,
						),
						'label'      => __( 'Header height', 'dentist' )
					),

					// button hash
					'request_hash' => array(
						'type'  => 'text',
						'label' => __( 'URL for "Request consultation" button', 'dentist' ),
						'desc'  => __( 'Only for button in header.', 'dentist' ),
						'value' => '#consultation'
					),

					// blog page title
					'blog_title' => array(
						'type' => 'text',
						'label' => __('Title for blog pages', 'dentist'),
						'value' => __('*Our* Blog', 'dentist'),
						'desc' => __('You can use * symbols to highlight words.', 'dentist')
					)
				)
			),

			// phone & address
			'data-box' => array(
				'title'   => __( 'Phone and address', 'dentist' ),
				'type'    => 'box',
				'options' => array(

					// phone
					'site_phone' => array(
						'type'  => 'text',
						'label' => __( 'Site phone', 'dentist' ),
						'desc'  => __( 'Will be shown in site header', 'dentist' ),
						'value' => '800 111 22 1234'
					),

					// address
					'site_address' => array(
						'type'  => 'textarea',
						'label' => __( 'Site address', 'dentist' ),
						'desc'  => __( 'Also will be shown in site header', 'dentist' ),
						'value' => "120 East 56th Street,\r\nSuite 610 New York."
					),

				)
			),

			// social networks
			'socials-box' => array(
				'title'   => __( 'Social networks', 'dentist' ),
				'type'    => 'box',
				'options' => array(

					'socials' => array(
						'label'         => __( 'Social networks', 'dentist' ),
						'type'          => 'addable-popup',
						'template'      => '{{- title }}',
						'popup-options' => array(
							'title' => array(
								'label' => __( 'Network title', 'dentist' ),
								'type'  => 'text',
							),

							'url' => array(
								'label' => __( 'Network profile URL', 'dentist' ),
								'type'  => 'text',
							),

							'icon' => array(
								'label' => __( 'Network icon', 'dentist' ),
								'type'  => 'icon',
							),
						)
					),

				)
			),

			// footer text
			'footer-box' => array(
				'title'   => __( 'Footer text', 'dentist' ),
				'type'    => 'box',
				'options' => array(

					'footer_text' => array(
						'type' => 'textarea',
						'label' => __('Text to display in the footer', 'dentist'),
						'value' => '&copy; 2015. DESIGNED BY <a href="http://wphunters.com/">WPHUNTERS</a>'
					)
				)
			),
		)
	)
);

if ( ! function_exists( 'has_site_icon' ) ) {
	$favicon = array(
		'label' => __( 'Favicon', 'dentist' ),
		'desc'  => __( 'Upload a favicon image', 'dentist' ),
		'type'  => 'upload'
	);

	fw_aks( 'general/options/general-box/options/favicon', $favicon, $options );
}