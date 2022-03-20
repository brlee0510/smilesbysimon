<?php if (!defined('FW')) die('Forbidden');

$class = fw_ext_builder_get_item_width('page-builder', $atts['width'] . '/frontend_class');

$animation_delay = '';
if(isset($atts['animation_delay']) && is_numeric($atts['animation_delay'])) {
	$atts['animation_delay'] = esc_attr($atts['animation_delay']);
	$animation_delay = "data-wow-delay=\"{$atts['animation_delay']}\"";
}

?>
<div class="<?php echo esc_attr($class . ' ' . @$atts['animation']); ?>" <?php echo $animation_delay; ?>>
	<?php echo do_shortcode($content); ?>
</div>
