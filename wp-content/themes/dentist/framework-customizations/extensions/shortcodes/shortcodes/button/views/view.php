<?php if (!defined('FW')) die( 'Forbidden' ); ?>
<?php $color_class = !empty($atts['color']) ? "btn-{$atts['color']}" : ''; ?>

<a href="<?php echo esc_url($atts['link']) ?>"
   target="<?php echo esc_attr($atts['target']) ?>"
   class="btn btn-lg <?php echo esc_attr($color_class); ?>"
   data-action="scroll">
	<span><?php echo wp_kses_post($atts['label']); ?></span>
</a>