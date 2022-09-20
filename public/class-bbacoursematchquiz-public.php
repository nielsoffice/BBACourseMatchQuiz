<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://nielsoffice197227997.wordpress.com/
 * @since      1.0.0
 *
 * @package    Bbacoursematchquiz
 * @subpackage Bbacoursematchquiz/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bbacoursematchquiz
 * @subpackage Bbacoursematchquiz/public
 * @author     nielfernandez <renniel.fernandez@outgive.ca>
 */
class Bbacoursematchquiz_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bbacoursematchquiz-public.css', array(), $this->version, 'all' );

		/*!
		* Bootstrap v5.1.3 (https://getbootstrap.com/)
		* Copyright 2011-2021 The Bootstrap Authors
		* Copyright 2011-2021 Twitter, Inc.
		* Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
		*/
		wp_enqueue_style( 'Bootstrap v5', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), '5.1.3', 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bbacoursematchquiz-public.js', array( 'jquery' ), $this->version, false );
		
		/*!
		* Bootstrap v5.1.3 (https://getbootstrap.com/)
		* Copyright 2011-2021 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
		* Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
		*/
		wp_enqueue_script( 'Bootstrap v5', plugin_dir_url( __FILE__ ) . 'js/bootstrap.bundle.min.js', array( 'jquery' ), 'v5.1.3', false );

	}

}
