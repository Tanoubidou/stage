<?php
/**
 * WooCommerce content product hooks.
 *
 * @package Fashion_daily
 */

add_action( 'woocommerce_before_shop_loop_item', 'fashion_daily_wc_loop_product_content_open', 1 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 20 );

add_action( 'woocommerce_before_shop_loop_item_title', 'fashion_daily_wc_loop_product_descr_open', 20 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

add_action( 'woocommerce_after_shop_loop_item', 'fashion_daily_wc_loop_product_descr_close', 15 );
add_action( 'woocommerce_after_shop_loop_item', 'fashion_daily_wc_loop_product_content_close', 20 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'fashion_daily_wc_template_loop_product_title', 10 );

add_action( 'woocommerce_before_subcategory', 'fashion_daily_wc_loop_category_content_open', 1 );
add_action( 'woocommerce_after_subcategory', 'fashion_daily_wc_loop_category_content_close', 40 );

add_action( 'woocommerce_before_cart', 'fashion_daily_wc_cart_product_content_open', 10 );
add_action( 'woocommerce_after_cart', 'fashion_daily_wc_cart_product_content_close', 20 );


// Thumbnail
add_filter( 'single_product_archive_thumbnail_size', function( $size ) {
	return 'fashion_daily-thumb-product-archive';

	if ( is_product_category() ){
		return 'fashion_daily-thumb-products-cat';
	}
} );


if ( ! function_exists( 'fashion_daily_wc_cart_product_content_open' ) ) {

	/**
	 * Content product wrapper open
	 */
	function fashion_daily_wc_cart_product_content_open() {
		echo '<div class="woocommerce-cart-content">';
	}

}

if ( ! function_exists( 'fashion_daily_wc_cart_product_content_close' ) ) {

	/**
	 * Content product wrapper close
	 */
	function fashion_daily_wc_cart_product_content_close() {
		echo '</div>';
	}

}

if ( ! function_exists( 'fashion_daily_wc_loop_product_content_open' ) ) {

	/**
	 * Content product wrapper open
	 */
	function fashion_daily_wc_loop_product_content_open() {
		echo '<div class="product-content">';
	}

}

if ( ! function_exists( 'fashion_daily_wc_loop_product_content_close' ) ) {

	/**
	 * Content product wrapper close
	 */
	function fashion_daily_wc_loop_product_content_close() {
		echo '</div>';
	}

}

if ( ! function_exists( 'fashion_daily_wc_loop_product_descr_open' ) ) {

	/**
	 * Content product wrapper open
	 */
	function fashion_daily_wc_loop_product_descr_open() {
		echo '<div class="product-description">';
	}

}

if ( ! function_exists( 'fashion_daily_wc_loop_product_descr_close' ) ) {

	/**
	 * Content product wrapper close
	 */
	function fashion_daily_wc_loop_product_descr_close() {
		echo '</div>';
	}

}

if ( ! function_exists( 'fashion_daily_wc_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function fashion_daily_wc_template_loop_product_title() {
		echo '<h2 class="woocommerce-loop-product__title"><a href="' . esc_url( get_the_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></h2>';
	}
}

if ( ! function_exists( 'fashion_daily_wc_loop_category_content_open' ) ) {

	/**
	 * Content category wrapper open
	 */
	function fashion_daily_wc_loop_category_content_open() {
		echo '<div class="category-content">';
	}

}

if ( ! function_exists( 'fashion_daily_wc_loop_category_content_close' ) ) {

	/**
	 * Content category wrapper close
	 */
	function fashion_daily_wc_loop_category_content_close() {
		echo '</div>';
	}

}
