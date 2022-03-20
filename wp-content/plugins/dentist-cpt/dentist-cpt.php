<?php /*
Plugin Name: Dentist CPT
Plugin URI: http://themeforest.net/item/dentist-a-responsive-one-page-wordpress-theme/12242997
Description: Dentist custom post type's for only dentist wp theme.
Version: 1.0
Author: WPHunters
Author URI: http://wphunters.com
License: GPLv2
*/

add_action('init', 'dentist_init_cpts');
function dentist_init_cpts() {
	$cptFile = dirname(__FILE__) . '/init-cpts.php';
	if(!file_exists($cptFile)) return;

	include $cptFile;
}