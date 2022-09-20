<?php 

require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-bbacoursematchquiz-column-template.php';
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-bbacoursematchquiz-execute.php';

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

class BBAQMSelection extends BBACourseMatchColumnTemplate {
    
    /**
     * Defined: Properties default key.
     * @var @property $defaultKey
     *
     * @since    1.0.0
     * @since    09.20.2022 */
    static private $defaultKey = [

        '1-col',
        'bba_mainID',
        'container'
 
     ];
     
    /**
     * Defined: Properties column type.
     * @var @property $colType
     *
     * @since    1.0.0
     * @since    09.20.2022 */
    static private $colType;

    /**
     * Defined: Properties for Course selection 
     * @var @property $courseSelection
     *
     * @since    1.0.0
     * @since    09.20.2022 */
    static private $courseSelection;

    /**
     * Defined: Properties for selection 
     * @var @property $courseSelection
     *
     * @since    1.0.0
     * @since    09.20.2022 */
    static private $selection;

    /**
     * Defined: Properties for breakPoint 
     * @var @property $breakPoint
     *
     * @since    1.0.0
     * @since    09.20.2022 */
    static private $breakPoint;

    /**
     * Defined: Properties for container function 
     * @var @property $cbConFn
     *
     * @since    1.0.0
     * @since    09.20.2022 */
    static private $cbConFn;

    /**
     * Defined: Properties for container function 
     * @var @property $tempBreakPoint
     *
     * @since    1.0.0
     * @since    09.20.2022 */
    static private $tempBreakPoint;

    /**
     * Defined: Properties for container function 
     * @var @property $validatedKeyParentID
     *
     * @since    1.0.0
     * @since    09.20.2022 */
    static private $validatedKeyParentID;    

    /**
     * Defined: BBATemplate class generate B5 Framework easily!
     * Method name: BBATemplate
     *
     * @since    1.0.0
     * @since    09.19.2022 */
   static public function BBATemplate($colType, $dataGuide = []) {
        
    /**
     * Defined: If not set default key assigned
     * @since    1.0.0
     * @since    09.19.2022 */
    if(!isset( $colType )) { self::$colType = $defaultKey[0]; } 
    else { self::$colType = $colType; }

    /**
     * Defined: If not set default key assigned
     * @since    1.0.0
     * @since    09.19.2022 */
    if(!isset( $dataGuide[0] )) { self::$tempBreakPoint = $defaultKey[2]; } 
    else { self::$tempBreakPoint = self::bba_con_breakPoint( $dataGuide[0] ); }

    /**
     * Defined: If not set default key assigned
     * @since    1.0.0
     * @since    09.19.2022 */
    if(!isset( $dataGuide[1] )) { self::$validatedKeyParentID = $defaultKey[1]; }
    else { self::$validatedKeyParentID = $dataGuide[1] }

    }
    
    /**
     * Defined: col-1 b2 framework base.
     * function name: BBAaddCol1Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol1Content($selection = [], $breakPoint , $cbConFn) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col1
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection        = (new BBAQMPerform)->publicSetter($selection);

        /**
         * Defined: count col-breakpoint for col1 is 1
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint['c1'] = $breakPoint;
        self::$cbConFn['c1']    = $cbConFn;
    }

    /**
     * Defined: col-2 b2 framework base.
     * function name: BBAaddCol2Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol2Content($selection = [], $breakPoint , $cbConFn) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col2
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection        = (new BBAQMPerform)->publicSetter($selection);

        /**
         * Defined: count col-breakpoint for col2 is 2
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint['c2'] = $breakPoint;
        self::$cbConFn['c2']    = $cbConFn;
    }

    /**
     * Defined: col-3 b2 framework base.
     * function name: BBAaddCol3Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol3Content($selection = [], $breakPoint , $cbConFn) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col3
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection        = (new BBAQMPerform)->publicSetter($selection);

        /**
         * Defined: count col-breakpoint for col3 is 3
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint['c3'] = $breakPoint;
        self::$cbConFn['c3']    = $cbConFn;
    }

    /**
     * Defined: col-4 b2 framework base.
     * function name: BBAaddCol4Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol4Content($selection = [], $breakPoint , $cbConFn) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col4
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection        = (new BBAQMPerform)->publicSetter($selection);

        /**
         * Defined: count col-breakpoint for col4 is 4
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint['c4'] = $breakPoint;
        self::$cbConFn['c4']    = $cbConFn;
    }

    /**
     * Defined: col-5 b2 framework base.
     * function name: BBAaddCol5Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol5Content($selection = [], $breakPoint , $cbConFn) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col5
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection        = (new BBAQMPerform)->publicSetter($selection);

        /**
         * Defined: count col-breakpoint for col5 is 5
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint['c5'] = $breakPoint;
        self::$cbConFn['c5']    = $cbConFn;
    }

    /**
     * Defined: col-6 b2 framework base.
     * function name: BBAaddCol6Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol6Content($selection = [], $breakPoint , $cbConFn) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col6
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection        = (new BBAQMPerform)->publicSetter($selection);

        /**
         * Defined: count col-breakpoint for col6 is 6
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint['c6'] = $breakPoint;
        self::$cbConFn['c6']    = $cbConFn;
    }

    /**
     * Defined: col-7 b2 framework base.
     * function name: BBAaddCol7Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol7Content($selection = [], $breakPoint , $cbConFn) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col7
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection        = (new BBAQMPerform)->publicSetter($selection);

        /**
         * Defined: count col-breakpoint for col7 is 7
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint['c7'] = $breakPoint;
        self::$cbConFn['c7']    = $cbConFn;
    }

    /**
     * Defined: col-8 b2 framework base.
     * function name: BBAaddCol8Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol8Content($selection = [], $breakPoint , $cbConFn) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col8
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection        = (new BBAQMPerform)->publicSetter($selection);

        /**
         * Defined: count col-breakpoint for col8 is 8
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint['c8'] = $breakPoint;
        self::$cbConFn['c8']    = $cbConFn;
    }

    /**
     * Defined: col-9 b2 framework base.
     * function name: BBAaddCol9Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol9Content($selection = [], $breakPoint , $cbConFn) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col9
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection        = (new BBAQMPerform)->publicSetter($selection);

        /**
         * Defined: count col-breakpoint for col9 is 9
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint['c9'] = $breakPoint;
        self::$cbConFn['c9']    = $cbConFn;
    }

    /**
     * Defined: col-10 b2 framework base.
     * function name: BBAaddCol10Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol10Content($selection = [], $breakPoint , $cbConFn) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col10
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection         = (new BBAQMPerform)->publicSetter($selection);

        /**
         * Defined: count col-breakpoint for col10 is 10
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint['c10'] = $breakPoint;
        self::$cbConFn['c10']    = $cbConFn;
    }

    /**
     * Defined: col-11 b2 framework base.
     * function name: BBAaddCol11Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol11Content($selection = [], $breakPoint , $cbConFn) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col11
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection         = (new BBAQMPerform)->publicSetter($selection);

        /**
         * Defined: count col-breakpoint for col11 is 11
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint['c11'] = $breakPoint;
        self::$cbConFn['c11']    = $cbConFn;
    }

    /**
     * Defined: col-12 b2 framework base.
     * function name: BBAaddCol12Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol12Content($selection = [], $breakPoint , $cbConFn) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col12
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection         = (new BBAQMPerform)->publicSetter($selection);

        /**
         * Defined: count col-breakpoint for col12 is 12
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint['c12'] = $breakPoint;
        self::$cbConFn['c12']    = $cbConFn;
    }

   static public function do_BBATemplate() { 
         
        /**
         * Defined: The Hook Setting before Parent BBATemplate.
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        do_action( 'bba_qm_top_add_settings_before_parent' ); ?>
 
       <div id='<?php print( self::$validatedKeyParentID ); ?>' class='container-fluid bbafluid'>

       <?php 
         
         /**
          * Defined: The Hook Setting before Parent BBATemplate.
          *
          * @since    1.0.0
          * @since    09.19.2022 */
          do_action( 'bba_qm_add_settings_before_child_parent' ); ?>
   
         <div class='<?php print self::$tempBreakPoint ?> bba-box'>

         <?php 
         
         /**
          * Defined: The Hook Setting before Parent BBATemplate.
          *
          * @since    1.0.0
          * @since    09.19.2022 */
          do_action( 'bba_qm_add_settings_after_child_parent' ); ?>

           <div class='row bbarow'>

         <?php 
         
         /**
          * Defined: The Hook Setting before Parent BBATemplate.
          *
          * @since    1.0.0
          * @since    09.19.2022 */
          do_action( 'bba_qm_add_settings_after_child_row_parent' ); 

            /**
             * Defined: Swicth colType if this template was instatiate are one single column
             * or more columns such from 2 to 12 cols
             *
             * @since    1.0.0
             * @since    09.19.2022 */
              switch (self::$colType ) {

                /**
                 * Defined: Check which query will executed for colum template 
                 * do response appriate but on "calType" 
                 *
                 * @since    1.0.0
                 * @since    09.19.2022 */
                case '2-col':  print(BBAQMSelection::BBAColumnRequest(2));  break;
                case '3-col':  print(BBAQMSelection::BBAColumnRequest(3));  break;
                case '4-col':  print(BBAQMSelection::BBAColumnRequest(4));  break;
                case '5-col':  print(BBAQMSelection::BBAColumnRequest(5));  break;
                case '6-col':  print(BBAQMSelection::BBAColumnRequest(6));  break;
                case '7-col':  print(BBAQMSelection::BBAColumnRequest(7));  break;
                case '8-col':  print(BBAQMSelection::BBAColumnRequest(8));  break;
                case '9-col':  print(BBAQMSelection::BBAColumnRequest(9));  break;
                case '10-col': print(BBAQMSelection::BBAColumnRequest(10)); break;
                case '11-col': print(BBAQMSelection::BBAColumnRequest(11)); break;
                case '12-col': print(BBAQMSelection::BBAColumnRequest(12)); break;

                /**
                 * Defined: If you dont set anything and leave as empty string "" it will
                 * return default value as one 
                 *
                 * @since    1.0.0
                 * @since    09.19.2022 */
                default:       print(BBAQMSelection::BBAColumnRequest(1));  break;
              
              } ?>
        
            <?php 
         
            /**
             * Defined: The Hook Setting before Parent BBATemplate.
             *
             * @since    1.0.0
             * @since    09.19.2022 */
            do_action( 'bba_qm_add_settings_bottom_child_row_parent' ); ?>

             </div>

         <?php 
         
         /**
          * Defined: The Hook Setting before Parent BBATemplate.
          *
          * @since    1.0.0
          * @since    09.19.2022 */
         do_action( 'bba_qm_add_settings_bottom_child_parent' ); ?>
         </div>

         <?php 
         
         /**
          * Defined: The Hook Setting before Parent BBATemplate.
          *
          * @since    1.0.0
          * @since    09.19.2022 */
          do_action( 'bba_qm_add_settings_after_bottom_child_parent' ); ?>
   
     </div>

         <?php 
         
         /**
          * Defined: The Hook Setting before Parent BBATemplate.
          *
          * @since    1.0.0
          * @since    09.19.2022 */
          do_action( 'bba_qm_add_settings_after_bottom_parent' ); ?>
 
    <?php } 
    
   /**
    * Defined: function named: BBAColumnRequest
    * this handle how many cols will be executed base on your assigned colType 
    *
    * @since    1.0.0
    * @since    09.19.2022 */    
    
    static public function BBAColumnRequest($colType) {

      $data = [];  
      $init = 1; 
      
      for($dataRequest = $init; $dataRequest <= $colType;  $dataRequest++) 
      { $data[] = self::BBATemplateCol(self::$breakPoint['c'.$dataRequest], self::$cbConFn['c'.$dataRequest]); } 
      
      return (implode("", $data));

    }

   /**
    * Defined: function named: Execute
    * this is simple getter will excute all setting when this function is call! 
    *
    * @since    1.0.0
    * @since    09.19.2022 */   
    static public function Execute() { BBAQMSelection::do_BBATemplate() . die(); }  
  
}
