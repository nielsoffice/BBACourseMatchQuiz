<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://nielsoffice197227997.wordpress.com/
 * @since      1.0.0
 *
 * @package    Bbacoursematchquiz
 * @subpackage Bbacoursematchquiz/includes
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bbacoursematchquiz
 * @subpackage Bbacoursematchquiz/includes
 * @author     nielfernandez <renniel.fernandez@outgive.ca>
 */

 $admin_css = new Class {
  
    public function __construct() {

        add_action( 'admin_footer', array($this, 'style' ), 80 );        

    }
  
    public function style() { ?>

     <style> /* BBA QM Branding */ #bba_icon_brand { width: 10%; margin-bottom: 35px;} .bba_col { text-align: center;} </style>  
        
    <?php }

};