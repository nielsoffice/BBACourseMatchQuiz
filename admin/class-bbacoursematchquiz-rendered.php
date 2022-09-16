<?php 

require_once 'class-bbacoursematchquiz-frontEnd-shortcode.php';
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
       
        print(BBACourseMatchMenuRendered::BBA_QM_REDERED());
        print(BBACourseMatchMenuRendered::BBA_MQ_ASSETS());

    }
    

    public function BBA_QM_REDERED() { ?>

    <div class="fluid-container">
    <div id="bba_qm_con" class="container"> 
    <?php BBACourseMatchFrontEndShortCode::bba_qm_banner(); ?>   
    <div class="row">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Email</th>
                <th>Match Course</th>
                <th>Quiz</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- session QM Response Begin -->
            <tr>
                <td> 1 </td>
                <td>August 2022</td>
                <td>test1@mail.com</td>
                <td>Bundle</td>
                <td>
                  <table>
                  <thead>
                        <tr>
                            <th>Selection</th>
                            <th>Classic + Kits</th>
                            <th>Bundle</th>
                            <th>Classic</th>
                            <th>Volume</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- QM Selection result begin -->
                        <tr>
                            <td>QA1</td>
                            <td>1</td>
                            <td>2</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>QA2</td>
                            <td>1</td>
                            <td>2</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>QA3</td>
                            <td>1</td>
                            <td>2</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>QA4</td>
                            <td>1</td>
                            <td>2</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <!-- QM Selection result end -->
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>Result</th>
                            <th>4</th>
                            <th>8</th>
                            <th>4</th>
                            <th>0</th>
                        </tr>
                    </tfoot> 
                  </table>
                </td>
                <td>Delete</td>
            </tr>
            <!-- Begin exmaple second attemp -->
            <tr>
                <td> 2 </td>
                <td>Sept 2022</td>
                <td>test@mail.com</td>
                <td>Bundle</td>
                <td>
                  <table>
                  <thead>
                        <tr>
                            <th>Selection</th>
                            <th>Classic + Kits</th>
                            <th>Bundle</th>
                            <th>Classic</th>
                            <th>Volume</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- QM Selection result begin -->
                        <tr>
                            <td>QA1</td>
                            <td>1</td>
                            <td>2</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>QA2</td>
                            <td>1</td>
                            <td>2</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>QA3</td>
                            <td>1</td>
                            <td>2</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>QA4</td>
                            <td>1</td>
                            <td>2</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <!-- QM Selection result end -->
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>Result</th>
                            <th>4</th>
                            <th>8</th>
                            <th>4</th>
                            <th>0</th>
                        </tr>
                    </tfoot> 
                  </table>
                </td>
                <td>Delete</td>
            </tr>

            <!-- End sample second attemp -->
            
        </tbody>                  
        <!-- session QM Response end -->
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Email</th>
                <th>Match Course</th>
                <th>Quiz</th>
                <th>Delete</th>
            </tr>
        </tfoot> 
    </table>
    </div>
    </div>
    </div>
    <?php }
  

     public static function BBA_MQ_ASSETS() { 

        $my_current_screen = get_current_screen();

		if($my_current_screen->parent_base === 'bba-quiz-match-result' ) : ?>
		<style> /* BBA QM Branding */ #bba_icon_brand { width: 10%; margin-bottom: 35px;} .bba_col { text-align: center;} </style>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.7/css/scroller.bootstrap5.min.css"/>
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.7/js/dataTables.scroller.min.js"></script>

        <script>

            $(document).ready(function () {
     
            var table = $('#example').DataTable( {
                 pageLength : 5,
                 lengthMenu: [[5, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, -1], [5, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 'All']]
              })

            });

        </script>

        <?php endif;

     }

}
    