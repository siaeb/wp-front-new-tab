<?php

namespace siaeb\front_new_tabs\includes;

class AssetsLoader {

	/**
	 * AssetsLoader constructor.
	 *
	 * Load assets ( backend, frontend ...)
	 *
	 * @since 1.0
	 */
	public function __construct() {
		add_action('admin_enqueue_scripts', [$this, 'loadBackendAssets'], 11);
	}

	/**
	 * Load backend assets
	 *
	 * @since 1.0
	 */
	function loadBackendAssets() {
		wp_enqueue_script(
			SIAEB_FNT_PREFIX . 'script',
			SIAEB_FNT_JS_URL . '/fnt.js',
			[],
			'1.0',
			true
		);
	}

}
