<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

$query = new WP_Query( array(
	'post_type'              => 'gallery',
	'cache_results'          => true,
	'update_post_meta_cache' => true,
	'update_post_term_cache' => true,
	'posts_per_page'         => -1
) );

echo '<div class="gallery-block big-buttons block-grid-xs-1 block-grid-sm-2">';
while ( $query->have_posts() ) :
	$query->the_post();
	$post_id = get_the_ID();

	// processing first image
	$image_1 = fw_get_db_post_option($post_id, 'image_before', false);
	if(!isset($image_1['url'])) {
		$image_1 = get_template_directory_uri() . '/public/images/gallery-placeholder.png';
	} else {
		$image_1 = $image_1['url'];
	}

	// processing second image
	$image_2 = fw_get_db_post_option($post_id, 'image_after', false);
	if(!isset($image_2['url'])) {
		$image_2 = false;
	} else {
		$image_2 = $image_2['url'];
	}
?>

<div class="item"><?php if($image_2 === false): ?>

	<figure class="one_image">
		<a href="<?php echo esc_attr($image_1); ?>">
			<img src="<?php echo esc_attr($image_1); ?>" alt="<?php echo esc_attr(the_title('', '', false)) ?>"/>
		</a>
		<figcaption><?php the_title() ?></figcaption>
	</figure>

<?php else: ?>

	<figure class="cd-image-container">
		<img src="<?php echo esc_attr($image_2) ?>" alt="<?php echo esc_attr(the_title('', '', false)) ?>"/>
		<span class="cd-image-label" data-type="original"><?php _e('After', 'dentist') ?></span>

		<div class="cd-resize-img">
			<img src="<?php echo esc_attr($image_1) ?>" alt="<?php echo esc_attr(the_title('', '', false)) ?>"/>
			<span class="cd-image-label" data-type="modified"><?php _e('Before', 'dentist') ?></span>
		</div>

		<span class="cd-handle" title="<?php _e('Slide the blue tab to the left or right to view the before and after images', 'dentist') ?>">
			<i></i><i></i><i></i>
		</span>
	</figure>

	<div class="caption"><?php the_title() ?></div>

	<?php endif; ?></div>

<?php
endwhile;
wp_reset_postdata();

echo '</div>';