<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Remove "customize" page from menu
 */
add_action( 'admin_menu', '_action_hide_customizer' );
function _action_hide_customizer() {
	global $submenu;
	unset( $submenu['themes.php'][6] );
}