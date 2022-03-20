<?php if (!defined('FW')) die('Forbidden');

if(!is_numeric($dimensions['height']) || $dimensions['height'] < 0) {
	$dimensions['height'] = 500;
}

?>

<?php if (isset($data['slides'])): ?>

	<section class="hero-slider"
	         data-transition="<?php echo esc_attr($data['settings']['extra']['transition']) ?>"
	         data-speed="<?php echo esc_attr($data['settings']['extra']['speed']) ?>">

		<?php foreach ($data['slides'] as $slide): ?>
		<div>

			<!-- Slide Text -->
			<div class="container pos-<?php echo esc_attr($slide['extra']['text_position']) ?> overlay-<?php echo esc_attr($slide['extra']['overlay']) ?>">
				<h1><?php echo wp_kses_post($slide['title']) ?></h1>
				<div><?php echo wp_kses_post(nl2br($slide['desc'])) ?></div>

				<?php // show custom button
				$button = $slide['extra']['button'];
				if($button['enable'] == 'yes'): ?>
					<div class="button-row"><a href="<?php echo esc_attr($button['yes']['url']) ?>">
						<?php echo wp_kses_post($button['yes']['text']); ?>
					</a></div>
				<?php endif; ?>
			</div>

			<div class="shadow"></div>

			<!-- Image -->
			<?php $image_url = esc_attr(fw_resize($slide['src'], false, $dimensions['height'], true)) ?>
			<div class="image"
			     style="background-image: url('<?php echo esc_url($image_url) ?>');
				        height: <?php echo (int)$dimensions['height']; ?>px">
			</div>

		</div>
		<?php endforeach; ?>

	</section>

<?php endif; ?>