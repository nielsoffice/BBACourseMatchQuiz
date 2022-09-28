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

class BBACourseMatchColumnTemplate {
    
  /**
   * Defined: callable  ;
   * @since    1.0.0
   * @since    09.25.2022 */
  static private $doString = true;

  /**
   * Defined: activation ;
   * @since    1.0.0
   * @since    09.25.2022 */
  static private $activation = 'begin';

    /**
     * Defined: multiple colum break poing handler ;
     * @since    1.0.0
     * @since    09.25.2022 */
    static public function bba_con_breakPoint($tempSet) {

      switch ( $tempSet ) {

        case 'box-sm':  return 'container-sm';  break;
        case 'box-md':  return 'container-md';  break;
        case 'box-lg':  return 'container-lg';  break;
        case 'box-xl':  return 'container-xl';  break;
        case 'box-xxl': return 'container-xxl'; break;
        
        default:        return 'container-fluid'; break;
      
      }

    }

  /**
   * Defined: Column main template
   * Method name: BBATemplateCol
   * 
   * @since    1.0.0
   * @since    09.25.2022 */    
  static public function BBATemplateCol($breakPoint = null, $content = null) {
    
  /**
   * Defined:SET URL Begin the activation will run
   * 
   * @since    1.0.0
   * @since    09.25.2022 */  
    if( (isset($_REQUEST[self::$activation]) == true)     || (isset($_REQUEST[self::$activation.'1'])  == true) || 
        (isset($_REQUEST[self::$activation.'2']) == true) || (isset($_REQUEST[self::$activation.'3'])  == true) ||
        (isset($_REQUEST[self::$activation.'3']) == true) || (isset($_REQUEST[self::$activation.'4'])  == true) || 
        (isset($_REQUEST[self::$activation.'5']) == true) || (isset($_REQUEST[self::$activation.'6'])  == true) ||
        (isset($_REQUEST[self::$activation.'7']) == true) || (isset($_REQUEST[self::$activation.'8'])  == true) ||
        (isset($_REQUEST[self::$activation.'9']) == true) || (isset($_REQUEST[self::$activation.'10']) == true) 
        
      ){ 
            
    /**
     * Defined:SET URL Begin the activation will run
     * 
     * @since    1.0.0
     * @since    09.25.2022 */ ?>
     <div class="col-<?php print($breakPoint); ?>">
     <?php print($content(self::$doString) . (BBAQMPerform::bba_activation_qm()) ); ?>
     </div>

     <?php } else {  
      
      /**
       * Defined: else perform template crud operation
       *  
       * @since    1.0.0
       * @since    09.25.2022 */ ?>    
            <div class="col-<?php print($breakPoint); ?>"> <?php
        
      /**
       * Defined: else perform template crud operation
       * Method name: do_insert call back AND do_insert adn string !
       *  
       * @since    1.0.0
       * @since    09.25.2022 */
        if( is_callable($content) ) { print($content(self::$doString) );  }   
        else { print($content); }
   
      ?>
    </div><?php }

  }

}
