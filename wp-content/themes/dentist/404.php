<?php get_header(); ?>

	<!-- ========= Content ========= -->
	<section class="content">
		<h1><?php _e('#404', 'dentist') ?></h1>

		<p><?php _e('The page you are looking for might have been removed, <br /> had its name changed, or is temporarily unavailable', 'dentist'); ?></p>

		<p><a class="btn btn-primary btn-lg" href="<?php echo esc_url(home_url()) ?>">
				<?php _e('Got to Homepage', 'dentist'); ?>
			</a></p>
	</section>

<?php get_footer(); ?>