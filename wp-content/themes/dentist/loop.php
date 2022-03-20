<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); } ?>

<?php // display "no posts found" message
if ( ! have_posts() ) {
	get_template_part( 'content', 'none' );

	return;
} ?>

<?php // display single post/page
if ( is_singular() ) {
	the_post();

	if ( is_page() ) {
		get_template_part( 'content', 'page' );
	} else {
		get_template_part( 'content', get_post_type() );
	}

	return;
} ?>

<?php get_template_part('content', 'header'); ?>
<section class="container page-content blog-page"><div class="fw-row">

	<!-- ========= Content ========= -->
	<main class="posts-flow fw-col-sm-7 fw-col-md-8">
		<?php if ( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article class="row">
					<div class="col-md-5 image-col" data-mh="post-<?php the_ID() ?>"> <!-- Image -->
						<a href="<?php echo get_permalink() ?>"></a>
						<div class="img" style="background-image: url('<?php echo esc_url( dentist_get_featured_image() ) ?>')"></div>

						<?php if(is_sticky()): ?>
							<div class="post-badge" title="<?php echo __('Sticky post', 'dentist') ?>">
								<i class="fa fa-star"></i>
							</div>
						<?php endif ?>
					</div>

					<div class="col-md-7 text-col" data-mh="post-<?php the_ID() ?>"> <!-- Date, Title and excerpt -->
						<time datetime="<?php the_time( 'Y-m-d' ) ?>"><?php the_time( 'F j, Y' ) ?></time>
						<h1 class="title"><a href="<?php echo get_permalink() ?>"><?php the_title() ?></a></h1>

						<div class="content"><?php the_excerpt() ?></div>

						<a class="read-more" href="<?php echo get_permalink() ?>">
							<?php _e( 'Read more', 'dentist' ) ?>
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</article>

			<?php endwhile;
		else: ?>
			<p style="text-align: center; margin: 50px 0;"><?php echo __( 'No posts found', 'dentist' ) ?></p>
		<?php endif; ?>

		<?php fw_theme_paging_nav() ?>

	</main>

	<!-- ========= Sidebar ========= -->
	<aside class="sidebar fw-col-sm-5 fw-col-md-4">
		<?php dynamic_sidebar( 'sidebar-blog' ) ?>
	</aside>

</div></section>