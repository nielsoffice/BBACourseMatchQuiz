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

class BBACourseMatchMenu {

    public function __construct()
    {

       add_action( 'admin_menu', [ $this,'bba_quiz_match' ] );

       /**
        * @since 25.05.2022 
        * Defined: BBACourseMatchFrontEndShortCode::Class
        */ 
       add_action( 'init', [ $this,'wp_get_bba_quiz_match_frontEnd_rendered' ] );
       add_shortcode( 'QuizMatch', array( 'BBACourseMatchFrontEndShortCode', 'frontEndShortCode' ) );
    
    }

    /**
     * Defined: create admin menu back end wp for create post
     * @since 25.05.2022
     */
    public function bba_quiz_match() : void  {

       add_menu_page(

      'BBA Quiz Match Result',
      'CBBA Quiz Match',
      'manage_options',
       'wp-get-ratings',
        [$this, 'wp_get_bba_quiz_match_rendered'],
        'dashicons-format-quote'
    
      );
    
    }
 
  /**
   * Defined: call back function class for Admin menu 
   * @since 25.05.2022
   */    
   public function wp_get_bba_quiz_match_rendered() {

     require_once ( 'class-bbacoursematchquiz-rendered.php' );
     if( class_exists('BBACourseMatchMenuRendered') ) {
       new BBACourseMatchMenuRendered();
     }

   }

   public function wp_get_bba_quiz_match_frontEnd_rendered() {

    require_once ( 'class-bbacoursematchquiz-frontEnd-shortcode.php' );
    if( class_exists('BBACourseMatchFrontEndShortCode') ) {
      new BBACourseMatchFrontEndShortCode();
    }

  }


}

