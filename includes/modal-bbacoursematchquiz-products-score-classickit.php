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
class ProductsScore{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
     private $sID;

     private $setProdTbl;

     private $scores = [];

	/**
     * Defined: Validate setter product Id
     * @since    1.0.0
     * @since    09.23.2022 */   
     public function setProdID($sID) {

        $this->sID = $sID;
    
     }

	/**
     * Defined: Set Table Query
     * @since    1.0.0
     * @since    09.23.2022 */ 
     public function setProdTbl($setProdTbl) {

        $this->setProdTbl = $setProdTbl;
    
     }
     
	/**
     * Defined: Validate query product Id
     * @since    1.0.0
     * @since    09.23.2022 */ 
     private function productScore() {
       
        // Default wp super global @var 
        global $wpdb;

        return($wpdb->get_results("SELECT 
        ".$this->setProdTbl." AS sumCkit
        FROM wp_bba_qm_products_match 
        WHERE id_session = ".$this->sID.""));

     }

	/**
     * Defined: getProducts
     * @since    1.0.0
     * @since    09.23.2022 */ 
     public function getScore() {
        
       $prods = $this->productScore(); 
       
       foreach($prods as $producScore) { $this->scores[] = $producScore->sumCkit."%$"; }

       $getCal       = implode("", $this->scores);
       $getCalScores = explode("%$", $getCal);

       return(array_sum( $getCalScores));

     }

}





