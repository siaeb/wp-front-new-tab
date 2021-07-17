<?php
/**
 * Plugin Name: WP Front New Tab
 * Plugin URI: http://www.siaeb.com
 * Description: Using this plugin, you can safely click on the site’s link without losing the current page, because your site will open in a new tab or window .
 * Author: Siavash Ebrahimi
 * Author URI: http://www.siaeb.com
 * Version: 1.0
 */

use siaeb\front_new_tabs\includes\AssetsLoader;

if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'SIAEB_FRONT_NEW_TAB' ) ) :

	final class SIAEB_FRONT_NEW_TAB {

		/**
		 * @var AssetsLoader
		 */
		private $_assets;

		/**
		 * @var SIAEB_FRONT_NEW_TAB The one true SIAEB_FRONT_NEW_TAB
		 *
		 * @since 1.0.0
		 */
		private static $instance;

		public static function instance() {

			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof SIAEB_FRONT_NEW_TAB) ) {
				self::$instance = new SIAEB_FRONT_NEW_TAB();

				self::$instance->constants();
				self::$instance->includes();

				self::$instance->_assets = new AssetsLoader();
			}

			return self::$instance;
		}

		/**
		 * Throw error on object clone.
		 *
		 * The whole idea of the singleton design pattern is that there is a single
		 * object therefore, we don't want the object to be cloned.
		 *
		 * @since 1.0
		 * @access protected
		 * @return void
		 */
		public function _clone() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'dpdb-FS' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @since 1.0
		 * @access protected
		 * @return void
		 */
		public function _wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'dpdb-FS' ), '1.0.0' );
		}

		/**
		 * Setup plugin constants.
		 *
		 * @access private
		 * @since 1.0
		 * @return void
		 */
		private function constants() {
			$this->define_constant('SIAEB_FNT_PREFIX', 'siaeb_fnt_');
			$this->define_constant('SIAEB_FNT_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ));
			$this->define_constant('SIAEB_FNT_INC_DIR', SIAEB_FNT_DIR . 'includes');
			$this->define_constant('SIAEB_FNT_FILE', __FILE__);
			$this->define_constant( 'SIAEB_FNT_PLUGIN_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
			$this->define_constant( 'SIAEB_FNT_ASSETS_URL', SIAEB_FNT_PLUGIN_URL . 'assets' );
			$this->define_constant( 'SIAEB_FNT_JS_URL', SIAEB_FNT_ASSETS_URL . '/js' );
		}


		/**
		 * Define constant
		 *
		 * @since 1.0
		 * @param $name
		 * @param $value
		 */
		private function define_constant($name, $value) {
			if (!defined($name)) {
				define($name, $value);
			}
		}

		/**
		 * Include required files.
		 *
		 * @access private
		 * @since 1.0
		 * @return void
		 */
		private function includes() {
			include_once SIAEB_FNT_INC_DIR . '/AssetsLoader.php';
		}

	}

endif;

/**
 * The main function for that returns SIAEB_FRONT_NEW_TAB
 *
 * The main function responsible for returning the one true Strong_Patcher
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $instance = gma_idea(); ?>
 *
 * @since 1.0
 * @return object|SIAEB_FRONT_NEW_TAB The one true SIAEB_FRONT_NEW_TAB Instance.
 */
function front_new_tab() {
	return SIAEB_FRONT_NEW_TAB::instance();
}

front_new_tab();
