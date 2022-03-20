<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); } ?>

<!-- ========= Footer ========= -->
<footer id="main-footer">

	<nav class="line">
		<?php if ( has_nav_menu( 'primary' ) ):
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false
			) );
		else:
			echo '<ul class="menu"><li><a href="#">' . __( 'Define your primary menu in dashboard', 'dentist' ) . '</a></li></ul>';
		endif ?>
	</nav>

	<?php // display list of social icons
	$socials = fw_get_opt( 'socials', false );
	if ( is_array( $socials ) && ! empty( $socials ) ): ?>
		<div class="line"><?php display_socials( $socials, 'invert' ) ?></div>
	<?php endif; ?>

	<?php // display footer custom text
	$custom_text = fw_get_opt( 'footer_text', '' );
	if ( trim( $custom_text ) ) : ?>
		<div class="line copyright-text"><?php echo wp_kses_post( $custom_text ); ?></div>
	<?php endif; ?>

</footer>

<?php if(fw_get_opt('custom_js', false)) : ?>
	<script type="text/javascript"><?php echo fw_get_opt('custom_js') ?></script>
<?php endif ?>

<?php wp_footer(); ?>
</body></html>