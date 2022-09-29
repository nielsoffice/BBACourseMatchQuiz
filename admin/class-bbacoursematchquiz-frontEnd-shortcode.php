<?php 

require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-bbacoursematchquiz-quiz-match.php';
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-bbacoursematchquiz-frontEnd-url.php';
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-bbacoursematchquiz-rendered.php';
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/modal-bbacoursematchquiz-products.php';

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

class BBACourseMatchFrontEndShortCode extends BBACourseMatchMenuRendered {

    static function qmresult() {

        BBACourseMatchFrontEndShortCode::resultCodes();
 
    }

    static public function resultCodes() { 
        
        $sessions = BBACourseMatchMenuRendered::QMProductQuery('DESC', 1); foreach ($sessions as $bbq_qm ) {  ?>

        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                       <h5 id="recommendation"> Course Recommendation</h5>
                       <div id="courseRecommend"><?php print(self::BBACourseRecommendation($bbq_qm->sID)) ?></div>
                    </div>
                </div>
            </div>
        </div>    
        
  <?php }
   
  }

}