<?php if (!defined('FW')) die('Forbidden');

/** @internal */
function _filter_disable_shortcodes($to_disable)
{
	$to_disable[] = 'team_member';
	$to_disable[] = 'contact_form';
	$to_disable[] = 'testimonials';
	$to_disable[] = 'icon';
	return $to_disable;
}
add_filter('fw_ext_shortcodes_disable_shortcodes', '_filter_disable_shortcodes');