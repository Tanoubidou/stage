<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Fashion_daily
 */
?>

<?php do_action( 'fashion_daily-theme/widget-area/render', 'footer-area' ); ?>

<div <?php fashion_daily_footer_class(); ?>>
	<div class="space-between-content">
		<?php fashion_daily_footer_logo(); ?>

		<div class="footer-info__holder">
			<?php fashion_daily_footer_copyright(); ?>
			<?php fashion_daily_footer_menu(); ?>
		</div>
	</div>
</div><!-- .container -->
