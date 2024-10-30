<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.catchthemes.com
 * @since      1.0.0
 *
 * @package    Catch_Social_Share
 * @subpackage Catch_Social_Share/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Catch_Social_Share
 * @subpackage Catch_Social_Share/includes
 * @author     Catch Plugins <www.catchthemes.com>
 */
class Catch_Social_Share_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'catch-social-share',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
