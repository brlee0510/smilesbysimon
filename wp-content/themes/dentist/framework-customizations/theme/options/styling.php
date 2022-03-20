<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'styling' => array(
		'title'   => __( 'Styling', 'dentist' ),
		'type'    => 'tab',
		'options' => array(

			// fonts box
			'fonts-box'  => array(
				'title'   => __( 'Fonts', 'dentist' ),
				'type'    => 'box',
				'options' => array(

					// text font
					'primary-font'   => array(
						'type'       => 'typography',
						'label'      => __( 'Primary font', 'dentist' ),
						'desc'       => __( 'Used in regular text blocks & menus and etc.', 'dentist' ),
						'value'      => array(
							'family' => 'Open Sans',
							'size'   => 14,
							'style'  => 'regular',
							'color'  => '#000000'
						),
						'components' => array(
							'family' => true,
							'size'   => true,
							'color'  => true
						),
					),

					// headings font
					'secondary-font' => array(
						'type'       => 'typography',
						'label'      => __( 'Secondary font', 'dentist' ),
						'desc'       => __( 'Used in headings & sliders.', 'dentist' ),
						'value'      => array(
							'family' => 'Georgia',
							'style'  => '300',
						),
						'components' => array(
							'family' => true,
							'size'   => false,
							'color'  => false,
							'style'  => true
						),
					)

				)
			),

			// colors box
			'colors-box' => array(
				'title'   => __( 'Colors', 'dentist' ),
				'type'    => 'box',
				'options' => array(

					'primary-color'     => array(
						'type'  => 'color-picker',
						'label' => __( 'Primary color', 'dentist' ),
						'desc'  => __( 'Used in buttons, links and most other controls.', 'dentist' ),
						'value' => '#2488dd'
					),
					'body-bg'           => array(
						'type'  => 'color-picker',
						'label' => __( 'Site background', 'dentist' ),
						'value' => '#ffffff'
					),
					'footer-bg'         => array(
						'type'  => 'color-picker',
						'label' => __( 'Footer background', 'dentist' ),
						'value' => '#1a171b'
					),
					'footer-text-color' => array(
						'type'  => 'color-picker',
						'label' => __( 'Footer text color', 'dentist' ),
						'value' => '#f3f3f3'
					)

				)
			),

			// custom css / js block
			'cssjs-box' => array(
				'title'   => __( 'Custom CSS / JS', 'dentist' ),
				'type'    => 'box',
				'options' => array(

					'custom_js'  => array(
						'type'  => 'textarea',
						'value' => '',
						'label' => __( 'Custom JS', 'dentist' ),
						'desc'  => __( 'If you are going to use jQuery in this field – please keep in mind that WordPress by default uses a conflict-free version of jQuery. So, instead of <code>$</code> you need to use <code>jQuery</code> variable.',
							'dentist' ),
					),
					'custom_css' => array(
						'type'  => 'textarea',
						'value' => '',
						'label' => __( 'Custom CSS', 'dentist' ),
						'desc'  => __( 'Will be applied after main styles in head section of site. Here you can overwrite all default styles.', 'dentist' )
					),

				)
			),
		)
	)
);