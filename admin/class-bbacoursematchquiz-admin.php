<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://nielsoffice197227997.wordpress.com/
 * @since      1.0.0
 *
 * @package    Bbacoursematchquiz
 * @subpackage Bbacoursematchquiz/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bbacoursematchquiz
 * @subpackage Bbacoursematchquiz/admin
 * @author     nielfernandez <renniel.fernandez@outgive.ca>
 */
class Bbacoursematchquiz_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bbacoursematchquiz_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bbacoursematchquiz_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bbacoursematchquiz-admin.css', array(), $this->version, 'all' );

		/*
		* This combined file was created by the DataTables downloader builder:
		*   https://datatables.net/download
		*
		* To rebuild or modify this file with the latest versions of the included
		* software please visit:
		*   https://datatables.net/download/#bs5/dt-1.12.1
		*
		* Included libraries:
		*   DataTables 1.12.1
		*/
	
    	//	wp_enqueue_style( 'Datatables-Style', plugin_dir_url( __FILE__ ) . 'css/datatables.min.css', array(), '1.12.1', 'all' );
			
	
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Bbacoursematchquiz_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Bbacoursematchquiz_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bbacoursematchquiz-admin.js', array( 'jquery' ), $this->version, false );
    
		/*
		* This combined file was created by the DataTables downloader builder:
		*   https://datatables.net/download
		*
		* To rebuild or modify this file with the latest versions of the included
		* software please visit:
		*   https://datatables.net/download/#bs5/dt-1.12.1
		*
		* Included libraries:
		*   DataTables 1.12.1
		*/
	
		  // wp_enqueue_script( 'Datatables', plugin_dir_url( __FILE__ ) . 'js/datatables.min.js', array( 'jquery' ), '1.12.1' , false );
      

	}

}
