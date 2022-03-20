<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} ?>
<div class="fw-call-to-action">
	<div class="fw-action-content">
		<?php if (!empty($atts['title'])): ?>
		<h2><?php echo wp_kses_post($atts['title']); ?></h2>
		<?php endif; ?>
		<p><?php echo wp_kses_post($atts['message']); ?></p>
	</div>

	<div class="fw-action-btn">
		<a href="<?php echo esc_url($atts['button_link']); ?>" class="btn btn-lg btn-primary" target="<?php echo esc_attr($atts['button_target']); ?>">
			<span><?php echo wp_kses_post($atts['button_label']); ?></span>
		</a>
	</div>
</div>