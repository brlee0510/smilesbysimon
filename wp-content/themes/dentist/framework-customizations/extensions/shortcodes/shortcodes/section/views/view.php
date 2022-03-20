<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$bg_color = '';
if ( ! empty( $atts['background_color'] ) ) {
	$bg_color = 'background-color:' . $atts['background_color'] . ';';
}

$bg_image = '';
if ( ! empty( $atts['background_image'] ) && ! empty( $atts['background_image']['data']['icon'] ) ) {
	$bg_image = 'background-image:url(' . esc_url($atts['background_image']['data']['icon']) . ');';
}

$text_color = '';
if ( ! empty( $atts['text_color'] ) ) {
	$text_color = 'color:' . $atts['text_color'] . ';';
}

$padding = '';
if ( ! empty( $atts['padding'] ) && $atts['padding'] ) {
	$padding = 'padding:' . $atts['padding'] . 'px 0;';
}

$animation_delay = '';
if ( isset( $atts['animation_delay'] ) && is_numeric( $atts['animation_delay'] ) ) {
	$atts['animation_delay'] = esc_attr($atts['animation_delay']);
	$animation_delay = 'data-wow-delay="' . $atts['animation_delay'] . '"';
}

// section id
$section_id = 'section_' . fw_unique_increment();
if ( isset( $atts['section_anchor'] ) && trim( $atts['section_anchor'] ) ) {
	$section_id = trim( $atts['section_anchor'] );
}

// parallax
$parallax = '';
if ( isset( $atts['parallax'] ) && is_numeric( $atts['parallax'] ) && $atts['parallax'] != 0 ) {
	$atts['parallax'] = $atts['parallax'] / 10;
	$parallax = ' data-stellar-background-ratio="' . esc_attr( $atts['parallax'] ) . '"';
}

// join all together
$section_style   = ( $bg_color || $bg_image || $text_color || $padding )
	? 'style="' . $bg_color . $bg_image . $text_color . $padding . '"'
	: '';
$container_class = ( isset( $atts['is_fullwidth'] ) && $atts['is_fullwidth'] ) ? 'container-fluid' : 'container';

if ( isset( $atts['auto_generated'] ) && $atts['auto_generated'] ) {
	$container_class = 'fw-container';
}

// custom classes
$custom_classes = '';
if ( $padding ) { $custom_classes .= 'custom-padding'; }
if ( $text_color ) { $custom_classes .= ' custom-text-color'; }
if ( $bg_image ) { $custom_classes .= ' bg-image'; }
if ( isset( $atts['animation'] ) ) { $container_class .= ' ' . $atts['animation']; }

?>
<section id="<?php echo esc_attr( $section_id ); ?>" class="fw-main-row scrollspy <?php echo $custom_classes; ?>"
	<?php echo $section_style; ?>
	<?php echo $animation_delay; ?>
	<?php echo $parallax; ?>>

	<div class="<?php echo esc_attr($container_class); ?>">
		<?php echo do_shortcode( $content ); ?>
	</div>

</section>