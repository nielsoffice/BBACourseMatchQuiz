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

class BBACourseMatchMenuRendered {

    public function __construct()
    {

        print(BBACourseMatchMenuRendered::BBA_QM_REDERED());
        print(BBACourseMatchMenuRendered::BBA_MQ_ASSETS());

    }
    

    public function BBA_QM_REDERED() { ?>

    <div class="fluid-container">
    <div id="bba_qm_con" style="width: 99%;"> 
    <?php BBACourseMatchFrontEndShortCode::bba_qm_banner(); ?>   
    <div class="row">
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
        <tbody>
            <!-- session QM Response Begin -->
            <tr>
                <td scope="row"> 1 </td>
                <td scope="row">August 2022</td>
                <td scope="row">test1@mail.com</td>
                <td scope="row">Yes</td>
                <td class="w-25"><img style="width: 100%;" src="<?php print(plugins_url('/img/CourseBundle.png', __FILE__)); ?>" /></td>
                <td scope="row">
                <table class="table table-bordered table-image">
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
                <td style="text-align: center;"><i class="fa fa-close" style="font-size:36px;color:red"></i></td>
            </tr>
     
            
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
    <button class="exportToExcel btn btn-warning">Export to XLS</button>
    <!-- END EXPORT -->
    </div>
    </div>
    </div>
    <?php }
  

     public static function BBA_MQ_ASSETS() { 

        $my_current_screen = get_current_screen();

        if($my_current_screen->parent_base === 'bba-quiz-match-result' ) : 
            
            require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-bbacoursematchquiz-admin-bbaqm-scripts.php';
            require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-bbacoursematchquiz-admin-bbaqm-style.php'; ?>	

        <?php endif;

     }

}
    