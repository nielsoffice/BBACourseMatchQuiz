<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://nielsoffice197227997.wordpress.com/
 * @since      1.0.0
 *
 * @package    Bbacoursematchquiz
 * @subpackage Bbacoursematchquiz/includes
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Bbacoursematchquiz
 * @subpackage Bbacoursematchquiz/includes
 * @author     nielfernandez <renniel.fernandez@outgive.ca>
 */

 $admin_css = new Class {
  
    public function __construct() {

        add_action( 'admin_footer', array($this, 'style' ), 80 ); 
        add_action( 'admin_head', array($this, 'styleheader' ), 80 );        

    }

    public function styleheader() {?>
     
    <?php }
  
    public function style() { ?>

      <style> /* BBA QM Branding */ #bba_icon_brand { width: 10%; margin-bottom: 35px;} .bba_col { text-align: center;} 
      #select_bba_to, #select_bba_from { width: 100% !important; min-width: 100% !important; max-width: 100% !important; padding: 5px !important; margin-bottom: 25px !important; }
      #id_btn_search {
        width: 100%;
        color: #fff !important;
        background-color: #fd955d !important;
        border-color: #fd955d !important;
        padding: 5px;
        border-radius: 5px;
        }

        #id_btn_search:hover {
        background-color: #fd955dcc !important;
        border-color: #fd955dcc !important;
        color :  #fff !important;   
      }

      /* Datepicker */
      table.table-condensed, thead, tr, th { padding: 15px; }

      td.old.day { padding-left: 15px; padding-right: 5px !important; background-color: #f0f0f0; }
      td.active.day { padding-left: 15px; background-color: #fca863; color: #fff; border-radius: 4px; }
      td.active.day:hover { background-color: #ffaf6e; }
     
      span.month:hover,
      td.old.day:hover { color: #ffaf6e;  }
      td.day, span.month { padding-left: 15px; }
      td.new.day { padding-left: 17px; background-color: #f5c9a6; }

      th.next { font-size: 20px; }
      th.prev { font-size: 20px; }
      th.datepicker-switch { font-size: 30px;}
     
      td.day { padding: 10px; }
      td.day, th.next, th.prev, span.month,
      th.datepicker-switch { cursor: pointer; }
      td.day:hover,
      th.datepicker-switch:hover,
      th.next:hover,
      th.prev:hover{ color: #ff9038; }
      th.next { text-align: right; }
      th.datepicker-switch { text-align: center; }

      /* WP footer */
      div#wpfooter { display: none ;}
      div#dateFilter { padding-bottom: 25px; }
      #btnExport { width: 100%; }
      
     </style>  
        
    <?php }

};