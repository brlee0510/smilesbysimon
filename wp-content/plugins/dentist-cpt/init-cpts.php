<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Register a services post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
$args = array(
	'label'              => __( 'Services', 'dentist' ),
	'labels'             => array(
		'add_new_item' => __( 'Add new service', 'dentist' ),
		'add_new'      => __( 'Add new', 'dentist' )
	),
	'public'             => false,
	'show_ui'            => true,
	'menu_icon'          => 'dashicons-hammer',
	'supports'           => array(
		'title',
		'editor',
		'custom-fields',
		'revisions',
		'page-attributes'
	)
);
register_post_type( 'services', $args );


/**
 * Register a staff post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
$args = array(
	'label'              => __( 'Staff', 'dentist' ),
	'labels'             => array(
		'add_new_item' => __( 'Add new member', 'dentist' ),
		'add_new'      => __( 'Add new', 'dentist' )
	),
	'public'             => false,
	'show_ui'            => true,
	'menu_icon'          => 'dashicons-groups',
	'supports'           => array(
		'title',
		'custom-fields',
		'revisions',
		'page-attributes'
	)
);
register_post_type( 'staff', $args );


/**
 * Register a gallery post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
$args = array(
	'label'              => __( 'Gallery', 'dentist' ),
	'labels'             => array(
		'add_new_item' => __( 'Add new item', 'dentist' ),
		'add_new'      => __( 'Add new', 'dentist' )
	),
	'public'             => false,
	'show_ui'            => true,
	'menu_icon'          => 'dashicons-screenoptions',
	'supports'           => array(
		'title',
		'custom-fields',
		'revisions',
		'page-attributes'
	)
);
register_post_type( 'gallery', $args );


/**
 * Register a testimonial post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
$args = array(
	'label'              => __( 'Testimonials', 'dentist' ),
	'labels'             => array(
		'add_new_item' => __( 'Add new item', 'dentist' ),
		'add_new'      => __( 'Add new', 'dentist' )
	),
	'public'             => false,
	'show_ui'            => true,
	'menu_icon'          => 'dashicons-format-chat',
	'supports'           => array(
		'title',
		'editor',
		'custom-fields',
		'revisions',
		'page-attributes'
	)
);
register_post_type( 'testimonials', $args );