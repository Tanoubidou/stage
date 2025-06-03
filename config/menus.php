<?php
/**
 * Menus configuration.
 *
 * @package Fashion_daily
 */

add_action( 'after_setup_theme', 'fashion_daily_register_menus', 5 );
function fashion_daily_register_menus() {

	register_nav_menus( array(
		'main'   => esc_html__( 'Main', 'fashion_daily' ),
		'footer' => esc_html__( 'Footer', 'fashion_daily' ),
		'social' => esc_html__( 'Social', 'fashion_daily' ),
	) );
}
