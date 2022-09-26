<?php

/**
 * Fired during plugin activation
 *
 * @link       https://nielsoffice197227997.wordpress.com/
 * @since      1.0.0
 *
 * @package    Bbacoursematchquiz
 * @subpackage Bbacoursematchquiz/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Bbacoursematchquiz
 * @subpackage Bbacoursematchquiz/includes
 * @author     nielfernandez <renniel.fernandez@outgive.ca>
 */
class Bbacoursematchquiz_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		global $wpdb;
		$jal_db_version = '1.0';
	
		$table_name = $wpdb->prefix . 'bba_qm_session';
		
		$sql = "CREATE TABLE  $table_name  (
		 	   `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'User session begin',
		       `Date_created` date NOT NULL DEFAULT current_timestamp(),
			    PRIMARY KEY (id)
		       ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
	
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	
		add_option( 'jal_db_version', $jal_db_version );


		# Products
		$table_name = $wpdb->prefix . 'bba_qm_products';
	
		$sql = "CREATE TABLE $table_name (
			`id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			`id_session` bigint(20) UNSIGNED NOT NULL,
			`QM_code` varchar(5) NOT NULL,
			`qm_selection_Guide` varchar(255) DEFAULT NULL,
			`qm_classic_kit` int(60) NOT NULL,
			`qm_ultimate_Bundle` int(60) NOT NULL,
			`qm_classic` int(60) NOT NULL,
			`qm_volume` int(60) NOT NULL,
			 PRIMARY KEY (id)
		  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
	
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	
		add_option( 'jal_db_version', $jal_db_version );


		# bba_qm_elist
		$table_name = $wpdb->prefix . 'bba_qm_elist';
		$charset_collate = $wpdb->get_charset_collate();
	
		$sql = " CREATE TABLE $table_name (
			  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
			  `id_session` bigint(20) UNSIGNED NOT NULL,
		 	  `qm_emal` varchar(255) NOT NULL,
		  	  `qm_e_list` varchar(255) NOT NULL,
				PRIMARY KEY (id)
			  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

	    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );

		add_option( 'jal_db_version', $jal_db_version );
		  
	}
}
