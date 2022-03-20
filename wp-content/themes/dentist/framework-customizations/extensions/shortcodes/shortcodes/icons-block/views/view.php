<?php if (!defined('FW')) die( 'Forbidden' );

if(isset($atts['icons']) && !empty($atts['icons'])) {
	$class = min( sizeof( $atts['icons'] ), 4 );
} else {
	echo __('Define icons in widget settings', 'dentist');
	return;
}

echo '<div class="icon-list block-grid-xs-1 block-grid-sm-'.$class.'">';
foreach($atts['icons'] as $icon) : ?>

	<div class="item">
		<i class="icon <?php echo esc_attr($icon['icon']) ?>"></i>
		<div class="text"><?php echo wp_kses_post($icon['text']) ?></div>
	</div>

<?php endforeach;
echo '</div>';