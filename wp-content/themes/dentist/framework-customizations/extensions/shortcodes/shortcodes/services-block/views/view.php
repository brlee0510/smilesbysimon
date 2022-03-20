<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

$query = new WP_Query( array(
	'post_type'              => 'services',
	'cache_results'          => true,
	'update_post_meta_cache' => true,
	'update_post_term_cache' => true,
	'posts_per_page'         => -1
) );

echo '<div class="services-block block-grid-xs-2 block-grid-md-4">';
while ( $query->have_posts() ) :
	$query->the_post();
	$post_id = get_the_ID();

	// processing image
	$image = fw_get_db_post_option($post_id, 'image', false);
	if(!isset($image['url'])) {
		$image = get_template_directory_uri() . '/public/images/placeholder.png';
	} else {
		$image = $image['url'];
	}

	?>

	<article class="item" data-id="<?php echo esc_attr($post_id) ?>"><div class="content">
		<div class="helper"></div>
		<div class="image"
		     style="background-image: url('<?php echo esc_url($image); ?>')"
		     data-img-url="<?php echo esc_url($image); ?>"></div>

		<h1 class="title"><?php the_title() ?></h1>
		<div class="post-body"><?php the_content() ?></div>
	</div></article>

<?php endwhile; wp_reset_postdata(); ?></div>

<article class="single-view services row">
	<div class="text-column col-sm-8"></div>
	<div class="image-column col-sm-4"></div>
</article>