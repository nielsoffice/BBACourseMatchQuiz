<?php 

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://nielsoffice197227997.wordpress.com/
 * @since      1.0.0
 *
 * @package    Bbacoursematchquiz
 * @subpackage Bbacoursematchquiz/admin
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Bbacoursematchquiz
 * @subpackage Bbacoursematchquiz/admin
 * @author     nielfernandez <renniel.fernandez@outgive.ca>
 */

class BBAQMSelf  {
    
    /**
     * Defined: Self Class Redirection JS
     * JS Vanilla redirect trigger per click href
     * Method name: BBAQMRedirect
     *
     * @since    1.0.0
     * @since    09.20.2022 */ 
    public static function BBAQMRedirect( $url = '' ) { ?>
        
      <script> window.location.href = "<?php print($url); ?>"; </script>
    
    <?php }

}


