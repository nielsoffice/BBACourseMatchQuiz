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

class BBACourseMatchFrontEndShortCode {

    static function frontEndShortCode()
    {
        return self::QuizMatchPages();
    }

   /**
    * @since v1.0 | 09142022
    * Defined: QuizMatchPages method for processing pages
    */
    public static function QuizMatchPages() {
       
        $current_pages = '';
           
        if( isset($_REQUEST['bba-qm-pg']) == true )         
                                                            { $current_pages  = self::QuizMatchPageBegin();
        } else if( isset($_REQUEST['bba-qm-pg1']) == true ) { $current_pages .= self::QuizMatchPageOne();
        } else if( isset($_REQUEST['bba-qm-pg2']) == true ) { $current_pages .= self::QuizMatchPageTwo();
        } else if( isset($_REQUEST['bba-qm-pg3']) == true ) { $current_pages .= self::QuizMatchPageThree();
        } else if( isset($_REQUEST['bba-qm-pg4']) == true ) { $current_pages .= self::QuizMatchPageFour();

        } else { return ('BBA Quiz Match : 404 Page Not found!'); }

        return $current_pages;

    }

   /**
    * @since v1.0 | 09142022
    * Defined: Page begin Quiz Match for front end
    */
    public static function QuizMatchPageBegin() { ?>
        
        <div id="bba_parent_qm_pg1">
        <?php  self::bba_qm_banner(); ?>
        <div id="bba_qm_content" class="bba_container">
            <div class="bba_row">
                <div class="bba_col1">
                      <h3>Which BBA course is right for me?</h3>
                      <p>Take the quiz to be matched with your perfect lash journey!</p>

                      <form action="" method="POST">
                        <button id="bba_qm_begin" class="bba-qm-btn"> BEGIN </button>
                      </form>
                </div>
            </div>  
        </div>
        </div> 
    
    <?php }

   /**
    * @since v1.0 | 09142022
    * Defined: Page one for Quiz Match for front end
    */
    public static function QuizMatchPageOne() { ?>

    <div id="bba_parent_qm_pg1">
        <?php  self::bba_qm_banner(); ?>
        <div id="bba_qm_content" class="bba_container">
            <div class="bba_row">
                <div class="bba_col1">
                      <h3>What are your lash goals?</h3>
                      <form action="" method="POST">
                        <button id="bba_qm_begin" class="bba-qm-btn">
                          I want to make lashing my career!
                        </button>
                      </form>
                      <form action="" method="POST">
                        <button id="bba_qm_begin" class="bba-qm-btn">
                          I want to try out as a hobby.
                        </button>
                      </form>
                </div>
                <div class="bba_col2">
                 <img src="<?php print(plugins_url('/img/Elizabeth.png', __FILE__)); ?>" />
                </div>    
            </div>  
        </div>
        </div> 

    <?php }

   /**
    * @since v1.0 | 09142022
    * Defined: Page two for Quiz Match for front end
    */
    public static function QuizMatchPageTwo() { ?>

      <div id="bba_parent_qm_pg1">
        <?php  self::bba_qm_banner(); ?>
        <div id="bba_qm_content" class="bba_container">
            <div class="bba_row">
                <div class="bba_col1">
                      <h3>What are your lash goals?</h3>
                      <form action="" method="POST">
                        <button id="bba_qm_begin" class="bba-qm-btn">
                          I want to make lashing my career!
                        </button>
                      </form>
                      <form action="" method="POST">
                        <button id="bba_qm_begin" class="bba-qm-btn">
                          I want to try out as a hobby.
                        </button>
                      </form>
                </div>
            </div>  
        </div>
        </div> 

    <?php }

   /**
    * @since v1.0 | 09142022
    * Defined: Page three for Quiz Match for front end
    */
    public static function QuizMatchPageThree() { ?>

       <div id="bba_parent_qm_pg1">
        <?php  self::bba_qm_banner(); ?>
        <div id="bba_qm_content" class="bba_container">
            <div class="bba_row">
                <div class="bba_col1">
                      <h3>Do you currently own any lash supplies?</h3>
                      <form action="" method="POST">
                        <button id="bba_qm_begin" class="bba-qm-btn">
                          Yup! I've got tweezers, adhesive, lash extension & more.
                        </button>
                      </form>
                      <form action="" method="POST">
                        <button id="bba_qm_begin" class="bba-qm-btn">
                          No supplies yet!
                        </button>
                      </form>
                </div>
            </div>  
        </div>
        </div> 

    <?php }

   /**
    * @since v1.0 | 09142022
    * Defined: Page Four for Quiz Match for front end
    */
    public static function QuizMatchPageFour() { ?>

       <div id="bba_parent_qm_pg1">
        <?php self::bba_qm_banner(); ?>
        <div id="bba_qm_content" class="bba_container">
            <div class="bba_row">
                <div class="bba_col1">
                      <h3>Almost There?</h3>
                      <h4>What is your email address?</h4>

                      <form action="" method="POST">
                        <div>
                        <input type="text" name="bba_qm_email" id="bba_qm_email" />
                        </div>
                        <div>
                        <input type="checkbox" name="bba_qm_agree" id="bba_qm_agree" />
                        <p>I want to receive emails from Beauty Boss Academy</p>
                        </div>
                        <button id="bba_qm_begin" class="bba-qm-btn"> Submit </button>
                      </form>
                </div>
            </div>  
      </div>
     </div> 

    <?php }
       // $url = 'https://beautybossacademy.com/wp-content/uploads/2022/09/BBA-Main.png'
    public static function bba_qm_banner() { ?>
       
        <div id="bba_qm_brand" class="bba_container">
            <div class="bba_row">
                <div class="bba_col">
                     <img id="bba_icon_brand" src="<?php print(plugins_url('/img/BBA_Main.png', __FILE__)); ?>" />
                </div>
            </div>  
        </div>

    <?php }

    public static function redirectTo($url = '') {
       
        return header("$url");
        die();

    }

}
