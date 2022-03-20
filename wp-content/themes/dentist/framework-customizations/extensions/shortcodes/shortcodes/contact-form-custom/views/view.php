<?php if (!defined('FW')) die( 'Forbidden' );

// form width setting
$form_width = '';
if(isset($atts['form_width']) && is_numeric($atts['form_width'])) {
	$form_width = 'max-width: ' . $atts['form_width'] . 'px;';
}

// form bg setting
$form_bg = '';
if(isset($atts['form_bg_color']) && trim($atts['form_bg_color'])) {
	$form_bg = 'background-color: ' . $atts['form_bg_color'];
}

echo "<div class=\"form-boxed\" style=\"{$form_width} {$form_bg}\">";
echo do_shortcode($atts['form_shortcode']);
echo "</div>";