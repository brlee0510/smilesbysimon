<?php if (!defined('FW')) die( 'Forbidden' );

$icons = @$atts['features'];
if(!$icons || !is_array($icons) || empty($icons)) {
	echo '<p>' . __('Define features in widget settings', 'dentist') . '</p>';
	return;
}

$i = 1;
echo '<div class="features-block block-grid-xs-1 block-grid-sm-3">';
foreach($icons as $icon): ?>

	<article class="item"><div class="content">
		<?php
			$iconType  = $icon['icon']['type'];
			$iconClass = @$icon['icon'][$iconType]['icon'];

			if(!$iconClass || !trim($iconClass)) {
				$iconClass = 'fa fa-times';
			}
		?>
		<div class="helper"></div>

		<div class="content-inner">
			<i class="icon <?php echo esc_attr($iconClass) ?>"></i>
			<h1 class="title"><?php echo wp_kses_post($icon['title']) ?></h1>
		</div>

		<span class="number"><?php echo esc_html($i++) ?></span>
	</div></article>

<?php endforeach;
echo '</div>';