<?php 

require_once 'class-bbacoursematchquiz-column-template.php';
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

class BbaQMCourse extends BBACourseMatchColumnTemplate {
     
    static private $defaultKey = [

        '1-col'
 
     ];
 
    static private $colType;

    static private $courseSelection;

    static private $selection;

    static private $breakPoint;

    static private $cbConFn;

    static private $tempBreakPoint;

    static private $validatedKeyParentID;    

   static public function BBATemplate($colType, $dataGuide = []) {
        
    self::$colType = $colType;

    self::$tempBreakPoint       = self::bba_con_breakPoint( $dataGuide[0] ); 
    self::$validatedKeyParentID = $dataGuide[1]; 

    }
    
    static public function BBAaddCol1Content($selection = [], $breakPoint , $cbConFn) {

        self::$selection        = $selection;
        self::$breakPoint['c1'] = $breakPoint;
        self::$cbConFn['c1']    = $cbConFn;
    }

    static public function BBAaddCol2Content($selection = [], $breakPoint , $cbConFn) {

        self::$selection        = $selection;
        self::$breakPoint['c2'] = $breakPoint;
        self::$cbConFn['c2']    = $cbConFn;
    }

    static public function BBAaddCol3Content($selection = [], $breakPoint , $cbConFn) {

        self::$selection        = $selection;
        self::$breakPoint['c3'] = $breakPoint;
        self::$cbConFn['c3']    = $cbConFn;
    }

    static public function BBAaddCol4Content($selection = [], $breakPoint , $cbConFn) {

        self::$selection        = $selection;
        self::$breakPoint['c4'] = $breakPoint;
        self::$cbConFn['c4']    = $cbConFn;
    }

    static public function BBAaddCol5Content($selection = [], $breakPoint , $cbConFn) {

        self::$selection        = $selection;
        self::$breakPoint['c5'] = $breakPoint;
        self::$cbConFn['c5']    = $cbConFn;
    }

    static public function BBAaddCol6Content($selection = [], $breakPoint , $cbConFn) {

        self::$selection        = $selection;
        self::$breakPoint['c6'] = $breakPoint;
        self::$cbConFn['c6']    = $cbConFn;
    }

    static public function BBAaddCol7Content($selection = [], $breakPoint , $cbConFn) {

        self::$selection        = $selection;
        self::$breakPoint['c7'] = $breakPoint;
        self::$cbConFn['c7']    = $cbConFn;
    }

    static public function BBAaddCol8Content($selection = [], $breakPoint , $cbConFn) {

        self::$selection        = $selection;
        self::$breakPoint['c8'] = $breakPoint;
        self::$cbConFn['c8']    = $cbConFn;
    }

    static public function BBAaddCol9Content($selection = [], $breakPoint , $cbConFn) {

        self::$selection        = $selection;
        self::$breakPoint['c9'] = $breakPoint;
        self::$cbConFn['c9']    = $cbConFn;
    }

    static public function BBAaddCol10Content($selection = [], $breakPoint , $cbConFn) {

        self::$selection         = $selection;
        self::$breakPoint['c10'] = $breakPoint;
        self::$cbConFn['c10']    = $cbConFn;
    }

    static public function BBAaddCol11Content($selection = [], $breakPoint , $cbConFn) {

        self::$selection         = $selection;
        self::$breakPoint['c11'] = $breakPoint;
        self::$cbConFn['c11']    = $cbConFn;
    }

    static public function BBAaddCol12Content($selection = [], $breakPoint , $cbConFn) {

        self::$selection         = $selection;
        self::$breakPoint['c12'] = $breakPoint;
        self::$cbConFn['c12']    = $cbConFn;
    }

   static public function do_BBATemplate() { ?>

       <div id='<?php print( self::$validatedKeyParentID ); ?>' class='container-fluid bbafluid'>
         <div class='<?php print self::$tempBreakPoint ?> bba-box'>
           <div class='row bbarow'>

             <?php 

              switch (self::$colType ) {

                case '2-col':  print(BbaQMCourse::BBAColumnRequest(2));  break;
                case '3-col':  print(BbaQMCourse::BBAColumnRequest(3));  break;
                case '4-col':  print(BbaQMCourse::BBAColumnRequest(4));  break;
                case '5-col':  print(BbaQMCourse::BBAColumnRequest(5));  break;
                case '6-col':  print(BbaQMCourse::BBAColumnRequest(6));  break;
                case '7-col':  print(BbaQMCourse::BBAColumnRequest(7));  break;
                case '8-col':  print(BbaQMCourse::BBAColumnRequest(8));  break;
                case '9-col':  print(BbaQMCourse::BBAColumnRequest(9));  break;
                case '10-col': print(BbaQMCourse::BBAColumnRequest(10)); break;
                case '11-col': print(BbaQMCourse::BBAColumnRequest(11)); break;
                case '12-col': print(BbaQMCourse::BBAColumnRequest(12)); break;
                default:       print(BbaQMCourse::BBAColumnRequest(1));  break;
              
              } ?>

             </div>
         </div>
     </div>
 
    <?php } 
    
    static public function BBAColumnRequest($colType) {

      $data = [];  
      $init = 1; 
      
      for($dataRequest = $init; $dataRequest <= $colType;  $dataRequest++) 
      { $data[] = self::BBATemplateCol(self::$breakPoint['c'.$dataRequest], self::$cbConFn['c'.$dataRequest]); } 
      
      return (implode("", $data));

    }

    static public function Execute() { BbaQMCourse::do_BBATemplate(); }  
  
}
