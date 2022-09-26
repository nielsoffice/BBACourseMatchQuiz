<?php 

require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/modal-bbacoursematchquiz-products.php';
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/modal-bbacoursematchquiz-products-score-classickit.php';

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

class BBACourseMatchMenuRendered {

    public function __construct()
    { 
    

        /**
         * Defined: current_screen_only;
         * @since    1.0.0
         * @since    09.25.2022 */
        $my_current_screen = get_current_screen();

        if($my_current_screen->parent_base === 'bba-quiz-match-result' ) : 
            
            // Id does then require assets !
            require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-bbacoursematchquiz-admin-bbaqm-scripts.php';
            require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-bbacoursematchquiz-admin-bbaqm-style.php';

        endif;

        /**
         * Defined: execute admin content;
         * @since    1.0.0
         * @since    09.25.2022 */
         print('<style> #loader{position:absolute;left:50%;top:50%;z-index:1;width:120px;height:120px;margin:-76px 0 0 -76px;border:16px solid #f3f3f3;border-radius:50%;border-top:16px solid #fcbd9c!important;-webkit-animation:2s linear infinite spin;animation:2s linear infinite spin;background-color:#fd955d!important}@-webkit-keyframes spin{0%{-webkit-transform:rotate(0)}100%{-webkit-transform:rotate(360deg)}}@keyframes spin{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}.animate-bottom{position:relative;-webkit-animation-name:animatebottom;-webkit-animation-duration:1s;animation-name:animatebottom;animation-duration:1s}@-webkit-keyframes animatebottom{from{bottom:-100px;opacity:0}to{bottom:0;opacity:1}}@keyframes animatebottom{from{bottom:-100px;opacity:0}to{bottom:0;opacity:1}}.bbafluid{display:none;text-align:center} </style>');
         print('<body onload="preLoader()" style="margin-top;"><div id="preLoader"><div id="loader"></div></div>');
         print(BBACourseMatchMenuRendered::BBA_QM_REDERED());
         print('<script> var preLoader; function preLoader() { preLoader = setTimeout(unHide, 2000); } function unHide() { document.getElementById("loader").style.display = "none"; document.getElementById("qm_preloader").style.display  = "block";} </script>');
        
    }

    /**
     * Defined: BBACourseRecommendation;
     * @since    1.0.0
     * @since    09.25.2022 */
    private static function BBACourseRecommendation($qm_sID, $string = false ) {
        
        /**
         * Defined: get Classaic Kit score;
         * @since    1.0.0
         * @since    09.25.2022 */
        $qm_classic_kit = new ProductsScore();
        $qm_classic_kit->setProdID($qm_sID);
        $qm_classic_kit->setProdTbl('qm_classic_kit');
        $qm_classic_kit = $qm_classic_kit->getScore();
    
        /**
         * Defined: get Ultimate Bundle score;
         * @since    1.0.0
         * @since    09.25.2022 */
        $qm_ultimate_Bundle = new ProductsScore();
        $qm_ultimate_Bundle->setProdID($qm_sID);
        $qm_ultimate_Bundle->setProdTbl('qm_ultimate_Bundle');
        $qm_ultimate_Bundle = $qm_ultimate_Bundle->getScore();

        /**
         * Defined: get CLassic score;
         * @since    1.0.0
         * @since    09.25.2022 */
        $qm_classic = new ProductsScore();
        $qm_classic->setProdID($qm_sID);
        $qm_classic->setProdTbl('qm_classic');
        $qm_classic = $qm_classic->getScore();

        /**
         * Defined: get Volume score;
         * @since    1.0.0
         * @since    09.25.2022 */
        $qm_volume = new ProductsScore();
        $qm_volume->setProdID($qm_sID);
        $qm_volume->setProdTbl('qm_volume');
        $qm_volume = $qm_volume->getScore();
           
        /**
         * Defined: Do some check each scores return highest and print images appropriate!;
         * @since    1.0.0
         * @since    09.25.2022 */
    if( ( $qm_classic_kit > $qm_ultimate_Bundle) && 
        ( $qm_classic_kit > $qm_classic)         && 
        ( $qm_classic_kit > $qm_volume ))  
        {  if($string == true ) { print('Course Classic Kit'); } 
            else { print('<img style="width: 100%;" src="'.plugins_url("/img/CourseClassicKit.jpeg",__FILE__ ) .'" />'); }} 
        
        # check which scores are lower and return the highest number
    if( ( $qm_ultimate_Bundle > $qm_classic_kit) && 
        ( $qm_ultimate_Bundle > $qm_classic)     && 
        ( $qm_ultimate_Bundle > $qm_volume))  
        {  if($string == true ) { print('Course Bundle'); } 
             else { print('<img style="width: 100%;" src="'.plugins_url("/img/CourseBundle.png",__FILE__ ) .'" />'); }}
    
        # check which scores are lower and return the highest number
    if( ( $qm_classic > $qm_classic_kit)     && 
        ( $qm_classic > $qm_ultimate_Bundle) && 
        ( $qm_classic > $qm_volume))  
        {  if($string == true ) { print('Course Classic'); } 
            else { print('<img style="width: 100%;" src="'.plugins_url("/img/CourseClassic.jpeg",__FILE__ ) .'" />');}}
    
        # check which scores are lower and return the highest number
    if( ( $qm_volume > $qm_classic_kit)     && 
        ( $qm_volume > $qm_ultimate_Bundle) && 
        ( $qm_volume > $qm_classic ))  
        {  if($string == true ) {  print('Course Volume'); } 
            else { print('<img style="width: 100%;" src="'.plugins_url("/img/CourseVolume.png",__FILE__ ) .'" />'); }}

     }

    /**
     * Defined: Get ProductQueery
     * @since    1.0.0
     * @since    09.25.2022 */    
    private static function QMProductQuery($order_by = 'DESC') {

        global $wpdb;
    
       /**
         * Defined: Get ALL PRODUCTS ROW QUERY
         * @since    1.0.0
         * @since    09.25.2022 */   
        return($wpdb->get_results("SELECT 
        wp_bba_qm_session.id            AS sID, 
        wp_bba_qm_session.Date_created  AS sDC, 
        wp_bba_qm_elist.qm_emal         AS eM, 
        wp_bba_qm_elist.qm_e_list       AS eL
    
        FROM       wp_bba_qm_session
        RIGHT JOIN wp_bba_qm_elist
        ON         wp_bba_qm_session.id = wp_bba_qm_elist.id_session
    
        ORDER BY wp_bba_qm_session.id ".$order_by));
    
       }

    private static function QMProductExportFilterSearchQuery($order_by = 'DESC', $begin_from = '2022-01-01', $end_to = '6090') {

        global $wpdb;
             
        return($wpdb->get_results('SELECT 
        wp_bba_qm_session.id            AS sID, 
        wp_bba_qm_session.Date_created  AS sDC, 
        wp_bba_qm_elist.qm_emal         AS eM, 
        wp_bba_qm_elist.qm_e_list       AS eL
    
        FROM       wp_bba_qm_session
        RIGHT JOIN wp_bba_qm_elist
        ON         wp_bba_qm_session.id = wp_bba_qm_elist.id_session
        WHERE      date(`Date_created`) BETWEEN "' .$begin_from. '" AND "' .$end_to. '"
    
        ORDER BY wp_bba_qm_session.id '.$order_by)) ;

    } 

    /**
     * Defined: Delete Specific row !
     * @since    1.0.0
     * @since    09.25.2022 */     
    private static function QMEntireRowDelete($sID) {

        global $wpdb;

        /**
         * Defined: Get the current page and return to the screen admin !
         * @since    1.0.0
         * @since    09.25.2022 */     
        $current_page    = admin_url( "admin.php?page=".$_GET["page"] );
        $current_page_re = admin_url( "admin.php?page=bba-quiz-match-result");

        # Check if Delete request is true if so then !
        if( isset($_REQUEST['delete']) == true ) :

            # Del check if it is set! then return empty if not !
            $qm_del = $_REQUEST['delete'];
            
            $sql = 'DELETE
                    FROM wp_bba_qm_products 
                    WHERE id_session = '.$qm_del;

            $wpdb->query($sql);

            /**
             * Defined: Delete as well as DB relationship data !
             * @since    1.0.0
             * @since    09.25.2022 */   
            $qm_rows = 'DELETE 
                 wp_bba_qm_session, wp_bba_qm_elist
            FROM wp_bba_qm_session
            RIGHT JOIN wp_bba_qm_elist 
            ON         wp_bba_qm_session.id = wp_bba_qm_elist.id_session
            WHERE      wp_bba_qm_elist.id_session = '. $qm_del;
             
            # If everything set as  true then wipeout!
            $wpdb->query($qm_rows);                       

            BBAQMSelf::BBAQMAdminRedirect($current_page_re);
   
            endif;  

            /**
             * Defined: Get HTML btn del link
             * @since    1.0.0
             * @since    09.25.2022 */ 
            $html = '';
            $html .= '<a href="'.$current_page.'&delete='.$sID.'">'; 
            $html .= '<i class="fa fa-close" style="font-size:36px;color:red"></i>';
            $html .= '</a>';

            return($html);
  
   }

    /**
     * Defined: Delete Prodict list QA response!
     * @since    1.0.0
     * @since    09.25.2022 */     
   private static function QMProductListDel($sID) { 

        global $wpdb;  

        /**
         * Defined: Get the current page and return to the screen admin !
         * @since    1.0.0
         * @since    09.25.2022 */   
        $current_page    = admin_url( "admin.php?page=".$_GET["page"] );
        $current_page_re = admin_url( "admin.php?page=bba-quiz-match-result");

        # Check if Delete request is true if so then !
        if( isset($_REQUEST['qm-del']) == true ) :

            # Del check if it is set! then return empty if not !
            $QMProductListDel = $_REQUEST['qm-del'];
            
            $sql = 'DELETE 
                    FROM wp_bba_qm_products 
                    WHERE id = '.$QMProductListDel;

            # If everything set as  true then wipeout!
            $wpdb->query($sql);             

            BBAQMSelf::BBAQMAdminRedirect($current_page_re);

        endif; 

        /**
         * Defined: Get HTML btn del link
         * @since    1.0.0
         * @since    09.25.2022 */ 
        $html = '';
        $html .= '<a href="'.$current_page.'&qm-del='.$sID.'">'; 
        $html .= '<i class="fa fa-trash" style="font-size:20px;color:red"></i>';
        $html .= '</a>';

        return($html);     

   }

   public function BBA_QM_REDERED() { ?>

    <div class="fluid-container">
    <div id="bba_qm_con" style="width: 99%;" > 
    <div id="qm_preloader" style="display: none;">
    <?php

    /**
     * Defined: get Classaic Kit score;
     * @since    1.0.0
     * @since    09.25.2022 */
     print(BBAQMSelf::BBABranding()); ?> 

    <div class="row">
        <!-- BEGIN OF Date search filter -->
     <div id="dateFilter" class="col-lg-12">
        <div class="container-fluid">
            <div class="row">

            <!-- BEGIN form search -->
            <div id="bba_to" class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6"> 
            <form action="" method="POST">
			  <div class='input-group date' id='startDate'>
			   <span class="input-group-addon input-group-text">
                <span class="fa fa-calendar"></span>
               </span>
               <input type='text' 
                      class="form-control" 
                      name="startDate" 
                      placeholder="Filter Date From : " 
                />
			  </div>
		     </div>
             
             <div id="bba_from" class="col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
             <div class='input-group date' id='endDate'>
			   <span class="input-group-addon input-group-text">
                 <span class="fa fa-calendar"></span>
                </span>
               <input type='text' 
                      class="form-control" 
                      name="endDate" 
                      placeholder="Filter Date To : " 
                />
			  </div>
            </div>
            
            <div id="qm_search" class="col-sm-12 col-md-1 col-lg-1 col-xl-1 col-xxl-1">
              <input id="id_btn_search" 
                   name="id_btn_search" 
                   type="submit" 
                  class="btn btn-primary"
                  value="search">
            </div>

            </form>
            <!-- END form search -->

             </div>
           </div>
        </div>
        <!-- END OF Date search filter -->  
    <table id="example" class="table table-striped table2excel table-image display" style="width:100%">
        <thead>
            <tr>
                <th scope="row">ID</th>
                <th scope="row" style="width: 15%;">Date</th>
                <th scope="row">Email</th>
                <th scope="row" style="width: 10%;">e-List</th>
                <th scope="row">Match Course</th>
                <th scope="row" id="bba_qm_ignore">Quiz</th>
                <th scope="row" id="bba_qm_ignore">Delete</th>
            </tr>
        </thead>
        <tbody id="qm_reload">
           <!-- BEGIN Execute search filter -->
           <?php 
             
             global $wpdb;  

            if (isset($_POST['id_btn_search'])) {
             # BEGIN IF RESULT IF FILTER SEARCH IS TRUE !                
             
             $startDate__ = date( 'Y-m-d', strtotime( $_POST['startDate']?? '' ) );
             $endDate__   = date( 'Y-m-d', strtotime( $_POST['endDate']?? '' ) );

             # BEGIN QUERY FROM FILTER SEARCH
             $datas = self::QMProductExportFilterSearchQuery('DESC', $startDate__, $endDate__);

             foreach ($datas as $bbq_qm ) { ?>

                <tr> 
                 <td scope="row"><?php echo $bbq_qm->sID; ?> </td>
                 <td scope="row" style="width: 20%;"><?php echo date("F j, Y", strtotime($bbq_qm->sDC)); ?> </td>
                 <td scope="row"><?php echo $bbq_qm->eM; ?></td>
                 <td scope="row" <?php echo ($bbq_qm->eL ==  0 ) ? 'class="excludes__"' : ''; ?>><?php echo ($bbq_qm->eL == 1 ) ? 'Yes' : 'No'; ?></td> 
                 <td class="w-25"><?php echo(self::BBACourseRecommendation($bbq_qm->sID));?> </td>
   
                <td scope="row" style="width: 50%;">
                <table class="table table-bordered table-image">
                  <thead>
                        <tr>
                            <th scope="row">Selection</th>
                            <th>Classic + Kits</th>
                            <th>Bundle</th>
                            <th>Classic</th>
                            <th>Volume</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- QM Selection result begin -->
                        <?php 
                 
                        $selections = new ProductsList();
                        $selections->setProperty_id($bbq_qm->sID);
                        $selections = $selections->getProducts();
   
                        foreach ($selections as $prodList ) { ?>  
                        <tr>
                            <td scope="row"><?php print( $prodList->qm_selection_Guide);?></td>
                            <td><?php print( $prodList->qm_classic_kit); ?></td>
                            <td><?php print( $prodList->qm_ultimate_Bundle); ?></td>
                            <td><?php print( $prodList->qm_classic); ?></td>
                            <td><?php print( $prodList->qm_volume); ?></td>
                            <td style="text-align: center;"><?php print(self::QMProductListDel($prodList->id)); ?></td>
                        </tr>
   
                <?php } ?>
                <!-- QM Selection result end -->
   
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>Result</th>
                            <th><?php 
                            $selections = new ProductsScore();
                            $selections->setProdID($bbq_qm->sID);
                            $selections->setProdTbl('qm_classic_kit');
                            $selections = $selections->getScore();
                            print( $selections ); ?>
                            </th>
                            <th><?php 
                            $selections = new ProductsScore();
                            $selections->setProdID($bbq_qm->sID);
                            $selections->setProdTbl('qm_ultimate_Bundle');
                            $selections = $selections->getScore();
                            print( $selections ); ?>
                            </th>
                            <th><?php 
                            $selections = new ProductsScore();
                            $selections->setProdID($bbq_qm->sID);
                            $selections->setProdTbl('qm_classic');
                            $selections = $selections->getScore();
                            print( $selections ); ?>
                            </th>
                            <th><?php 
                            $selections = new ProductsScore();
                            $selections->setProdID($bbq_qm->sID);
                            $selections->setProdTbl('qm_volume');
                            $selections = $selections->getScore();
                            print( $selections ); ?>
                            </th>
                            <th>Delete</th>
                        </tr>
                    </tfoot> 
                  </table>
                </td>
                <td style="text-align: center;">
                  <?php print(self::QMEntireRowDelete($bbq_qm->sID)); ?>
                </td>
            </tr>
   
          <?php } ?>
            
        </tbody>                  
        <!-- session QM Response end -->
        <tfoot>
            <tr>
                <th scope="row">ID</th>
                <th scope="row" style="width: 15%;">Date</th>
                <th scope="row">Email</th>
                <th scope="row" style="width: 10%;">e-List</th>
                <th scope="row">Match Course</th>
                <th scope="row">Quiz</th>
                <th scope="row">Delete</th>
            </tr>
        </tfoot> 
             
           <?php 

             # END QUERY FROM FILTER SEARCH
             # END IF RESULT IF FILTER SEARCH IS TRUE !

           } else {

             # BEGIN ELSE WHEN USER IS NOT SEARCHING YET
             $sessions = self::QMProductQuery(); foreach ($sessions as $bbq_qm ) { ?>

             <tr> 
              <td scope="row"><?php echo $bbq_qm->sID; ?> </td>
              <td scope="row" style="width: 20%;">
                <?php echo date("F j, Y", strtotime($bbq_qm->sDC)); ?>
              </td>
              <td scope="row"><?php echo $bbq_qm->eM; ?>
               </td>
                <td scope="row" <?php echo ($bbq_qm->eL == 0 ) ? 'class="excludes__"' : ''; ?>>
                <?php echo ($bbq_qm->eL == 1 ) ? 'Yes' : 'No'; ?>
               </td> 
              <td class="w-25"><?php echo(self::BBACourseRecommendation($bbq_qm->sID));?> </td>

             <td scope="row" style="width: 50%;">
             <table class="table table-bordered table-image">
               <thead>
                     <tr>
                         <th scope="row">Selection</th>
                         <th>Classic + Kits</th>
                         <th>Bundle</th>
                         <th>Classic</th>
                         <th>Volume</th>
                         <th>Delete</th>
                     </tr>
                 </thead>
                 <tbody>
                     <!-- QM Selection result begin -->
                     <?php 
              
                     $selections = new ProductsList();
                     $selections->setProperty_id($bbq_qm->sID);
                     $selections = $selections->getProducts();

                     foreach ($selections as $prodList ) { ?>  
                     <tr>
                         <td scope="row"><?php print( $prodList->qm_selection_Guide);?></td>
                         <td><?php print( $prodList->qm_classic_kit); ?></td>
                         <td><?php print( $prodList->qm_ultimate_Bundle); ?></td>
                         <td><?php print( $prodList->qm_classic); ?></td>
                         <td><?php print( $prodList->qm_volume); ?></td>
                         <td style="text-align: center;"><?php print(self::QMProductListDel($prodList->id)); ?></td>
                 </tr>

             <?php } ?>
             <!-- QM Selection result end -->

                 </tbody>
                 <tfoot>
                     <tr>
                     <th>Result</th>
                         <th><?php 

                         $selections = new ProductsScore();
                         $selections->setProdID($bbq_qm->sID);
                         $selections->setProdTbl('qm_classic_kit');
                         $selections = $selections->getScore();
                         print( $selections ); ?>

                         </th>
                         <th><?php 
                         $selections = new ProductsScore();
                         $selections->setProdID($bbq_qm->sID);
                         $selections->setProdTbl('qm_ultimate_Bundle');
                         $selections = $selections->getScore();
                         print( $selections ); ?>

                         </th>
                         <th><?php 
                         $selections = new ProductsScore();
                         $selections->setProdID($bbq_qm->sID);
                         $selections->setProdTbl('qm_classic');
                         $selections = $selections->getScore();
                         print( $selections ); ?>
                         </th>

                         <th><?php 
                         $selections = new ProductsScore();
                         $selections->setProdID($bbq_qm->sID);
                         $selections->setProdTbl('qm_volume');
                         $selections = $selections->getScore();
                         print( $selections ); ?>
                         </th>

                         <th>Delete</th>

                     </tr>
                 </tfoot> 
               </table>
             </td>
             <td style="text-align: center;"><?php print(self::QMEntireRowDelete($bbq_qm->sID)); ?></td>
         </tr>

       <?php } ?>
         
     </tbody>                  
     <!-- session QM Response end -->
     <tfoot>
         <tr>
             <th scope="row">ID</th>
             <th scope="row" style="width: 15%;">Date</th>
             <th scope="row">Email</th>
             <th scope="row" style="width: 10%;">e-List</th>
             <th scope="row">Match Course</th>
             <th scope="row">Quiz</th>
             <th scope="row">Delete</th>
         </tr>
     </tfoot> 
             
        <?php  # END ELSE WHEN USER IS NOT SEARCHING YET
          } ?>
           <!-- END Execute search filter -->
           <!-- session QM Response Begin -->
          
    </table>

    <!-- BEGIN EXPORT -->
    <table id="exampleExport" class="table display" style="width:100%; display: none;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Email</th>
                <th scope="row" style="width: 10%;">e-List</th>
                <th scope="row">Match Course</th>
            </tr>
        </thead>
        <tbody id="qm_reload">
           <!-- BEGIN Execute search filter -->
           <?php 
             
             global $wpdb;  

            if (isset($_POST['id_btn_search'])) {
             # BEGIN IF RESULT IF FILTER SEARCH IS TRUE !                
             
             $startDate__ = date( 'Y-m-d', strtotime( $_POST['startDate']?? '' ) );
             $endDate__   = date( 'Y-m-d', strtotime( $_POST['endDate']?? '' ) );
             
             # BEGIN QUERY FROM FILTER SEARCH
             $datas = self::QMProductExportFilterSearchQuery('ASC', $startDate__, $endDate__);

             foreach ($datas as $bbq_qm ) { ?>

                <tr> 
                 <td scope="row"><?php echo $bbq_qm->sID; ?> </td>
                 <td scope="row" style="width: 20%;"><?php echo date("F j, Y", strtotime($bbq_qm->sDC)); ?> </td>
                 <td scope="row"><?php echo $bbq_qm->eM; ?></td>
                 <td scope="row" <?php echo ($bbq_qm->eL == 0 ) ? 'class="excludes__"' : ''; ?>><?php echo ($bbq_qm->eL == 1 ) ? 'Yes' : 'No'; ?></td> 
                 <td class="w-25"><?php echo(self::BBACourseRecommendation($bbq_qm->sID, true));?> </td>
                </tr>
   
          <?php } ?>
            
        </tbody>                  
        <!-- session QM Response end -->
        <tfoot>
            <tr>
                <th scope="row">ID</th>
                <th scope="row" style="width: 15%;">Date</th>
                <th scope="row">Email</th>
                <th scope="row" style="width: 10%;">e-List</th>
                <th scope="row">Match Course</th>
            </tr>
        </tfoot> 
             
           <?php 

             # END QUERY FROM FILTER SEARCH
             # END IF RESULT IF FILTER SEARCH IS TRUE !

           } else {

             # BEGIN ELSE WHEN USER IS NOT SEARCHING YET
             $sessions = self::QMProductQuery('ASC'); foreach ($sessions as $bbq_qm ) { ?>

             <tr> 
              <td scope="row"><?php echo $bbq_qm->sID; ?> </td>
              <td scope="row" style="width: 20%;"><?php echo date("F j, Y", strtotime($bbq_qm->sDC)); ?> </td>
              <td scope="row"><?php echo $bbq_qm->eM; ?></td>
              <td scope="row" <?php echo ($bbq_qm->eL == 0 ) ? 'class="excludes__"' : ''; ?>><?php echo ($bbq_qm->eL == 1 ) ? 'Yes' : 'No'; ?></td> 
              <td class="w-25"><?php echo(self::BBACourseRecommendation($bbq_qm->sID , true ));?> </td>
         </tr>

       <?php } ?>
         
     </tbody>                  
     <!-- session QM Response end -->
     <tfoot>
         <tr>
             <th scope="row">ID</th>
             <th scope="row" style="width: 15%;">Date</th>
             <th scope="row">Email</th>
             <th scope="row" style="width: 10%;">e-List</th>
             <th scope="row">Match Course</th>
         </tr>
     </tfoot> 
             
        <?php  # END ELSE WHEN USER IS NOT SEARCHING YET
          } ?>
    </table>
    
    <button id="btnExport" class="exportToExcel btn btn-warning">Export to XLS</button>
    <!-- END EXPORT -->
    </div>
    </div>
    </div>
    </div>
    <?php }
  
}
    