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
 * @subpackage Bbacoursematchquiz/includes
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
 * @subpackage Bbacoursematchquiz/includes
 * @author     nielfernandez <renniel.fernandez@outgive.ca>
 */

class BBAQuizMatchPageURL {
       
    /**
     * Defined: Properties valid URL.
     * @var @property $URL
     *
     * @since    1.0.0
     * @since    09.20.2022 */
    private static $URL;

   /**
    * @since v1.0 | 09142022
    * Defined: QuizMatchPages method for processing pages
    */
    static public function setURL( $url ) {

        /**
         * Defined: Validate restric all string setter.
         * @since    1.0.0
         * @since    09.19.2022 */   
        if (!preg_match("/^[a-zA-Z0-9._-]/", $url)) : return;  endif;
        if (!is_string($url)) : return;  endif;

        // set valid URL
        self::$URL = $url;        
    } 

    /**
     * Defined: Getter URL Validation Booleen.
     *
     * @since    1.0.0
     * @since    09.19.2022 */    
    static public function URL() {
        
        // global @var 
        global $wp;  

        // Do not initiliazed or run in admin !
        if( is_admin() ) : return; endif; 

        /**
         * Defined: Getter Get valid URL.
         * @since    1.0.0
         * @since    09.19.2022 */  
        if(isset($_REQUEST[self::$URL]) == true ) { return true; } 
        else {
           return false;
        }

    } 

}

