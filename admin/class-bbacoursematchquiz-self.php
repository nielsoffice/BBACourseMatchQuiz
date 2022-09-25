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
 * @subpackage Bbacoursematchquiz/admin
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
 * @subpackage Bbacoursematchquiz/admin
 * @author     nielfernandez <renniel.fernandez@outgive.ca>
 */

class BBAQMSelf  {
    
    /**
     * Defined: @var @property setter_rel_pro;
     * @since    1.0.0
     * @since    09.24.2022 */
    private $rel_pro;

    /**
     * Defined: @var @property setter_type_pro;
     * @since    1.0.0
     * @since    09.24.2022 */
    private $type_pro;

    /**
     * Defined: @var @property setter_href_pro;
     * @since    1.0.0
     * @since    09.24.2022 */
    private $href_pro;

    /**
     * Defined: @var @property setter_rel
     * @since    1.0.0
     * @since    09.24.2022 */ 
    private static $rel;

    /**
     * Defined: @var @property setter_type
     * @since    1.0.0
     * @since    09.24.2022 */ 
    private static $type;

    /**
     * Defined: @var @property setter_hre
     * @since    1.0.0
     * @since    09.24.2022 */ 
    private static $href;

    /**
     * Defined: @var @property setter_js_src
     * @since    1.0.0
     * @since    09.24.2022 */ 
    private static $src;
     
    /**
     * Defined: @var @property setter_js_id
     * @since    1.0.0
     * @since    09.24.2022 */ 
    private static $id;
    
    /**
     * Defined: @var @property setter_js_swicther
     * @since    1.0.0
     * @since    09.24.2022 */ 
    private static $switch;
     
    /**
     * Defined: init setters
     * Method name: assetInstall
     *
     * @since    1.0.0
     * @since    09.24.2022 */ 
    public static function assetInstall( $assets = [], $switch = 'script' ) {

      if( (self::$switch = $switch) === 'script' ) {

      // check if those are set if not '' !;
      self::$id   = $assets['id']?? '';
      self::$type = $assets['type']?? '';

      // defined: current dynamic page URL 
      self::$src = get_site_url() . $assets['src']?? '';

      } else {

      // check if those are set if not '' !;
      self::$rel  = $assets['rel']?? '';
      self::$type = $assets['type']?? '';

      // defined: current dynamic page URL 
      self::$href = get_site_url() . $assets['href']?? '';
      
      }

    }
  
    /**
     * Defined: setters
     * Method name: getRel AND getType AND gethref
     *
     * @since    1.0.0
     * @since    09.24.2022 */ 
    public static function getRel()  { return(' rel="' .self::$rel .'"'); }
    public static function getType() { return(' type="'.self::$type.'"'); }
    public static function gethref() { return(' href="'.self::$href.'"'); }
    public static function getID()   { return(' id="'  .self::$id .'"');  }
    public static function getsrc()  { return(' src="' .self::$src.'"');  }
  
    /**
     * Defined: get all from setter assets
     * Method name: get
     *
     * @since    1.0.0
     * @since    09.24.2022 */ 
    public static function get() { 
      
      if( self::$switch === 'script' ) { return( '<script' . self::getType() . self::getID() . self::getsrc() .'></script>');}
      else { return( '<link' . self::getRel() . self::getType() . self::gethref() .'/>'); }
   
     }

    /**
     * Defined: Lounch installing assets in custom URL
     * Method name: lounch
     *
     * @since    1.0.0
     * @since    09.24.2022 */ 
    public static function lounch() { 
      
    /**
     * Defined: HTML template head
     * @since    1.0.0
     * @since    09.2.2022 */ 
     require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/bbacoursematchquiz-admin-opening-head-html.php';
    
      print(self::get()); 

    }

    /**
     * Defined: Self Class Redirection JS
     * JS Vanilla redirect trigger per click href
     * Method name: BBAQMRedirect
     *
     * @since    1.0.0
     * @since    09.20.2022 */ 
    public static function BBAQMRedirect( $url = '' ) { ?>
        
      <script>  window.location.href = "<?php print( $url ); ?>"; </script>
    
    <?php }

    public static function BBAQMAdminRedirect( $url = '' ) { ?>
            
      <script> location.reload(true); window.location.href = "<?php print( $url ); ?>"; </script>

    <?php }

    /**
     * Defined: Self Class Branding Header Banner 
     * Method name: BBABranding
     *
     * @since    1.0.0
     * @since    09.20.2022 */ 
    public static function BBABranding( $source = '' ) { 
        
      $bba_branner = "";

      # $url = 'https://beautybossacademy.com/wp-content/uploads/2022/09/BBA-Main.png'
      $bba_branner .= '<div id="bba_qm_brand" class="bba_container">';
      $bba_branner .= '<div class="bba_row">';
      $bba_branner .= '<div class="bba_col">';
      $bba_branner .= '<img id="bba_icon_brand" ';
      if( !empty($source) ) { $bba_branner .= ' src="'.$source.'" '; }
       else { $bba_branner .= ' src="'.  plugins_url("/img/BBA_Main.png", __FILE__) .'" '; }
      $bba_branner .= '/>';
      $bba_branner .= '</div>';
      $bba_branner .= '</div>';  
      $bba_branner .= '</div>';

      return($bba_branner);

     }

}


