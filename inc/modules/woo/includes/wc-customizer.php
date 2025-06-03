<?php
/**
 * WooCommerce customizer options
 *
 * @package Fashion_daily
 */

if ( ! function_exists( 'fashion_daily_set_wc_dynamic_css_options' ) ) {

	/**
	 * Add dynamic WooCommerce styles
	 *
	 * @param $options
	 *
	 * @return mixed
	 */
	function fashion_daily_set_wc_dynamic_css_options( $options ) {

		array_push( $options['css_files'], get_theme_file_path( 'inc/modules/woo/assets/css/dynamic/woo-module-dynamic.css' ) );

		return $options;

	}

}
add_filter( 'fashion_daily-theme/dynamic_css/options', 'fashion_daily_set_wc_dynamic_css_options' );