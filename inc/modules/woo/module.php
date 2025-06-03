<?php
/**
 * WooCommerce integration module
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Fashion_daily_Woo_Module' ) ) {

	/**
	 * Define Fashion_daily_Woo_Module class
	 */
	class Fashion_daily_Woo_Module extends Fashion_daily_Module_Base {

		/**
		 * Module ID
		 *
		 * @return string
		 */
		public function module_id() {
			return 'woo';
		}

		/**
		 * Module filters
		 *
		 * @return void
		 */
		public function filters() {

			/**
			 * Disable the default WooCommerce stylesheet.
			 *
			 * Removing the default WooCommerce stylesheet and enqueing your own will
			 * protect you during WooCommerce core updates.
			 *
			 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
			 */
			add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

			add_filter( 'fashion_daily-theme/assets-depends/script', array( $this, 'assets_depends_script' ) );

			add_filter( 'fashion_daily-theme/customizer/options', array( $this, 'customizer_options' ) );

			add_filter( 'cx_customizer/core_sections', array(  $this, 'fashion_daily_customizer_core_sections' ) );
		}

		/**
		 * Add WooCommerce customizer sections
		*/
		public function fashion_daily_customizer_core_sections( $sections ) {
			$sections[] = 'woocommerce_settings';
			return $sections;
		}

		/**
		 * Add WooCommerce customizer options
		 *
		 * @param  array $options Options list
		 *
		 * @return array
		 */
		public function customizer_options( $options ) {

			$new_options = array(
				
				/* `Woocommerce Settings` panel */
				'woocommerce_settings' => array(
					'title' 			=> esc_html__( 'WooCommerce Options', 'fashion_daily' ),
					'priority' 			=> 200,
					'type' 				=> 'panel',
				),
				
				'woo_general' => array(
					'title' 			=> esc_html__( 'General', 'fashion_daily' ),
					'panel' 			=> 'woocommerce_settings',
					'priority' 			=> 1,
					'type' 				=> 'section',
				),
				'woo_header_cart_icon' => array(
					'title' 			=> esc_html__( 'Header Cart Icon', 'fashion_daily' ),
					'section' 			=> 'woo_general',
					'default' 			=> true,
					'field' 			=> 'checkbox',
					'type' 				=> 'control',
				),

				'single_product_layout' => array(
					'title' 			=> esc_html__( 'Single product layout', 'fashion_daily' ),
					'panel' 			=> 'woocommerce_settings',
					'priority' 			=> 1,
					'type' 				=> 'section',
				),
				'single_product_container_type' => array(
					'title' 			=> esc_html__( 'Single product container type', 'fashion_daily' ),
					'section' 			=> 'single_product_layout',
					'default' 			=> 'boxed',
					'field' 			=> 'select',
					'choices' 			=> array(
						'boxed' 	=> esc_html__( 'Boxed', 'fashion_daily' ),
						'fullwidth' => esc_html__( 'Fullwidth', 'fashion_daily' ),
					),
					'type' 				=> 'control',	 
				),
				'single_product_sharing' => array(
					'title' 			=> esc_html__( 'Product Sharing', 'fashion_daily' ),
					'section' 			=> 'single_product_layout',
					'default' 			=> true,
					'field' 			=> 'checkbox',
					'type' 				=> 'control',
				),

				/** `Colors` section */
				'woo_colors' => array(
					'title' 			=> esc_html__( 'Colors', 'fashion_daily' ),
					'panel' 			=> 'woocommerce_settings',
					'priority' 			=> 1,
					'type' 				=> 'section',
				),
				'woo_secondary_text_color' => array(
					'title' 			=> esc_html__( 'Secondary Text color', 'fashion_daily' ),
					'section' 			=> 'woo_colors',
					'default' 			=> '#6a6a76',
					'field' 			=> 'hex_color',
					'type' 				=> 'control',
				),
				'woo_fields_bg' => array(
					'title' 			=> esc_html__( 'Input, Textarea, Select BG', 'fashion_daily' ),
					'section' 			=> 'woo_colors',
					'default' 			=> '#f3f3f9',
					'field' 			=> 'hex_color',
					'type' 				=> 'control',
				),
			);

			$options['options'] = array_merge( $new_options, $options['options'] );

			return $options;

		}

		/**
		 * Include appropriate module files.
		 *
		 * @return void
		 */
		public function includes() {
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-content-product-functions.php' );
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-single-product-functions.php' );
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-archive-product-functions.php' );
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-customizer.php' );
			require_once get_theme_file_path( 'inc/modules/woo/includes/wc-integration.php' );
		}

		/**
		 * Module condition callback.
		 *
		 * @return bool|callable
		 */
		public function condition_cb() {
			return class_exists( 'WooCommerce' );
		}

		/**
		 * Add module script dependencies
		 *
		 * @param $scripts_depends
		 *
		 * @return int
		 */
		public function assets_depends_script( $scripts_depends ) {
			array_push( $scripts_depends, 'fashion_daily-woo-module-script' );

			return $scripts_depends;
		}

		/**
		 * Enqueue module scripts.
		 *
		 * @return void
		 */
		public function enqueue_scripts() {
			// register scripts
			wp_register_script(
				'fashion_daily-woo-module-script',
				get_theme_file_uri( 'inc/modules/woo/assets/js/woo-module-script.js' ),
				array( 'jquery' ),
				fashion_daily_theme()->version(),
				true
			);
		}

		/**
		 * Enqueue module styles.
		 *
		 * @return void
		 */
		public function enqueue_styles() {
			$font_path   = WC()->plugin_url() . '/assets/fonts/';
			$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
			}';

			wp_add_inline_style(
				'fashion_daily-woocommerce-style',
				$inline_font
			);

			wp_enqueue_style(
				'fashion_daily-woocommerce-style',
				get_template_directory_uri() . '/inc/modules/woo/assets/css/woo-module' . ( is_rtl() ? '-rtl' : '' ) . '.css',
				false,
				fashion_daily_theme()->version()
			);

		}

	}

}
