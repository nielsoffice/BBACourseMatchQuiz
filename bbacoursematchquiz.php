<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://outgive.ca/
 * @since             1.0.0
 * @package           Bbacoursematchquiz
 *
 * @wordpress-plugin
 * Plugin Name:       BBACourseMatchQuiz
 * Plugin URI:        https://github.com/nielsofficeofficial/BBACourseMatchQuiz
 * Description:       BBA Quiz Match which course suit for you! 
 * Version:           1.0.0
 * Author:            nielfernandez
 * Author URI:        https://outgive.ca/
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


function ___qmireg_09282022_456am() {

	global $wpdb;

	$table_name = $wpdb->prefix . 'bba_qm_session';
	$query      = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );
	$charset_collate = $wpdb->get_charset_collate();
	
	if ( ! $wpdb->get_var( $query ) == $table_name ) {	
	
	$sql = "CREATE TABLE  $table_name  (
			id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT ,
			Date_created date NOT NULL DEFAULT current_timestamp(),
			PRIMARY KEY (id)
		   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
	
	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( $sql );
	
	}
}

register_activation_hook( __FILE__, '___qmireg_09282022_456am' );

function ___qmireg_09282022_456am_products() {
	
	global $wpdb;

	# Products
	$table_name = $wpdb->prefix . 'bba_qm_products';
	$query      = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );
	$charset_collate = $wpdb->get_charset_collate();

	if ( ! $wpdb->get_var( $query ) == $table_name ) {	

	$sql = "CREATE TABLE $table_name (
		id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
		id_session bigint(20) UNSIGNED NOT NULL,
		QM_code varchar(5) NOT NULL,
		qm_selection_Guide varchar(255) DEFAULT NULL,
		qm_classic_kit int(60) NOT NULL,
		qm_ultimate_Bundle int(60) NOT NULL,
		qm_classic int(60) NOT NULL,
		qm_volume int(60) NOT NULL,
		PRIMARY KEY (id)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( $sql );

	}

}

register_activation_hook( __FILE__, '___qmireg_09282022_456am_products' );

function ___qmireg_09282022_456am_emailList() {

	global $wpdb;

	# bba_qm_elist	
	$table_name = $wpdb->prefix . 'bba_qm_elist';
	$query      = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );
	$charset_collate = $wpdb->get_charset_collate();

	if ( ! $wpdb->get_var( $query ) == $table_name ) {		

	$sql = " CREATE TABLE $table_name (
			id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			id_session bigint(20) UNSIGNED NOT NULL,
			qm_emal varchar(255) NOT NULL,
			qm_e_list varchar(255) NOT NULL,
			PRIMARY KEY (id)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';
	dbDelta( $sql );

	}

}

register_activation_hook( __FILE__, '___qmireg_09282022_456am_emailList' );

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
