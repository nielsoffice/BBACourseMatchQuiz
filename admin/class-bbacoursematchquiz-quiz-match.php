<?php 

require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-bbacoursematchquiz-column-template.php';
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-bbacoursematchquiz-exec.php';

/**
 * The file that defines the core plugin class
 *
 * A class definition that admin attributes and functions used across both the
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
        'container',
        'c1',
        'c2',
        'c3',
        'c4',
        'c5',
        'c6',
        'c7',
        'c8',
        'c9',
        'c10',
        'c11',
        'c12',
        'c'
 
     ];

    /**
     * Defined: Properties colSet key.
     * @var @property $colSet
     *
     * @since    1.0.0
     * @since    09.20.2022 */
    static private $colSet = [

        '1-col',
        '2-col',
        '3-col',
        '4-col',
        '5-col',
        '6-col',
        '7-col',
        '8-col',
        '9-col',
        '10-col',
        '11-col',
        '12-col'
 
     ];

    /**
     * Defined: Properties colLoopReq key.
     * @var @property $colLoopReq
     *
     * @since    1.0.0
     * @since    09.20.2022 */
    static private $colLoopReq = [

        '1',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        '10',
        '11',
        '12'
 
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
    if(!isset( $colType )) { self::$colType = self::$defaultKey[0]; } 
    else { self::$colType = $colType; }

    /**
     * Defined: If not set default key assigned
     * @since    1.0.0
     * @since    09.19.2022 */
    if(!isset(  $dataGuide[0] )) {self::$tempBreakPoint = self::$defaultKey[1]; } 
    else { self::$tempBreakPoint = self::bba_con_breakPoint( $dataGuide[0] );  }
    
    /**
     * Defined: If not set default key assigned
     * @since    1.0.0
     * @since    09.19.2022 */
    if(!isset(  $dataGuide[1] )) {self::$validatedKeyParentID = self::$defaultKey[2]; } 
    else {  self::$validatedKeyParentID = $dataGuide[1];  }

    }
    
    /**
     * Defined: col-1 b2 framework base.
     * function name: BBAaddCol1Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol1Content($selection = [], $breakPoint = null , $cbConFn = null) {
        
       self::$selection = (new BBAQMPerform)->publicSetter($selection, null );

        /**
         * Defined: Selection perform database drivin operation and default page activation col1
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
       

        /**
         * Defined: count col-breakpoint for col1 is 1
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint[self::$defaultKey[3]] = $breakPoint;
        self::$cbConFn[self::$defaultKey[3]]    = $cbConFn;
    }

    /**
     * Defined: col-2 b2 framework base.
     * function name: BBAaddCol2Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol2Content($selection = [], $breakPoint = null , $cbConFn = null ) {
  
        /**
         * Defined: Selection perform database drivin operation and default page activation col2
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */

        self::$selection = (new BBAQMCol2Perform)->qmpublicSetter($selection, null );

        /**
         * Defined: count col-breakpoint for col2 is 2
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint[self::$defaultKey[4]] = $breakPoint;
        self::$cbConFn[self::$defaultKey[4]]    = $cbConFn;
    }

    /**
     * Defined: col-3 b2 framework base.
     * function name: BBAaddCol3Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol3Content($selection = [], $request = null , $breakPoint = null , $cbConFn = null) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col3
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection = (new BBAQMPerform)->publicSetter($selection,null );

        /**
         * Defined: count col-breakpoint for col3 is 3
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint[self::$defaultKey[5]] = $breakPoint;
        self::$cbConFn[self::$defaultKey[5]]    = $cbConFn;
    }

    /**
     * Defined: col-4 b2 framework base.
     * function name: BBAaddCol4Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol4Content($selection = [], $request = null , $breakPoint = null , $cbConFn = null) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col4
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection = (new BBAQMPerform)->publicSetter($selection, null );

        /**
         * Defined: count col-breakpoint for col4 is 4
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint[self::$defaultKey[6]] = $breakPoint;
        self::$cbConFn[self::$defaultKey[6]]    = $cbConFn;
    }

    /**
     * Defined: col-5 b2 framework base.
     * function name: BBAaddCol5Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol5Content($selection = [], $request = null , $breakPoint = null , $cbConFn = null) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col5
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection = (new BBAQMPerform)->publicSetter($selection, null );;

        /**
         * Defined: count col-breakpoint for col5 is 5
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint[self::$defaultKey[7]] = $breakPoint;
        self::$cbConFn[self::$defaultKey[7]]    = $cbConFn;
    }

    /**
     * Defined: col-6 b2 framework base.
     * function name: BBAaddCol6Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol6Content($selection = [], $request = null , $breakPoint = null , $cbConFn = null) {
        /**
         * Defined: Selection perform database drivin operation and default page activation col6
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection = (new BBAQMPerform)->publicSetter($selection,null );

        /**
         * Defined: count col-breakpoint for col6 is 6
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint[self::$defaultKey[8]] = $breakPoint;
        self::$cbConFn[self::$defaultKey[8]]    = $cbConFn;
    }

    /**
     * Defined: col-7 b2 framework base.
     * function name: BBAaddCol7Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol7Content($selection = [], $request = null , $breakPoint = null , $cbConFn = null) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col7
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection = (new BBAQMPerform)->publicSetter($selection, null );
        /**
         * Defined: count col-breakpoint for col7 is 7
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint[self::$defaultKey[9]] = $breakPoint;
        self::$cbConFn[self::$defaultKey[9]]    = $cbConFn;
    }

    /**
     * Defined: col-8 b2 framework base.
     * function name: BBAaddCol8Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol8Content($selection = [], $request = null , $breakPoint = null , $cbConFn = null) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col8
         * B5 Front End Framework Fully responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection = (new BBAQMPerform)->publicSetter($selection,null);

        /**
         * Defined: count col-breakpoint for col8 is 8
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint[self::$defaultKey[10]] = $breakPoint;
        self::$cbConFn[self::$defaultKey[10]]    = $cbConFn;
    }

    /**
     * Defined: col-9 b2 framework base.
     * function name: BBAaddCol9Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol9Content($selection = [], $request = null , $breakPoint = null , $cbConFn = null) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col9
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection = (new BBAQMPerform)->publicSetter($selection,null );

        /**
         * Defined: count col-breakpoint for col9 is 9
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint[self::$defaultKey[11]] = $breakPoint;
        self::$cbConFn[self::$defaultKey[11]]    = $cbConFn;
    }

    /**
     * Defined: col-10 b2 framework base.
     * function name: BBAaddCol10Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol10Content($selection = [], $request = null , $breakPoint = null , $cbConFn = null) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col10
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection = (new BBAQMPerform)->publicSetter($selection,null );

        /**
         * Defined: count col-breakpoint for col10 is 10
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint[self::$defaultKey[12]] = $breakPoint;
        self::$cbConFn[self::$defaultKey[12]]    = $cbConFn;
    }

    /**
     * Defined: col-11 b2 framework base.
     * function name: BBAaddCol11Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol11Content($selection = [], $request = null , $breakPoint = null , $cbConFn = null) {


        /**
         * Defined: Selection perform database drivin operation and default page activation col11
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection = (new BBAQMPerform)->publicSetter($selection,null );

        /**
         * Defined: count col-breakpoint for col11 is 11
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint[self::$defaultKey[13]] = $breakPoint;
        self::$cbConFn[self::$defaultKey[13]]    = $cbConFn;
    }

    /**
     * Defined: col-12 b2 framework base.
     * function name: BBAaddCol12Content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddCol12Content($selection = [], $request = null , $breakPoint = null , $cbConFn = null) {

        /**
         * Defined: Selection perform database drivin operation and default page activation col12
         * B5 Front End Framework Fullt responsive From Desktop to mobile
         * Class name: BBAQMPerform
         * Method name: publicSetter
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$selection = (new BBAQMPerform)->publicSetter($selection,null);

        /**
         * Defined: count col-breakpoint for col12 is 12
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        self::$breakPoint[self::$defaultKey[14]] = $breakPoint;
        self::$cbConFn[self::$defaultKey[14]]    = $cbConFn;
    }

    /**
     * Defined: from col-1 b2 framework base add email content.
     * function name: BBAaddCol1Content to BBAaddEmailContent same approach but email content
     *
     * @since    1.0.0
     * @since    09.19.2022 */
    static public function BBAaddEmailContent($selection = [], $breakPoint = null , $cbConFn = null) {
        
        self::$selection = (new BBAQMPerform)->publicSetter($selection , $email = true );
 
         /**
          * Defined: Selection perform database drivin operation and default page activation col1
          * B5 Front End Framework Fullt responsive From Desktop to mobile
          * Class name: BBAQMPerform
          * Method name: publicSetter
          *
          * @since    1.0.0
          * @since    09.19.2022 */
        
 
         /**
          * Defined: count col-breakpoint for col1 is 1
          *
          * @since    1.0.0
          * @since    09.19.2022 */
         self::$breakPoint[self::$defaultKey[3]] = $breakPoint;
         self::$cbConFn[self::$defaultKey[3]]    = $cbConFn;

     }

   static public function do_BBATemplate() { 
         
        /**
         * Defined: The Hook Setting before Parent BBATemplate.
         *
         * @since    1.0.0
         * @since    09.19.2022 */
        do_action( 'bba_qm_top_add_settings_before_parent' ); 
        
       /**
       * Defined: HTML template closing head
       * @since    1.0.0
       * @since    09.2.2022 */ 
       require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/bbacoursematchquiz-admin-closing-head-html.php'; 
       
       ?>
       <div id='<?php print( self::$validatedKeyParentID ); ?>' class='container-fluid bbafluid animate-bottom' style="display:none;"> <?php 
         
         /**
          * Defined: The Hook Setting before Parent BBATemplate.
          *
          * @since    1.0.0
          * @since    09.19.2022 */
          do_action( 'bba_qm_add_settings_before_child_parent' ); ?>
   
         <div class='<?php print self::$tempBreakPoint ?> bba-box'> <?php 
         
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
                case self::$colSet[1]  :  print(BBAQMSelection::BBAColumnRequest(self::$colLoopReq[1]));  break;
                case self::$colSet[2]  :  print(BBAQMSelection::BBAColumnRequest(self::$colLoopReq[2]));  break;
                case self::$colSet[3]  :  print(BBAQMSelection::BBAColumnRequest(self::$colLoopReq[3]));  break;
                case self::$colSet[4]  :  print(BBAQMSelection::BBAColumnRequest(self::$colLoopReq[4]));  break;
                case self::$colSet[5]  :  print(BBAQMSelection::BBAColumnRequest(self::$colLoopReq[5]));  break;
                case self::$colSet[6]  :  print(BBAQMSelection::BBAColumnRequest(self::$colLoopReq[6]));  break;
                case self::$colSet[7]  :  print(BBAQMSelection::BBAColumnRequest(self::$colLoopReq[7]));  break;
                case self::$colSet[8]  :  print(BBAQMSelection::BBAColumnRequest(self::$colLoopReq[8]));  break;
                case self::$colSet[9]  :  print(BBAQMSelection::BBAColumnRequest(self::$colLoopReq[9]));  break;
                case self::$colSet[10] :  print(BBAQMSelection::BBAColumnRequest(self::$colLoopReq[10])); break;
                case self::$colSet[11] :  print(BBAQMSelection::BBAColumnRequest(self::$colLoopReq[11])); break;

                /**
                 * Defined: If you dont set anything and leave as empty string "" it will
                 * return default value as one 
                 *
                 * @since    1.0.0
                 * @since    09.19.2022 */
                default:       print(BBAQMSelection::BBAColumnRequest(self::$colLoopReq[0]));  break;
              
              } 
         
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
        
        </div><?php 
         
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
          do_action( 'bba_qm_add_settings_after_bottom_parent' ); 

         /**
          * Defined: HTML template closing head
          * @since    1.0.0
          * @since    09.2.2022 */ 
          require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/bbacoursematchquiz-admin-closing-html.php'; ?>
  
    <?php } 

    static public function do_BBAColumnTemplate() { ?>
            
        <?php 
            
            /**
             * Defined: If you dont set anything and leave as empty string "" it will
             * return default value as one 
             *
             * @since    1.0.0
             * @since    09.19.2022 */
            print(BBAQMSelection::BBAColumnRequest(self::$colLoopReq[0]));  
     
            ?>
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
      
       /**
        * Defined: @var init initialized by 1 @var data as an empty array
        * This take handles colimn as you added will be loop for from begin on 1 
        *
        * @since    1.0.0
        * @since    09.20.2022 */   
      for($dataRequest = $init; $dataRequest <= $colType;  $dataRequest++) 
      { $data[] = self::BBATemplateCol(self::$breakPoint[self::$defaultKey[15].$dataRequest], self::$cbConFn[self::$defaultKey[15].$dataRequest], ); } 
      
      return (implode("", $data));

    }

   /**
    * Defined: function named: Execute
    * this is simple getter will excute all setting when this function is call! 
    *
    * @since    1.0.0
    * @since    09.19.2022 */   
    static public function Execute() { BBAQMSelection::do_BBATemplate() . die();  }  

   /**
    * Defined: function named: AddColContent
    * this is simple getter will excute all setting when this function is call! 
    *
    * @since    1.0.0
    * @since    09.20.2022 */  
    static public function addColContent() { BBAQMSelection::do_BBAColumnTemplate();  }  

}
