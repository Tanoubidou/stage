<?php
/**
 * Fashion_daily_Post_Meta class
 *
 * @package Fashion_daily
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Fashion_daily_Post_Meta' ) ) {

	/**
	 * Define Fashion_daily_Post_Meta class
	 */
	class Fashion_daily_Post_Meta {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    Fashion_daily_Post_Meta
		 */
		private static $instance = null;

		/**
		 * Rewritten theme mods.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    array
		 */
		public $rewritten_mods = array();

		/**
		 * Constructor for the class
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __construct(){

			add_action( 'after_setup_theme', array( $this, 'init_post_meta' ) );

			$rewrite_theme_mods = apply_filters( 'fashion_daily/rewrite_theme_mods', array(
				'container_type',
				'single_sidebar_position',
				'header_layout_type',
				'header_color_scheme',
			) );

			$disabled_theme_mods = apply_filters( 'fashion_daily/disabled_theme_mods', array(
				'breadcrumbs_visibillity',
			) );

			foreach ( $rewrite_theme_mods as $mod ) {
				add_filter( "theme_mod_{$mod}", array( $this, 'set_post_meta_value' ), 20 );
			}

			foreach ( $disabled_theme_mods as $mod ) {
				add_filter( "theme_mod_{$mod}", array( $this, 'set_disabled_post_meta_value' ), 20 );
			}
		}

		/**
		 * Init post meta.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function init_post_meta() {

			$default_fields_post = apply_filters( 'fashion_daily/page_settings/default_fields_post', array(
				'fashion_daily_container_type' => array(
					'title' 		=> esc_html__( 'Page Layout', 'fashion_daily' ),
					'description' 	=> esc_html__( 'Page layout global settings redefining.', 'fashion_daily' ),
					'type' 			=> 'select',
					'value' 		=> 'inherit',
					'options' 		=> array_merge(
						array( 'inherit' => esc_html__( 'Inherit', 'fashion_daily' ) ),
						array( 'boxed' => esc_html__( 'Boxed', 'fashion_daily' ), 'fullwidth' => esc_html__( 'Fullwidth', 'fashion_daily' ) )
					),
				),
				'fashion_daily_single_sidebar_position' => array(
					'title' 		=> esc_html__( 'Sidebar', 'fashion_daily' ),
					'description' 	=> esc_html__( 'Page sidebar position global settings redefining.', 'fashion_daily' ),
					'type' 			=> 'select',
					'value' 		=> 'inherit',
					'options' 		=> array_merge(
						array( 'inherit' => esc_html__( 'Inherit', 'fashion_daily' ) ),
						array(
							'one-left-sidebar' 	=> esc_html__( 'Sidebar on left side', 'fashion_daily' ),
							'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'fashion_daily' ),
							'none' 				=> esc_html__( 'No sidebar', 'fashion_daily' )
						)
					),
				),
				'fashion_daily_header_color_scheme' => array(
					'title' 		=> esc_html__( 'Header Color Scheme', 'fashion_daily' ),
					'description' 	=> esc_html__( 'Header Color Scheme global settings redefining.', 'fashion_daily' ),
					'type' 			=> 'select',
					'value' 		=> 'inherit',
					'options' 		=> array_merge(
						array( 'inherit' => esc_html__( 'Inherit', 'fashion_daily' ) ),
						array(
							'color_scheme_1' 	=> esc_html__( 'Color Scheme 1', 'fashion_daily' ),
							'color_scheme_2' 	=> esc_html__( 'Color Scheme 2', 'fashion_daily' ),
							'color_scheme_3' 	=> esc_html__( 'Color Scheme 3', 'fashion_daily' ),
							'overlay' 			=> esc_html__( 'Overlay', 'fashion_daily' ),
						)
					),
				),
			) );

			$disable_fields = apply_filters( 'fashion_daily/page_settings/disable_fields', array(
				'fashion_daily_disable_breadcrumbs_visibillity' => array(
					'title' 		=> esc_html__( 'Disable Breadcrumbs', 'fashion_daily' ),
					'type' 			=> 'switcher',
					'value' 		=> false,
					'toggle' 		=> array(
						'true_toggle'  => esc_html__( 'Yes', 'fashion_daily' ),
						'false_toggle' => esc_html__( 'No', 'fashion_daily' ),
					),
				),
			) );

			$fields = array_merge( $default_fields_post, $disable_fields );

			$post_types = apply_filters( 'fashion_daily/page_settings/allowed_post_types', array( 'page', 'post' ) );

			foreach ( $post_types as $post_type ) {

				$fields = $this->prepare_fields( $fields, $post_type );

				new Cherry_X_Post_Meta( array(
					'id'            => 'fashion_daily-' . esc_attr( $post_type ) . '-settings',
					'title'         => esc_html__( 'Fashion_daily Page Settings', 'fashion_daily' ),
					'page'          => $post_type,
					'context'       => 'normal',
					'priority'      => 'high',
					'callback_args' => false,
					'builder_cb'    => array( $this, 'get_builder' ),
					'fields'        => $fields,
				) );
			};
		}

		/**
		 * Prepare fields.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  array  $fields    Fields list.
		 * @param  string $post_type Post type.
		 * @return array
		 */
		public function prepare_fields( $fields, $post_type ) {

			foreach ( $fields as $meta_key => $field ) {

				if ( isset( $field['page'] ) ) {

					if ( ( is_array( $field['page'] ) && ! in_array( $post_type, $field['page'] ) ) || $field['page'] !== $post_type ) {
						unset( $fields[ $meta_key ] );
					}

					unset( $field['page'] );
				}
			}

			return $fields;
		}

		/**
		 * Get interface builder instance
		 *
		 * @since  1.0.0
		 * @access public
		 * @return CX_Interface_Builder
		 */
		public function get_builder() {

			return new CX_Interface_Builder(
				array(
					'path' => get_stylesheet_directory() . '/framework/modules/interface-builder/',
					'url'  => get_stylesheet_directory() . '/framework/modules/interface-builder/',
				)
			);
		}

		/**
		 * Set specific post meta value.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  mixed $value Filtered value.
		 * @return string|bool
		 */
		public function set_post_meta_value( $value ) {
			$queried_obj = $this->get_queried_obj();

			if ( ! $queried_obj ) {
				return $value;
			}

			$theme_mod  = str_replace( 'theme_mod_', '', current_filter() );
			$meta_key   = 'fashion_daily_' . $theme_mod;
			$meta_value = get_post_meta( $queried_obj, $meta_key, true );

			if ( ! $meta_value || 'inherit' === $meta_value ) {
				return $value;
			}

			if ( in_array( $meta_value, array( 'yes', 'true', 'no', 'false' ) ) ) {
				$meta_value = filter_var( $meta_value, FILTER_VALIDATE_BOOLEAN );
			}

			if ( ! isset( $this->rewritten_mods[ $theme_mod ] ) ) {
				$this->rewritten_mods[] = $theme_mod;
			}

			return $meta_value;
		}

		/**
		 * Set disabled post meta value.
		 *
		 * @since  1.0.0
		 * @access public
		 * @param  mixed $value Filtered value.
		 * @return string|bool
		 */
		public function set_disabled_post_meta_value( $value ) {
			$queried_obj = $this->get_queried_obj();

			if ( ! $queried_obj ) {
				return $value;
			}

			$meta_key   = 'fashion_daily_disable_' . str_replace( 'theme_mod_', '', current_filter() );
			$meta_value = get_post_meta( $queried_obj, $meta_key, true );

			if ( 'true' !== $meta_value ) {
				return $value;
			}

			return false;
		}

		/**
		 * Get queried object.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return string|boolean
		 */
		public function get_queried_obj() {
			$queried_obj = apply_filters( 'fashion_daily_queried_object_id', false );

			if ( ! $queried_obj && ! $this->maybe_need_rewrite_mod() ) {
				return false;
			}

			$queried_obj = is_home() ? get_option( 'page_for_posts' ) : $queried_obj;
			$queried_obj = ! $queried_obj ? get_the_id() : $queried_obj;

			return $queried_obj;
		}

		/**
		 * Check if we need to try rewrite theme mod or not
		 *
		 * @since  1.0.0
		 * @access public
		 * @return boolean
		 */
		public function maybe_need_rewrite_mod() {

			if ( is_front_page() && 'page' !== get_option( 'show_on_front' ) ) {
				return false;
			}

			if ( is_home() && 'page' === get_option( 'show_on_front' ) ) {
				return true;
			}

			if ( ! is_singular() ) {
				return false;
			}

			return true;
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return Fashion_daily_Post_Meta
		 */
		public static function get_instance() {
			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}
	}

}

new Fashion_daily_Post_Meta();
