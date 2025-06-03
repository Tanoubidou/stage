<?php
/**
 * Sidebars configuration.
 *
 * @package Fashion_daily
 */

add_action( 'after_setup_theme', 'fashion_daily_register_sidebars', 5 );
function fashion_daily_register_sidebars() {

	fashion_daily_widget_area()->widgets_settings = apply_filters( 'fashion_daily-theme/widget_area/default_settings', array(
		'sidebar' => array(
			'name'           => esc_html__( 'Sidebar', 'fashion_daily' ),
			'description'    => esc_html__( 'List of widgets to display on blog post pages', 'fashion_daily' ),
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h4 class="widget-title">',
			'after_title'    => '</h4>',
			'before_wrapper' => '<div id="%1$s" %2$s role="complementary">',
			'after_wrapper'  => '</div>',
			'is_global'      => true,
		),
		'sidebar-shop' => array(
			'name'           => esc_html__( 'Shop Sidebar', 'fashion_daily' ),
			'description'    => esc_html__( 'List of widgets to display on Shop pages', 'fashion_daily' ),
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => '</aside>',
			'before_title'   => '<h4 class="widget-title h5-style">',
			'after_title'    => '</h4>',
			'before_wrapper' => '<div id="%1$s" %2$s role="complementary">',
			'after_wrapper'  => '</div>',
			'is_global'      => true,
		)
	) );
}
