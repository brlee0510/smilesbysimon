<?php if (!defined('FW')) die('Forbidden');

function _filter_theme_activated_sliders($activated) {
	return array('dentist-slider');
}
add_filter('fw_ext_slider_activated', '_filter_theme_activated_sliders');