<?php if (!defined('FW')) die('Forbidden'); ?>

<div class="photoset-grid <?php if(@$atts['lightbox'] == 1) echo 'with-lightbox' ?>"
     data-layout="<?php echo esc_attr($atts['layout']) ?>">

	<?php foreach($atts['images'] as $img): ?>

		<?php $alt = get_post_meta( $img['attachment_id'], '_wp_attachment_image_alt', true); ?>
		<img src="<?php echo esc_url($img['url']) ?>" alt="<?php echo esc_attr($alt); ?>"/>

	<?php endforeach; ?>

</div>