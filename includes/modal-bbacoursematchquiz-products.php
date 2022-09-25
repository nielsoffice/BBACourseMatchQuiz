<?php

/**
 * Fired during plugin activation
 *
 * @link       https://nielsoffice197227997.wordpress.com/
 * @since      1.0.0
 *
 * @package    Bbacoursematchquiz
 * @subpackage Bbacoursematchquiz/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Bbacoursematchquiz
 * @subpackage Bbacoursematchquiz/includes
 * @author     nielfernandez <renniel.fernandez@outgive.ca>
 */
class ProductsList {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
     private $sID;

     private $pTitle;

     private $setWhere;
     
     private $setsessionID;

     private $scores = [];

	/**
     * Defined: Validate setter product Id
     * @since    1.0.0
     * @since    09.23.2022 */   
     public function setProperty_id($sID) {

        $this->sID = $sID;
    
     }
     public function setTitle($pTitle) {

          $this->pTitle = $pTitle;
      
     }
     public function setTbl($setTbl) {

          $this->setTbl = $setTbl;
      
     }
     public function setWhere($setWhere) {

          $this->setWhere = $setWhere;
      
     }
     public function setsessionID($setsessionID) {

          $this->setsessionID = $setsessionID;
      
       }

	/**
     * Defined: Validate query product Id
     * @since    1.0.0
     * @since    09.23.2022 */ 
     private function productList() {
       
        // Default wp super global @var 
        global $wpdb;

        return($wpdb->get_results("SELECT *
        FROM wp_bba_qm_products
        WHERE id_session = ". $this->sID ."
        ORDER BY id_session 
        DESC"));

     }

	/**
     * Defined: getProducts
     * @since    1.0.0
     * @since    09.23.2022 */ 
     public function getProducts() {
        
       $prods = $this->productList(); 
       
       foreach($prods as $producScore) { $this->scores[] = $producScore; }

       return ($this->scores);

     }

}
