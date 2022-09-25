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
        print(BBACourseMatchMenuRendered::BBA_QM_REDERED());

    }

   public function BBA_QM_REDERED() { ?>

    <div class="fluid-container">
    <div id="bba_qm_con" style="width: 99%;"> 
    <?php 
    
    /**
     * Defined: get Classaic Kit score;
     * @since    1.0.0
     * @since    09.25.2022 */
     print(BBAQMSelf::BBABranding()); ?> 

    <div class="row">
     <div id="dateFilter" class="col-lg-12">
        <div class="container-fluid">
            <div class="row">
            <!-- BEGIN form search -->
            <div id="bba_to" class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6"> 
			  <div class='input-group date' id='startDate'>
			   <span class="input-group-addon input-group-text"><span class="fa fa-calendar"></span></span>
               <input type='text' class="form-control" name="startDate" placeholder="Filter Date From : " />
			  </div>
		     </div>
             <div id="bba_from" class="col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
             <div class='input-group date' id='endDate'>
			   <span class="input-group-addon input-group-text"><span class="fa fa-calendar"></span></span>
               <input type='text' class="form-control" name="endDate" placeholder="Filter Date To : " />
			  </div>
            </div>
            
            <div id="qm_search" class="col-sm-12 col-md-1 col-lg-1 col-xl-1 col-xxl-1"><button id="id_btn_search" type="button" class="btn btn-primary">search</button></div>
            
            <!-- END form search -->

             </div>
           </div>
        </div>
     </div>   
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
        <tbody  id="qm_reload">
            <!-- session QM Response Begin -->
            <?php 

                $sessions = self::QMProductQuery(); foreach ($sessions as $bbq_qm ) { ?>

                <tr> 
                 <td scope="row"><?php echo $bbq_qm->sID; ?> </td>
                 <td scope="row" style="width: 20%;"><?php echo date("F j, Y", strtotime($bbq_qm->sDC)); ?> </td>
                 <td scope="row"><?php echo $bbq_qm->eM; ?></td>
                 <td scope="row"><?php echo ($bbq_qm->eL == 1 ) ? 'Yes' : 'No'; ?></td> 
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
    </table>

    <!-- BEGIN EXPORT -->
    <table id="exampleExport" class="table display" style="width:100%; display: none;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <!-- session QM Response Begin -->
            <tr>
                <td scope="row"> 1 </td>
                <td scope="row">August 2022</td>
                <td scope="row">test1@mail.com</td>
            </tr>
        </tbody>                  
        <!-- session QM Response end -->
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Email</th>
            </tr>
        </tfoot> 
    </table>
    <button id="btnExport" class="exportToExcel btn btn-warning">Export to XLS</button>
    <!-- END EXPORT -->
    </div>
    </div>
    </div>
    <?php }
  
    /**
     * Defined: BBACourseRecommendation;
     * @since    1.0.0
     * @since    09.25.2022 */
     private static function BBACourseRecommendation($qm_sID) {
        
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
        { print('<img style="width: 100%;" src="'.plugins_url("/img/CourseClassicKit.jpeg",__FILE__ ) .'" />'); } 
        
        # check which scores are lower and return the highest number
    if( ( $qm_ultimate_Bundle > $qm_classic_kit) && 
        ( $qm_ultimate_Bundle > $qm_classic)     && 
        ( $qm_ultimate_Bundle > $qm_volume))  
        { print('<img style="width: 100%;" src="'.plugins_url("/img/CourseBundle.png",__FILE__ ) .'" />'); } 
    
        # check which scores are lower and return the highest number
    if( ( $qm_classic > $qm_classic_kit)     && 
        ( $qm_classic > $qm_ultimate_Bundle) && 
        ( $qm_classic > $qm_volume))  
        { print('<img style="width: 100%;" src="'.plugins_url("/img/CourseClassic.jpeg",__FILE__ ) .'" />'); } 
    
        # check which scores are lower and return the highest number
    if( ( $qm_volume > $qm_classic_kit)     && 
        ( $qm_volume > $qm_ultimate_Bundle) && 
        ( $qm_volume > $qm_classic ))  
        { print('<img style="width: 100%;" src="'.plugins_url("/img/CourseVolume.png",__FILE__ ) .'" />'); } 

     }

    /**
     * Defined: Get ProductQueery
     * @since    1.0.0
     * @since    09.25.2022 */    
    private static function QMProductQuery() {

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
    
        ORDER BY wp_bba_qm_session.id DESC"));
    
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

            BBAQMSelf::BBAQMRedirect($current_page_re);
   
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

            BBAQMSelf::BBAQMRedirect($current_page_re);

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


}
    