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

        <table id="recomendation_qm">
            <thead><tr style="text-align: center;"><th scope="row">Course Recommendation</th></tr>
            </thead>
            <tbody id="recomendation_qmtb">
                <tr>
                    <td><?php print(self::BBACourseRecommendation($bbq_qm->sID)) ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered table-image">
        <thead>
              <tr>
                  <th scope="row">Selection</th>
                  <th>Classic + Kits</th>
                  <th>Bundle</th>
                  <th>Classic</th>
                  <th>Volume</th>
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
       
              </tr>
          </tfoot> 
        </table>
      </td>
    </tr>
   
    <?php } ?>

 </tbody>  

  <?php }
  

}
