<?php 

session_start();

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
    
  static private $doString = true;

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

     static public function BBATemplateCol($breakPoint = '', $content_col = '' ) { ?> 'Test'! <?php }

}
