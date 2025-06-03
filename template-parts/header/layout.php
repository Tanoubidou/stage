<?php
/**
 * The template for displaying the default header layout.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fashion_daily
 */

$visible_header_wc_cart 	= fashion_daily_theme()->customizer->get_value( 'woo_header_cart_icon' ) && class_exists( 'WooCommerce' );
?>

<div <?php fashion_daily_header_class(); ?>>
	<?php do_action( 'fashion_daily-theme/header/before' ); ?>
	<div class="space-between-content">

		<?php fashion_daily_main_menu(); ?>

		<div <?php fashion_daily_site_branding_class(); ?>>
			<?php fashion_daily_header_logo(); ?>
			<?php fashion_daily_site_description(); ?>
		</div>

		<div class="site-header__right_part">
			<?php fashion_daily_social_list( 'header' ); ?>

			<?php fashion_daily_header_search_toggle(); ?>

			<?php if ( $visible_header_wc_cart ) :
				fashion_daily_wc_header_cart();
			endif; ?>
		</div>

		<?php fashion_daily_header_search_popup(); ?>
	</div>
	<?php do_action( 'fashion_daily-theme/header/after' ); ?>
</div>
