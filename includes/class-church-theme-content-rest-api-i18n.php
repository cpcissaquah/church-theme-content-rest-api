<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/joe--cool
 * @since      1.0.0
 *
 * @package    Church_Theme_Content_Rest_Api
 * @subpackage Church_Theme_Content_Rest_Api/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Church_Theme_Content_Rest_Api
 * @subpackage Church_Theme_Content_Rest_Api/includes
 * @author     joe--cool <aarond@cpcissaquah.org>
 */
class Church_Theme_Content_Rest_Api_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'church-theme-content-rest-api',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
