<?php
/**
 * Blog layouts module
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Fashion_daily_Blog_Layouts_Module' ) ) {

	/**
	 * Define Fashion_daily_Blog_Layouts_Module class
	 */
	class Fashion_daily_Blog_Layouts_Module extends Fashion_daily_Module_Base {
		/**
		 * properties.
		 */
		private $layout_type;
		private $sidebar_enabled = true;
		private $columns_enabled = true;
		private $fullwidth_enabled = true;

		/**
		 * Sidebar list.
		 */
		private $sidebar_list = array (
			'default' 			=> array( '2-cols', '3-cols' ),
			'leftward' 			=> array( '2-cols', '3-cols' ),
			'grid' 				=> array( '2-cols' ),
			'grid-2' 			=> array( '2-cols' ),
			'masonry' 			=> array( '2-cols' ),
			'justify' 			=> array(),
			'timeline' 			=> array( '2-cols', '3-cols' ),
		);

		/**
		 * Columns list.
		 */
		private $columns_list = array (
			'default' 			=> array(),
			'leftward' 			=> array(),
			'grid' 				=> array( 'default' ),
			'grid-2' 			=> array( 'default' ),
			'masonry' 			=> array( 'default' ),
			'justify' 			=> array(),
			'timeline' 			=> array(),
		);

		/**
		 * Module ID
		 *
		 * @return string
		 */
		public function module_id() {

			return 'blog-layouts';

		}

		/**
		 * Module filters
		 *
		 * @return void
		 */
		public function filters() {

			add_action( 'wp_head', array( $this, 'module_init_properties' ) );
			add_filter( 'fashion_daily-theme/customizer/options', array( $this, 'customizer_options' ) );
			add_filter( 'fashion_daily-theme/customizer/blog-sidebar-enabled', array( $this, 'customizer_blog_sidebar_enabled' ) );
			add_filter( 'fashion_daily-theme/customizer/blog-columns-enabled', array( $this, 'customizer_blog_columns_enabled' ) );
			add_filter( 'fashion_daily-theme/posts/template-part-slug', array( $this, 'apply_layout_template' ) );
			add_filter( 'fashion_daily-theme/posts/post-style', array( $this, 'apply_style_template' ) );
			add_filter( 'fashion_daily-theme/posts/list-class', array( $this, 'add_list_class' ) );
			add_filter( 'fashion_daily-theme/site-content/container-enabled', array( $this, 'disable_site_content_container' ) );

		}

		/**
		 * Init module properties
		 *
		 * @return void
		 */
		public function module_init_properties() {

			$this->layout_type 		= fashion_daily_theme()->customizer->get_value( 'blog_layout_type' );
			$this->layout_columns 	= fashion_daily_theme()->customizer->get_value( 'blog_layout_columns' );
			$this->layout_style 	= 'default';

			if ( isset( $this->sidebar_list[$this->layout_type] ) && $this->is_blog_archive() ) {
				$this->sidebar_enabled = in_array( $this->layout_columns, $this->sidebar_list[$this->layout_type] );
			}

			if ( isset( $this->columns_list[$this->layout_type] ) && $this->is_blog_archive() ) {
				$this->columns_enabled = in_array( $this->layout_style, $this->columns_list[$this->layout_type] );
			}

			if ( ! $this->sidebar_enabled ) {
				fashion_daily_theme()->sidebar_position = 'none';
			}

		}

		/**
		 * Apply new blog layout
		 *
		 * @return array
		 */
		public function apply_layout_template( $layout ) {

			$blog_post_template = 'template-parts/' . esc_attr( $this->layout_type ) . '/content';

			return 'inc/modules/blog-layouts/' . $blog_post_template;

		}

		/**
		 * Apply style template
		 *
		 * @param  string $style Current style template suuffix
		 *
		 * @return [type]        [description]
		 */
		public function apply_style_template( $style ) {

			$blog_layout_style = false;

			return $blog_layout_style;

		}

		/**
		 * Add list class
		 *
		 * @param  string   list class
		 *
		 * @return [type]   modified list class
		 */
		public function add_list_class( $list_class ) {

			$list_class .= ' posts-list--' . sanitize_html_class( ! is_search() ? $this->layout_type : 'default' );
			// $list_class .= ' list-style-default';
			if ( 'grid' === $this->layout_type || 'grid-2' === $this->layout_type || 'leftward' === $this->layout_type || 'masonry' === $this->layout_type || 'justify' === $this->layout_type || 'timeline' === $this->layout_type ) {
				$list_class .= ' posts-list-' . sanitize_html_class( $this->layout_columns );
			}

			return $list_class;

		}

		/**
		 * Add blog related customizer options
		 *
		 * @param  array $options Options list
		 * @return array
		 */
		public function customizer_options( $options ) {

			$new_options = array(
				'blog_layout_type' => array(
					'title'    => esc_html__( 'Layout', 'fashion_daily' ),
					'priority' => 1,
					'section'  => 'blog',
					'default'  => 'default',
					'field'    => 'select',
					'choices'  => array(
						'default' 		=> esc_html__( 'Listing 1', 'fashion_daily' ),
						'leftward' 		=> esc_html__( 'Listing 2', 'fashion_daily' ),
						'grid' 			=> esc_html__( 'Grid 1', 'fashion_daily' ),
						'grid-2' 		=> esc_html__( 'Grid 2', 'fashion_daily' ),
						'masonry' 		=> esc_html__( 'Masonry', 'fashion_daily' ),
						'justify' 		=> esc_html__( 'Vertical Justify', 'fashion_daily' ),
						'timeline' 		=> esc_html__( 'Timeline', 'fashion_daily' )
					),
					'type' => 'control',
				)
			);

			$options['options'] = array_merge( $new_options, $options['options'] );

			return $options;

		}

		/**
		 * Check blog archive pages
		 *
		 * @return bool
		 */
		public function is_blog_archive() {

			if ( is_home() || ( is_archive() && ! is_tax() && ! is_post_type_archive() ) ) {
				return true;
			}

			return false;

		}

		/**
		 * Disable site content container
		 *
		 * @return boolean
		 */
		public function disable_site_content_container() {

			return $this->fullwidth_enabled;

		}

		/**
		 * Customizer blog sidebar enabled
		 *
		 * @return boolean
		 */
		public function customizer_blog_sidebar_enabled() {

			return $this->sidebar_enabled;

		}

		/**
		 * Customizer blog columns enabled
		 *
		 * @return boolean
		 */
		public function customizer_blog_columns_enabled() {

			return $this->columns_enabled;

		}

		/**
		 * Blog layouts styles
		 *
		 * @return void
		 */
		public function enqueue_styles() {

			wp_enqueue_style(
				'fashion_daily-blog-layouts-module',
				get_theme_file_uri( 'inc/modules/blog-layouts/assets/css/blog-layouts-module.css' ),
				false,
				fashion_daily_theme()->version()
			);

			if ( is_rtl() ) {
				wp_enqueue_style(
					'fashion_daily-blog-layouts-module-rtl',
					get_theme_file_uri( 'inc/modules/blog-layouts/assets/css/rtl.css' ),
					false,
					fashion_daily_theme()->version()
				);
			}

		}

	}

}
