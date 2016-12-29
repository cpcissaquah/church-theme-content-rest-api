<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/joe--cool
 * @since             1.0.0
 * @package           Church_Theme_Content_Rest_Api
 *
 * @wordpress-plugin
 * Plugin Name:       Church Theme Content - REST API
 * Plugin URI:        https://github.com/cpcissaquah/church-theme-content-rest-api
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            joe--cool
 * Author URI:        https://github.com/joe--cool
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       church-theme-content-rest-api
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-church-theme-content-rest-api-activator.php
 */
function activate_church_theme_content_rest_api() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-church-theme-content-rest-api-activator.php';
	Church_Theme_Content_Rest_Api_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-church-theme-content-rest-api-deactivator.php
 */
function deactivate_church_theme_content_rest_api() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-church-theme-content-rest-api-deactivator.php';
	Church_Theme_Content_Rest_Api_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_church_theme_content_rest_api' );
register_deactivation_hook( __FILE__, 'deactivate_church_theme_content_rest_api' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-church-theme-content-rest-api.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_church_theme_content_rest_api() {

	$plugin = new Church_Theme_Content_Rest_Api();
	$plugin->run();

}
run_church_theme_content_rest_api();
