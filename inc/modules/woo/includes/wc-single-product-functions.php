<?php
/**
 * WooCommerce single product hooks.
 *
 * @package Fashion_daily
 */

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 1 );

add_action( 'woocommerce_before_single_product_summary', 'fashion_daily_single_product_row_open', 1 );
add_action( 'woocommerce_after_single_product_summary', 'fashion_daily_single_product_row_close', 5 );

add_action( 'woocommerce_before_single_product_summary', 'fashion_daily_single_product_images_column_open', 1 );
add_action( 'woocommerce_before_single_product_summary', 'fashion_daily_single_product_images_column_close', 30 );

add_action( 'woocommerce_before_single_product_summary', 'fashion_daily_single_product_content_column_open', 40 );
add_action( 'woocommerce_after_single_product_summary', 'fashion_daily_single_product_content_column_close', 1 );
add_filter( 'woocommerce_product_thumbnails_columns', 'fashion_daily_wc_product_thumbnails_columns' );

// Hide Tab Heading
add_filter( 'woocommerce_product_description_heading', '__return_null' );

// Thumbnail
add_filter( 'woocommerce_gallery_image_size', function( $size ) {
	return 'fashion_daily-thumb-product-single';
} );

if ( ! function_exists( 'fashion_daily_single_product_row_open' ) ) {

	/**
	 * Content single product row open
	 */
	function fashion_daily_single_product_row_open() {
		echo '<div class="row">';
	}

}

if ( ! function_exists( 'fashion_daily_single_product_row_close' ) ) {

	/**
	 * Content single product row open
	 */
	function fashion_daily_single_product_row_close() {
		echo '</div>';
	}

}

if ( ! function_exists( 'fashion_daily_single_product_images_column_open' ) ) {

	/**
	 * Content single product images column open
	 */
	function fashion_daily_single_product_images_column_open() {
		echo '<div class="col-xs-12 col-md-6">';
	}

}

if ( ! function_exists( 'fashion_daily_single_product_images_column_close' ) ) {

	/**
	 * Content single product images column close
	 */
	function fashion_daily_single_product_images_column_close() {
		echo '</div>';
	}

}

if ( ! function_exists( 'fashion_daily_single_product_content_column_open' ) ) {

	/**
	 * Content single product content column open
	 */
	function fashion_daily_single_product_content_column_open() {
		echo '<div class="col-xs-12 col-md-6">';
	}

}

if ( ! function_exists( 'fashion_daily_single_product_content_column_close' ) ) {

	/**
	 * Content single product content column close
	 */
	function fashion_daily_single_product_content_column_close() {
		echo '</div>';
	}

}

if ( ! function_exists( 'fashion_daily_wc_product_thumbnails_columns' ) ) {

	/**
	 * Return product thumbnails count
	 *
	 * @return int
	 */
	function fashion_daily_wc_product_thumbnails_columns(){
		return 6;
	}

}
