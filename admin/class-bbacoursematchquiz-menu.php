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

class BBACourseMatchMenu {
     
    /**
     * Defined: @var @property mene for wp backend
     * Method name: add_menu wp 
     *
     * @since    1.0.0
     * @since    09.24.2022 */   
    private $menu;

    /**
     * Defined: @var @property menu_name for wp backend
     * Method name: add_menu wp 
     *
     * @since    1.0.0
     * @since    09.24.2022 */   
    private $menu_name;

    /**
     * Defined: manage option role capabilities
     * Method name: add_menu wp 
     *
     * @since    1.0.0
     * @since    09.24.2022 */   
    private $options;

    /**
     * Defined: slug wp admin_menu
     * Method name: add_menu wp 
     *
     * @since    1.0.0
     * @since    09.24.2022 */   
    private $menu_slug;

    /**
     * Defined: callback function / contents
     * Method name: add_menu wp 
     *
     * @since    1.0.0
     * @since    09.24.2022 */   
    private $call_back = [];

    /**
     * Defined: icon dashicons
     * Method name: add_menu wp 
     *
     * @since    1.0.0
     * @since    09.24.2022 */   
    private $icons;

    /**
     * Defined: Initialized admin menu and contents
     * Method name: __construct
     *
     * @since    1.0.0
     * @since    09.24.2022 */   
    public function __construct()
    {

      // Init admin contents
      add_action( 'admin_menu', [ $this,'bba_quiz_match' ] );

      add_shortcode('QUIZ_MATCH', ['BBACourseMatchFrontEndShortCode', 'qmresult']);
      add_shortcode('QUIZ_RESULT', ['BBACourseMatchResult', 'qmresult']);
    }

    /**
     * Defined: Menu Attributes and properties setter
     * Method name: add_menu wp 
     *
     * @since    1.0.0
     * @since    09.24.2022 */   
    public function BBAQMProperties(
      
      $menu=null,      $menu_name=null, $options=null, 
      $menu_slug=null, $call_back = [], $icons=null)       
    
    {

      $this->menu      = $menu;
      $this->menu_name = $menu_name;
      $this->options   = $options;
      $this->menu_slug = $menu_slug;
      $this->call_back = $call_back;
      $this->icons     = $icons;

      
    }

    /**
     * Defined: @var @property menu_name for wp backend
     * Method name: add_menu wp 
     *
     * @since    1.0.0
     * @since    09.24.2022 */   
    public function bba_quiz_match() : void  {

       add_menu_page(

        $this->menu,
        $this->menu_name,
        $this->options, 
        $this->menu_slug, 
        $this->call_back, 
        $this->icons 
    
      );
    
    }
    
}

