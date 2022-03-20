<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); } ?>

<?php get_template_part('content', 'header'); ?>
<section class="container page-content blog-page"><div class="fw-row">

	<!-- ========= Content ========= -->
	<main <?php post_class(array('post-content',  'fw-col-sm-7', 'fw-col-md-8')) ?>>

		<!-- Featured image -->
		<?php if(has_post_thumbnail()): ?>
			<img src="<?php echo esc_url( dentist_get_featured_image('large') ) ?>" alt="" class="featured-image"/>
		<?php endif; ?>

		<!-- Post header (title & date) -->
		<header class="post-head">
			<time datetime="<?php the_time( 'Y-m-d' ) ?>"><?php the_time( 'F j, Y' ) ?></time>
			<h1 class="title">
				<a href="<?php echo get_permalink() ?>"><?php the_title() ?></a>
				<?php if(is_sticky()): ?>
					<i class="fa fa-star post-sticky-badge" title="<?php echo __('Sticky post', 'dentist') ?>"></i>
				<?php endif ?>
			</h1>
		</header>

		<!-- Post content -->
		<div class="the-content"><?php the_content() ?></div>

		<!-- pagination -->
		<?php wp_link_pages(); ?>

		<!-- Post footer (tags & sharing) -->
		<footer class="post-footer row">
			<div class="col-sm-6 tags"> <!-- tags -->
				<?php if(get_the_tags()): ?>
					<div class="tagcloud"><?php the_tags( '', ' ' ); ?></div>
				<?php else: ?>
					<div class="text-muted"><?php _e('Tags are not defined for this post', 'dentist') ?></div>
				<?php endif; ?>
			</div>

			<div class="col-sm-6 share"> <!-- sharing buttons -->
				<?php fw_post_sharing_buttons('social-likes_single') ?>
			</div>
		</footer>

		<!-- Comments flow -->
		<?php comments_template(); ?>

	</main>

	<!-- ========= Sidebar ========= -->
	<aside class="sidebar fw-col-sm-5 fw-col-md-4">
		<?php dynamic_sidebar( 'sidebar-blog' ) ?>
	</aside>

</div></section>