<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * Custom template tags
 */
{
	if ( ! function_exists( 'fw_theme_paging_nav' ) ) : /**
	 * Display navigation to next/previous set of posts when applicable.
	 */ {
		function fw_theme_paging_nav( $wp_query = null ) {

			if ( ! $wp_query ) {
				$wp_query = $GLOBALS['wp_query'];
			}

			// Don't print empty markup if there's only one page.
			if ( $wp_query->max_num_pages < 2 ) {
				return;
			}

			?>

			<div class="pager">
				<span class="previous"><?php previous_posts_link( ) ?></span>
				<span class="next"><?php next_posts_link( ) ?></span>
			</div>

		<?php
		}
	}
	endif;


	if ( ! function_exists( 'fw_post_sharing_buttons' ) ): /**
	 * Display sharing buttons
	 */ {
		function fw_post_sharing_buttons( $classes = '' ) { ?>
			<div class="social-likes <?php echo esc_attr( $classes ) ?>">

				<div class="facebook" title="<?php echo __( 'Share link on', 'dentist' ) ?> Facebook">Facebook</div>
				<div class="twitter" title="<?php echo __( 'Share link on', 'dentist' ) ?> Twitter">Twitter</div>
				<div class="plusone" title="<?php echo __( 'Share link on', 'dentist' ) ?> Google+">Google+</div>

				<?php if ( has_post_thumbnail() ) : ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
					<div class="pinterest" title="<?php echo __( 'Share image on Pinterest', 'dentist' ) ?>" data-media="<?php echo esc_attr( $image[0] ) ?>">Pinterest
					</div>
				<?php endif; ?>

			</div>
		<?php }
	}
	endif;
}
