<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); } ?>

<?php
$header_mode = fw_get_db_post_option( null, 'header_mode', 'automatically' );
$is_builder = fw_ext_page_builder_is_builder_post(get_the_ID());

//var_dump(fw_get_db_post_option( get_the_ID(), 'page-builder' ));

// header modes
if($header_mode == 'automatically' && !$is_builder) {
	get_template_part('content', 'header');

} else if($header_mode == 'show') {
	get_template_part('content', 'header');
}

// show the builder content without any markup
if($is_builder) {
	the_content();
	return;
}

?>

<!-- ========= Page content ========= -->
<section <?php post_class(array('page-content',  'container')) ?>>
	<?php the_content() ?>

	<!-- pagination -->
	<?php wp_link_pages(); ?>
</section>

<!-- ========= Socials ========= -->
<section class="container page-socials"><?php fw_post_sharing_buttons() ?></section>