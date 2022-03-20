<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Template Name: Blog Page
 */

get_header();

$dentist_paged = (int) get_query_var('paged', 1);
if($dentist_paged < 0) $dentist_paged = 1;
query_posts('post_type=post&post_status=publish&paged='. $dentist_paged);

get_template_part('loop');

get_footer();