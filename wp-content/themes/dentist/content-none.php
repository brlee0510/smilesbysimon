<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); } ?>

<?php get_template_part('content', 'header'); ?>

<section class="container"><div class="fw-row">

	<!-- ========= Content ========= -->
	<main class="posts-flow fw-col-sm-7 fw-col-md-8">
		<?php if ( is_front_page() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'dentist' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'dentist' ); ?></p>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'dentist' ); ?></p>

		<?php endif; ?>
	</main>

	<!-- ========= Sidebar ========= -->
	<aside class="sidebar fw-col-sm-5 fw-col-md-4">
		<?php dynamic_sidebar( 'sidebar-blog' ) ?>
	</aside>

</div></section>