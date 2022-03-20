<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

$query = new WP_Query( array(
	'post_type'              => 'testimonials',
	'cache_results'          => true,
	'update_post_meta_cache' => true,
	'update_post_term_cache' => true,
	'posts_per_page'         => - 1
) );

echo '<div class="testimonials-block big-buttons black-dots">';
while ( $query->have_posts() ) :
	$query->the_post();
	$post_id = get_the_ID();

	$links = fw_get_db_post_option( $post_id, 'links', array() );
	$city  = fw_get_db_post_option( $post_id, 'author_city', false );
	?>

	<article class="item">
		<div class="post-body">
			<?php the_content() ?>

			<?php if ( ! empty( $links ) ): ?>
				<div class="links"><?php foreach ( $links as $link ): ?>
						<a href="<?php echo esc_attr( $link['url'] ) ?>"><?php echo esc_html( $link['text'] ) ?></a>
					<?php endforeach; ?></div>
			<?php endif; ?>
		</div>

		<h1 class="author">
			<?php echo esc_attr( fw_get_db_post_option( $post_id, 'author', '' ) ); ?>

			<?php if ( $city ): ?>
				<small><?php echo esc_html( $city ) ?></small>
			<?php endif; ?>
		</h1>
	</article>

<?php
endwhile;
wp_reset_postdata();

echo '</div>';