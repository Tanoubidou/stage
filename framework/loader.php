<?php
/**
 * Cherry X framework loader class.
 *
 * How to use:
 *
 * 1. Copy and include this class into your theme/plugin
 * 2. Add unique prefix for the class name, e.g. - Twentyseventeen_CX_Loader
 * 3. Initialize loader on after_setup_theme hook with priority -20, Example:
 *
 * add_action( 'after_setup_theme', 'twentyseventeen_framework_loader', -20 );
 * function twentyseventeen_framework_loader() {
 *     require get_theme_file_path( 'framework/loader.php' );
 *     new Twentyseventeen_CX_Loader(
 *         array(
 *             get_theme_file_path( 'framework/modules/module-1/module-1.php' ),
 *             get_theme_file_path( 'framework/modules/module-2/module-2.php' ),
 *             get_theme_file_path( 'framework/modules/module-3/module-3.php' ),
 *         )
 *     );
 * }
 *
 * Notes:
 *
 * 1. This class only select latest version of each module from all Cherry X frameworks loaded in current environment
 * 2. You should manually initialize selected modules later, when them will be needed you, but not eralier than after_setup_theme hook with priority 0.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Fashion_daily_CX_Loader' ) ) {

	/**
	 * Define Fashion_daily_CX_Loader class
	 */
	class Fashion_daily_CX_Loader {

		/**
		 * Key for object cache where are stored information about all modules in current environment
		 *
		 * @var string
		 */
		private $key = 'cherry_x_modules';

		/**
		 * Holder for modules list of current loader instance.
		 *
		 * @var array
		 */
		private $modules = array();

		/**
		 * Holder for modules slugs list of current loader instance.
		 *
		 * @var array
		 */
		private $modules_slugs = array();

		/**
		 * Loads latest versions of all modules passed into modules array
		 *
		 * @param array $modules List of loaded modules. Format:
		 * array(
		 *     get_theme_file_path( 'framework/modules/module-1/module-1.php' ),
		 *     get_theme_file_path( 'framework/modules/module-2/module-2.php' ),
		 *     get_theme_file_path( 'framework/modules/module-3/module-3.php' ),
		 * )
		 */
		public function __construct( array $modules = array() ) {

			$this->modules = $modules;

			add_action( 'after_setup_theme', array( $this, 'store_versions' ), -10 );
			add_action( 'after_setup_theme', array( $this, 'include_modules' ), -1 );

		}

		/**
		 * Store versions for modules passed in current instance into global modules versions list
		 *
		 * @return void
		 */
		public function store_versions() {

			foreach ( $this->modules as $module ) {
				$this->store_module_version( $module );
			}

		}

		/**
		 * Include latest versions of modules in current loader instance.
		 * All available version preiously stored by 'store_versions' methods of each loader instance.
		 *
		 * @return boolean
		 */
		public function include_modules() {

			$modules_data = wp_cache_get( $this->key );

			foreach ( $this->modules_slugs as $slug ) {

				if ( empty( $modules_data[ $slug ] ) ) {
					continue;
				}

				$path = $this->get_latest_version_path( $modules_data[ $slug ] );

				if ( file_exists( $path ) ) {
					require_once $path;
				}

			}

			return true;

		}

		/**
		 * Select latest version path from all available.
		 *
		 * @param  array  $module_versions All available vaerions paths for selected module
		 * @return string Module path.
		 */
		private function get_latest_version_path( array $module_versions = array() ) {

			// Immediately return path if array contain sinle element.
			if ( 1 === count( $module_versions ) ) {
				$module_versions = array_values( $module_versions );
				return $module_versions[0];
			}

			// Sort array by version and return highest
			uksort( $module_versions, 'version_compare' );
			return end( $module_versions );
		}

		/**
		 * Store passed module version and path into global modules data.
		 *
		 * @param  string $module_path Module path
		 * @return boolean
		 */
		private function store_module_version( $module_path = null ) {

			$slug         = basename( $module_path );
			$modules_data = wp_cache_get( $this->key );
			$modules_data = ! empty( $modules_data ) ? $modules_data : array();

			if ( empty( $modules_data[ $slug ] ) ) {
				$modules_data[ $slug ] = array();
			}

			$filedata = get_file_data( $module_path, array(
				'version' => 'Version',
			) );

			if ( empty( $filedata['version'] ) ) {
				// If version not passed in file header, so module defined not correctly and not be included
				return false;
			}

			$current_version = $filedata['version'];

			if ( empty( $modules_data[ $slug ][ $current_version ] ) ) {
				$modules_data[ $slug ][ $current_version ] = $module_path;
			}

			$this->modules_slugs[] = $slug;

			wp_cache_set( $this->key, $modules_data, '', 1 );

			return true;

		}

	}

}
