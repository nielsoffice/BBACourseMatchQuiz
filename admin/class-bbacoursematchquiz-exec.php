<?php 

session_start();

require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-bbacoursematchquiz-frontEnd-url.php';
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-bbacoursematchquiz-self.php';

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

class BBAQMPerform  {
   
  /**
   * Defined: @var @property target_id
   *
   * @since    1.0.0
   * @since    09.28.2022 */ 
   private static $target;

  /**
   * Defined: @var @property email_id
   *
   * @since    1.0.0
   * @since    09.28.2022 */ 
   private static $email;

  /**
   * Defined: @var @property redirect_id
   *
   * @since    1.0.0
   * @since    09.28.2022 */ 
   private static $redirect;

  /**
   * Defined: @var @property origin_id
   *
   * @since    1.0.0
   * @since    09.28.2022 */ 
   private static $origin;

  /**
   * Defined: @var @property question_id
   *
   * @since    1.0.0
   * @since    09.28.2022 */ 
   private static $question;

  /**
   * Defined: @var @property selected_id
   *
   * @since    1.0.0
   * @since    09.28.2022 */ 
   private static $selected = [];

  /**
   * Defined: @var @property set_id
   *
   * @since    1.0.0
   * @since    09.28.2022 */ 
   private static $set = [];

   static public function bba_db() { 

    return new \mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
   }

  /**
   * Defined: static public setter
   * Method name: publicSetter
   *
   * @since    1.0.0
   * @since    09.28.2022 */ 
   public function publicSetter( $selection = [ ] , $email = null ) {

     /**
      * Defined: @var @property setter set_id
      *
      * @since    1.0.0
      * @since    09.28.2022 */     
      self::$set        = $selection;

     /**
      * Defined: @var @property setter set_id
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
      self::$email      = $email;

     /**
      * Defined: @var @property setter set_id
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
      self::$target = htmlspecialchars( strip_tags( trim($selection['target']?? '')));

     /**
      * Defined: @var @property setter set_id
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
      self::$origin = htmlspecialchars( strip_tags( trim($selection['origin']?? '')));

     /**
      * Defined: @var @property setter set_id
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
      self::$redirect = htmlspecialchars( strip_tags( trim($selection['redirect']?? '')));

     /**
      * Defined: @var @property setter set_id
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
      self::$question = htmlspecialchars( strip_tags( trim($selection['question']?? '')));

     /**
      * Defined: @var @property setter set_id
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
      self::$selected['prod1'] = $selection['selection'][0]?? 0;

     /**
      * Defined: @var @property setter set_id
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
      self::$selected['prod2'] = $selection['selection'][1]?? 0;

     /**
      * Defined: @var @property setter set_id
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
      self::$selected['prod3'] = $selection['selection'][2]?? 0;

     /**
      * Defined: @var @property setter set_id
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
      self::$selected['prod4'] = $selection['selection'][3]?? 0;

   } 
  
    /**
    * Defined: @var @property setter set_id
    *
    * @since    1.0.0
    * @since    09.28.2022 */  
   public static function bba_activation_qm() {
      
     /**
      * Defined: replace # remove from ID
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
     $getTargetID = str_replace("#","", self::$target );

     /**
      * Defined: request_db
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
     $bba_connect = self::bba_db();

     /**
      * Defined: 
      * Do if the getTartget id was getting post 
      * This section will be the processing here you will see the core of quiz match
      * In this section you will finoud how every data will get inserted into dababases
      * it contains condition a v7 to 8 validation 
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
    if (isset($_POST[$getTargetID])) :
  
      /**
        * Defined: Here is the query where data will get inserted into database
        *
        * @since    1.0.0
        * @since    09.28.2022 */  
         $sql = "INSERT INTO `wp_bba_qm_session` (`id`, `Date_created`) 
                 VALUES (NULL, current_timestamp());";
                              
      /**
        * Defined: as you can see if this getting true? THEN it will insert the data base on the query string
        * and after that it will store and save to database table that plugin automatic generate for us!
        *
        * @since    1.0.0
        * @since    09.28.2022 */  
        if($bba_connect->query($sql) === true) {

      /**
        * Defined: here in this section we are going to active the SESSION variable for product and email table
        * In this section the BBA_QM_ID session name assigned for it, it the single session variable works for us
        * to inserted relasional data to database 
        *
        * @since    1.0.0
        * @since    09.28.2022 */  
         $sql = "SELECT id
                 FROM   wp_bba_qm_session 
                 WHERE id='" . $bba_connect->insert_id . "' 
                 LIMIT 1";
          
         $result = $bba_connect->query($sql);
         $row    = $result->fetch_array(MYSQLI_ASSOC);

         // here session set up begin !
         $_SESSION["BBA_QM_ID"] = $row['id']; 

    } else {
      print("ERROR: Could not able to execute $sql. " . $bba_connect->error);
    }

     /**
      * Defined: redirect to "redirect" => 'value'? session array from BBATemplate class
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
    BBAQMSelf::BBAQMRedirect( self::$redirect );

    endif;

     /**
      * Defined: inserting form that also appear in fromt end !
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
    $html  = '';
    $html .= '<form action="" method="POST">';
    $html .= '<input type="submit" id="';
    $html .=  self::$target; // dynamic_id
    $html .= '" ';
    $html .= 'class="';
    $html .=  self::$target; // dynamic_class
    $html .= '" '; 
    $html .= 'name="';
    $html .=  $getTargetID; // dynamic_name
    $html .= '" ';
    $html .= 'value="';
    $html .=  self::$question; // dynamic_value
    $html .= '" ';
    $html .= ' />';
    $html .= '</form>';
    
     /**
      * Defined: and Ifever the selection is []  means there is no set to the file you created for instance in qm-default
      * form inserted will be return empy! and you can create a custom code you the content HTML
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
    if(empty( self::$set ) || !isset( self::$set) || count( self::$set ) == 0) : return;

     /**
      * Defined: Otherwise return the form from section array selection BBATemplate() class
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
    else : return($html); endif;

   }

     /**
      * Defined: do_insert() method is for relational product data database do isnert will perform after triggering the begin 
      * functionality or activation bba_activation_qm() when the activation activated means the session is true this method 
      * will alternatively perform !
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
   public static function do_insert() {

     /**
      * Defined: databae_connection !
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
    $bba_connect    = self::bba_db();

     /**
      * Defined: sanitized session to be empty
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
    $sessionRequest = $_SESSION["BBA_QM_ID"]?? '';

     /**
      * Defined: replace # from id into empty as normal test ex. "bba_id"
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
    $getTargetID    = str_replace("#","", self::$target );

     /**
      * Defined: qualifier or make id as unique for this instance
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
     // checkbox 
    $_checkBoxQMBBAID = 'qmCheck'.$getTargetID.'';
     // email
    $_emailQMBBAID    = 'qmemail'.$getTargetID.'';
     // email_btn
    $_subBtnQMBBAID   = 'qmebtn'.$getTargetID.'';

     /**
      * Defined: If there is no session activation and form hit submit return to origin that set to you section array
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
   if( empty($sessionRequest) || is_null($sessionRequest) ) { BBAQMSelf::BBAQMRedirect( self::$origin );} 
     
     /**
      * Defined: check if the email is true!
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
   if( self::$email == true ) {

     /**
      * Defined: post the email templates!
      *
      * @since    1.0.0
      * @since    09.28.2022 */   
    if (isset($_POST[$_subBtnQMBBAID ])) {

      /**
      * Defined: sanitized and validate email!
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
      $qm_email_    = htmlspecialchars( strip_tags( trim($_POST[$_emailQMBBAID]?? '')));

     /**
      * Defined: check if the checkbox is true ? then return one or else return zero
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
      if(isset($_POST[$_checkBoxQMBBAID])){ $qm_e_list = 1;
      } else { $qm_e_list   = 0; }

     /**
      * Defined: Insert query 
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
      $sql = "INSERT INTO `wp_bba_qm_elist` 
      ( `id`
       ,`id_session`
       ,`qm_emal`
       ,`qm_e_list`)
         VALUES (NULL
        ,$sessionRequest 
        ,'".$qm_email_."'
        ,".$qm_e_list.");";

     /**
      * Defined: after all session do those thing s processing DESTROYED session return to begin!
      * request to activate the session from begin page !
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
     if($bba_connect->query($sql) === true) { BBAQMSelf::BBAQMRedirect( self::$redirect ); } 

      /**
       * Defined: check if database connection getting false then return error  message! 
       *
       * @since    1.0.0
       * @since    09.28.2022 */  
      else { print("ERROR: Could not able to execute $sql. " . $bba_connect->error); }

    }

     /**
      * Defined: form for email templates !
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
    $html  = '';
    $html .= '<form action="" method="POST">';
    $html .= '<input type="text" id="';
    $html .=  'email_input';
    $html .= '" ';
    $html .= 'placeholder="';
    $html .=  'Enter your email';
    $html .= '" '; 
    $html .= 'class="';
    $html .=  self::$target; // dynamic_id
    $html .= '" '; 
    $html .= 'name="';
    $html .=  $_emailQMBBAID; // dynamic_name
    $html .= '" ';
    $html .= ' />';
    $html .= '<label ';
    $html .= 'class="';
    $html .=  self::$target; // dyanmic_class
    $html .= '" ';
    $html .= 'for="flexCheckDefault"';
    $html .= '/>';
    $html .= '<input type="checkbox" id="flexCheckDefault"';
    $html .= 'class="';
    $html .=  self::$target; // dynamic_class
    $html .= '" ';
    $html .= 'value="" ';
    $html .= 'name="'; 
    $html .= $_checkBoxQMBBAID; // dynamic_name
    $html .= '" ';
    $html .= '/>';
    $html .= self::$question; // dynamic label
    $html .= '</label>';
    $html .= '<input type="submit" id="';
    $html .=  self::$target; // dyanmic_id
    $html .= '" ';
    $html .= 'class="';
    $html .=  self::$target; // dynamic_class
    $html .= '" '; 
    $html .= 'name="';
    $html .=  $_subBtnQMBBAID; // dynamic_id
    $html .= '" ';
    $html .= 'value="';
    $html .=  'Submit';
    $html .= '" ';
    $html .= ' />';
    $html .= '</form>';

     /**
      * Defined: if the sesction array is empty then return false
      * else process email sent!
      * @since    1.0.0
      * @since    09.28.2022 */ 
    if(empty( self::$set ) || !isset( self::$set) || count( self::$set ) == 0) : return;
     else : return($html); endif;

   } else {
  
     /**
      * Defined: post for product tables
      *
      * @since    1.0.0
      * @since    09.28.2022 */ 
    if (isset($_POST[$getTargetID])) {

         $sql = "INSERT INTO `wp_bba_qm_products` 
         ( `id`
          ,`id_session`
          ,`qm_selection_Guide`
          ,`qm_classic_kit`
          ,`qm_ultimate_Bundle`
          ,`qm_classic`
          ,`qm_volume`)
            VALUES (NULL
           ,$sessionRequest 
           ,'".self::$question."'
           ,".self::$selected['prod1']."
           ,".self::$selected['prod2']."
           ,".self::$selected['prod3']."
           ,".self::$selected['prod4']." 
                
         );";
   
     /**
      * Defined: after all session do those thing s processing DESTROYED session return to begin!
      * request to activate the session from begin page !
      *
      * @since    1.0.0
      * @since    09.28.2022 */  
        if($bba_connect->query($sql) === true) { BBAQMSelf::BBAQMRedirect( self::$redirect ); } 
         else { print("ERROR: Could not able to execute $sql. " . $bba_connect->error); }
     
   }

      $html  = '';
      $html .= '<form action="" method="POST">';
      $html .= '<input type="submit" id="';
      $html .=  self::$target; // dynamcie_id
      $html .= '" ';
      $html .= 'class="';
      $html .=  self::$target; // dynamcie_class
      $html .= '" '; 
      $html .= 'name="';
      $html .=  $getTargetID; // dynamcie_name
      $html .= '" ';
      $html .= 'value="';
      $html .=  self::$question; // dynamcie_value
      $html .= '" ';
      $html .= ' />';
      $html .= '</form>';

     /**
      * Defined: if the sesction array is empty then return false
      *
      * @since    1.0.0
      * @since    09.28.2022 */ 
     if(empty( self::$set ) || !isset( self::$set) || count( self::$set ) == 0) : return;
      else : return($html); endif;

   }
 }

}


