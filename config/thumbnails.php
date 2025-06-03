<?php
/**
 * Thumbnails configuration.
 *
 * @package fashion_daily
 */

add_action( 'after_setup_theme', 'fashion_daily_register_image_sizes', 5 );
/**
 * Register image sizes.
 */
function fashion_daily_register_image_sizes() {
	set_post_thumbnail_size( 370, 260, true );

	// Registers a new image sizes.
	add_image_size( 'fashion_daily-thumb-m', 370, 280, true );
	
	// Posts default listing
	add_image_size( 'fashion_daily-thumb-listing', 710, 500, true );
	add_image_size( 'fashion_daily-thumb-listing-nosidebar', 1110, 700, true );

	add_image_size( 'fashion_daily-thumb-full-width-nosidebar', 1170, 540, true );
	
	add_image_size( 'fashion_daily-thumb-leftward', 510, 350, true ); //	Leftward Style

	add_image_size( 'fashion_daily-thumb-grid-2cols-nosidebar', 540, 380, true );   // Posts Grid 2 Columns no Sidebar
	add_image_size( 'fashion_daily-thumb-grid-3cols-nosidebar', 350, 245, true );   // Posts Grid 3 Columns no Sidebar
	add_image_size( 'fashion_daily-thumb-grid-2col-sidebar', 340, 240, true );   // default Posts Grid 2 Columns with Sidebar
	
	add_image_size( 'fashion_daily-thumb-timeline', 275, 195, true );   // default Posts Grid 2 Columns with Sidebar

	add_image_size( 'fashion_daily-thumb-nav', 115, 85, true ); // Post Navigation

	add_image_size( 'fashion_daily-thumb-related', 150, 120, true ); // Related Posts
	
	add_image_size( 'fashion_daily-thumb-post-widget', 58, 58, true ); // Recent Posts Widget
	
	add_image_size( 'fashion_daily-thumb-search-result', 180, 240, true ); // Search Result Page
	
	add_image_size( 'fashion_daily-thumb-l-770-540', 770, 540, true ); // Search Result Page

	// Single Post
	add_image_size( 'fashion_daily-thumb-xxl', 1920, 550, true );

	//	WooCommerce
	add_image_size( 'fashion_daily-thumb-wishlist', 60, 91, true ); // Wishlist
	add_image_size( 'fashion_daily-thumb-products-cat', 360, 420, true );
	add_image_size( 'fashion_daily-thumb-product-archive', 260, 312, true );
	add_image_size( 'fashion_daily-thumb-product-single', 560, 672, true );

	// Fashion
	add_image_size( 'fashion_daily-cryprate-thumb-leftward', 340, 240, true );
}
