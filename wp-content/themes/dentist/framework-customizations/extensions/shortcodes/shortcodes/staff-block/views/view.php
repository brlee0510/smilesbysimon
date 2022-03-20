<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

$query = new WP_Query( array(
	'post_type'              => 'staff',
	'cache_results'          => true,
	'update_post_meta_cache' => true,
	'update_post_term_cache' => true,
	'posts_per_page'         => -1
) );

echo '<div class="staff-block big-buttons black-dots">';
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

	$job_title = esc_html(fw_get_db_post_option($post_id, 'job', ''));
	$link = fw_get_db_post_option($post_id, 'link', false);

	$popup_text = fw_get_db_post_option($post_id, 'popup_text', false);
	if(!$link && $popup_text) {
		$link = 'dentist_popup_open';
	}
	?>

	<article class="member">

		<div class="image-wrap">
			<?php if($link): ?>
			<a href="<?php echo esc_attr($link) ?>" class="read-more"><span>
				<i class="fa fa-info"></i>
				<?php _e('Read more', 'dentist') ?>
			</span></a>
			<?php endif; ?>
			<div class="helper"></div>
			<div class="image" style="background-image: url('<?php echo esc_url($image); ?>')"></div>
		</div>

		<?php if($popup_text): ?>
			<div class="staff-popup row zoom-anim-dialog mfp-hide">
				<div class="col-xs-12 col-sm-5 image">
					<img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(get_the_title()) ?>"/>
				</div>

				<div class="col-xs-12 col-sm-7 text">
					<h1 class="name"><?php the_title() ?></h1>
					<?php echo wp_kses_post($popup_text); ?>
					<p><a href="#" class="close-popup"><?php _e('Close', 'dentist') ?></a></p>
				</div>
			</div>
		<?php endif; ?>

		<h1 class="name"><?php the_title() ?></h1>

		<?php if(trim($job_title)) : ?>
			<div class="job-title"><?php echo wp_kses_post($job_title) ?></div>
		<?php endif; ?>

		<?php display_socials(fw_get_db_post_option($post_id, 'socials', false)) ?>
	</article>

<?php endwhile;
wp_reset_postdata();
echo '</div>';