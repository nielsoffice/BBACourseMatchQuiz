<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://nielsoffice197227997.wordpress.com/
 * @since             1.0.0
 * @package           Bbacoursematchquiz
 *
 * @wordpress-plugin
 * Plugin Name:       BBACourseMatchQuiz
 * Plugin URI:        https://github.com/nielsofficeofficial/BBACourseMatchQuiz
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            nielfernandez
 * Author URI:        https://nielsoffice197227997.wordpress.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bbacoursematchquiz
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}   


/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BBACOURSEMATCHQUIZ_VERSION', '1.0.0' );

/**
 * Currently plugin Quiz Match Default Settings.
 * @since 09.20.2022
 */
 require_once plugin_dir_path( __FILE__ ) . 'qm-default.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bbacoursematchquiz-activator.php
 */
function activate_bbacoursematchquiz() {
	
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bbacoursematchquiz-activator.php';
	Bbacoursematchquiz_Activator::activate();

}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bbacoursematchquiz-deactivator.php
 */
function deactivate_bbacoursematchquiz() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bbacoursematchquiz-deactivator.php';
	Bbacoursematchquiz_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bbacoursematchquiz' );
register_deactivation_hook( __FILE__, 'deactivate_bbacoursematchquiz' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bbacoursematchquiz.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bbacoursematchquiz() {

	$plugin = new Bbacoursematchquiz();
	$plugin->run();

}
run_bbacoursematchquiz();
