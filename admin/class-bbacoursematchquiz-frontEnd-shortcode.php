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

class BBACourseMatchFrontEndShortCode {

    static function frontEndShortCode()
    {
        return self::QuizMatchPages();
    }

   /**
    * @since v1.0 | 09142022
    * Defined: QuizMatchPages method for processing pages
    */
    public static function QuizMatchPages() {
       
        $current_pages = '';
           
        if( isset($_REQUEST['bba-qm-pg']) == true )         
                                                            { $current_pages  = self::QuizMatchPageBegin();
        } else if( isset($_REQUEST['bba-qm-pg1']) == true ) { $current_pages .= self::QuizMatchPageOne();
        } else if( isset($_REQUEST['bba-qm-pg2']) == true ) { $current_pages .= self::QuizMatchPageTwo();
        } else if( isset($_REQUEST['bba-qm-pg3']) == true ) { $current_pages .= self::QuizMatchPageThree();
        } else if( isset($_REQUEST['bba-qm-pg4']) == true ) { $current_pages .= self::QuizMatchPageFour();

        } else { return ('BBA Quiz Match : 404 Page Not found!'); }

        return $current_pages;

    }

   /**
    * @since v1.0 | 09142022
    * Defined: Page begin Quiz Match for front end
    */
    public static function QuizMatchPageBegin() {

        return 'Begin' ;

        // session_start();



    }

   /**
    * @since v1.0 | 09142022
    * Defined: Page one for Quiz Match for front end
    */
    public static function QuizMatchPageOne() {

        return 'One';

    }

   /**
    * @since v1.0 | 09142022
    * Defined: Page two for Quiz Match for front end
    */
    public static function QuizMatchPageTwo() {

        return 'Two';

    }

   /**
    * @since v1.0 | 09142022
    * Defined: Page three for Quiz Match for front end
    */
    public static function QuizMatchPageThree() {

        return 'Three';

    }

   /**
    * @since v1.0 | 09142022
    * Defined: Page Four for Quiz Match for front end
    */
    public static function QuizMatchPageFour() {

        return 'Four';

    }

    public static function redirectTo($url = '') {
       
        return "<script> location.reload(); </script>" . header("$url");
        die();

    }


}
