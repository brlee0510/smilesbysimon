<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

class Widget_Social extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => __( 'Social links', 'dentist' ) );

		parent::__construct( false, __( 'Socials', 'dentist' ), $widget_ops );
	}

	/**
	 * Display widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );
		$params = array();

		foreach ( $instance as $key => $value ) {
			$params[ $key ] = $value;
		}

		// display before markup
		$title = $before_title . $params['widget-title'] . $after_title;
		echo $before_widget . $title;

		// do logic
		$socials = fw_get_opt('socials', false);
		if(!$socials) {

			echo '<div class="text-center">' .
			     __('Define your social networks in theme settings', 'dentist') .
			     '</div>';

		} else {
			display_socials( $socials, 'invert' );
		}

		// after markup
		echo $after_widget;
	}

	/**
	 * Backend data processing
	 *
	 * @param array $new_instance
	 * @param array $old_instance
	 *
	 * @return array
	 */
	function update( $new_instance, $old_instance ) {
		$instance = wp_parse_args( (array) $new_instance, $old_instance );
		return $instance;
	}

	/**
	 * Backend settings form
	 *
	 * @param array $instance
	 *
	 * @return string|void
	 */
	function form( $instance ) {

		$titles = array(
			'widget-title' => __( 'Widget Title:', 'dentist' )
		);

		$instance = wp_parse_args( (array) $instance, $titles );
		foreach ( $instance as $key => $value ) {
			?>
			<p>
				<label><?php echo wp_kses_post($titles[ $key ]) ?></label>
				<input class="widefat widget_social_link widget_link_field"
				       name="<?php echo esc_attr($this->get_field_name( $key )) ?>" type="text"
				       value="<?php echo ( $instance[ $key ] === $titles[ $key ] ) ? '' : esc_attr($instance[ $key ]); ?>"/>
			</p>
		<?php
		}
	}
}
