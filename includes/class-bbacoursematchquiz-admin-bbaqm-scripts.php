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

 $admin_js = new Class {
  
    public function __construct() {

        add_action( 'admin_footer', array($this, 'js' ), 80 );  

    }

    /**
     * Defined: script and style only for admin active menu
     * @since    1.0.0
     * @since    09.20.2022 */
    public function js() { 
        
        wp_register_style ( 'BBA_QM_B5_bootstrap', get_site_url() . '/wp-content/plugins/bbacoursematchquiz/admin/css/bootstrap.min.css',             array(), false ); 
        wp_register_style ( 'BBA_QM_B5_dataTables',get_site_url() . '/wp-content/plugins/bbacoursematchquiz/admin/css/dataTables.bootstrap5.min.css', array(), false ); 
        wp_register_style ( 'BBA_QM_B5_buttons',   get_site_url() . '/wp-content/plugins/bbacoursematchquiz/admin/css/buttons.bootstrap5.min.css',    array(), false ); 
        wp_register_style ( 'BBA_QM_B5_scroller',  get_site_url() . '/wp-content/plugins/bbacoursematchquiz/admin/css/scroller.bootstrap5.min.css',   array(), false ); 
        wp_register_style ( 'BBA_QM_font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',              array(), false );
        wp_register_style ( 'BBA_QM_datePickerStyle  ', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css',array(), false );
     
        wp_enqueue_script('BBA_QM_bootstrap',  get_site_url() . '/wp-content/plugins/bbacoursematchquiz/admin/js/bootstrap.bundle.min.js',      array(), null); 
        wp_enqueue_script('BBA_QM_jqueryDataT',get_site_url() . '/wp-content/plugins/bbacoursematchquiz/admin/js/jquery.dataTables.min.js',     array(), null); 
        wp_enqueue_script('BBA_QM_dataTables', get_site_url() . '/wp-content/plugins/bbacoursematchquiz/admin/js/dataTables.bootstrap5.min.js', array(), null);
        wp_enqueue_script('BBA_QM_buttons',    get_site_url() . '/wp-content/plugins/bbacoursematchquiz/admin/js/buttons.bootstrap5.min.js',    array(), null); 
        wp_enqueue_script('BBA_QM_dataTables', get_site_url() . '/wp-content/plugins/bbacoursematchquiz/admin/js/dataTables.scroller.min.js',   array(), null); 
    
        function _filter_style_wp_register_enqueue() {

            $style_handles = [

                'BBA_QM_B5_bootstrap', 'BBA_QM_B5_dataTables',
                'BBA_QM_B5_buttons',   'BBA_QM_B5_scroller',
                'BBA_QM_font-awesome', 'BBA_QM_datePickerStyle'
    
            ];
            
            foreach ( $style_handles as $style_handle_) { wp_enqueue_style ( $style_handle_ ); }
        }
        _filter_style_wp_register_enqueue();
        
        add_filter( 'script_loader_tag', 'bba_qm_typeScriptJS', 10, 3 );
        function bba_qm_typeScriptJS( $tag, $handle, $src ) {

            $handles = [
                
                 'BBA_QM_jquery3',     'BBA_QM_bootstrap',
                 'BBA_QM_jqueryDataT', 'BBA_QM_dataTables',
                 'BBA_QM_buttons',     'BBA_QM_dataTables'
            
            ]; foreach ($handles as $handle_) {

                if ( $handle_ == $handle ) { return('<script type="text/javascript" src="' . $src . '" id="' . $handle . '"></script>'); }       
            }
         } ?>

        <script type="text/javascript" src="<?php print(get_site_url() . '/wp-content/plugins/bbacoursematchquiz/admin/js/jquery-3.6.0.min.js'); ?>"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script>
            
        /*
        *  jQuery table2excel - v1.1.2
        *  jQuery plugin to export an .xls file in browser from an HTML table
        *  https://github.com/rainabba/jquery-table2excel
        *
        *  Made by rainabba
        *  Under MIT License
        */
   
        (function ( $, window, document, undefined ) {
            var pluginName = "table2excel",

            defaults = {
                exclude: ".noExl",
                name: "Table2Excel",
                filename: "table2excel",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: false
            };

            // The actual plugin constructor
            function Plugin ( element, options ) {
                    this.element = element;
                    // jQuery has an extend method which merges the contents of two or
                    // more objects, storing the result in the first object. The first object
                    // is generally empty as we don't want to alter the default options for
                    // future instances of the plugin
                    //
                    this.settings = $.extend( {}, defaults, options );
                    this._defaults = defaults;
                    this._name = pluginName;
                    this.init();
            }

            Plugin.prototype = {
                init: function () {
                    var e = this;

                    var utf8Heading = "<meta http-equiv=\"content-type\" content=\"application/vnd.ms-excel; charset=UTF-8\">";
                    e.template = {
                        head: "<html xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:x=\"urn:schemas-microsoft-com:office:excel\" xmlns=\"http://www.w3.org/TR/REC-html40\">" + utf8Heading + "<head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets>",
                        sheet: {
                            head: "<x:ExcelWorksheet><x:Name>",
                            tail: "</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet>"
                        },
                        mid: "</x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body>",
                        table: {
                            head: "<table>",
                            tail: "</table>"
                        },
                        foot: "</body></html>"
                    };

                    e.tableRows = [];
            
                    // Styling variables
                    var additionalStyles = "";
                    var compStyle = null;

                    // get contents of table except for exclude
                    $(e.element).each( function(i,o) {
                        var tempRows = "";
                        $(o).find("tr").not(e.settings.exclude).each(function (i,p) {
                            
                            // Reset for this row
                            additionalStyles = "";
                            
                            // Preserve background and text colors on the row
                            if(e.settings.preserveColors){
                                compStyle = getComputedStyle(p);
                                additionalStyles += (compStyle && compStyle.backgroundColor ? "background-color: " + compStyle.backgroundColor + ";" : "");
                                additionalStyles += (compStyle && compStyle.color ? "color: " + compStyle.color + ";" : "");
                            }

                            // Create HTML for Row
                            tempRows += "<tr style='" + additionalStyles + "'>";
                            
                            // Loop through each TH and TD
                            $(p).find("td,th").not(e.settings.exclude).each(function (i,q) { // p did not exist, I corrected
                                
                                // Reset for this column
                                additionalStyles = "";
                                
                                // Preserve background and text colors on the row
                                if(e.settings.preserveColors){
                                    compStyle = getComputedStyle(q);
                                    additionalStyles += (compStyle && compStyle.backgroundColor ? "background-color: " + compStyle.backgroundColor + ";" : "");
                                    additionalStyles += (compStyle && compStyle.color ? "color: " + compStyle.color + ";" : "");
                                }

                                var rc = {
                                    rows: $(this).attr("rowspan"),
                                    cols: $(this).attr("colspan"),
                                    flag: $(q).find(e.settings.exclude)
                                };

                                if( rc.flag.length > 0 ) {
                                    tempRows += "<td> </td>"; // exclude it!!
                                } else {
                                    tempRows += "<td";
                                    if( rc.rows > 0) {
                                        tempRows += " rowspan='" + rc.rows + "' ";
                                    }
                                    if( rc.cols > 0) {
                                        tempRows += " colspan='" + rc.cols + "' ";
                                    }
                                    if(additionalStyles){
                                        tempRows += " style='" + additionalStyles + "'";
                                    }
                                    tempRows += ">" + $(q).html() + "</td>";
                                }
                            });

                            tempRows += "</tr>";

                        });
                        // exclude img tags
                        if(e.settings.exclude_img) {
                            tempRows = exclude_img(tempRows);
                        }

                        // exclude link tags
                        if(e.settings.exclude_links) {
                            tempRows = exclude_links(tempRows);
                        }

                        // exclude input tags
                        if(e.settings.exclude_inputs) {
                            tempRows = exclude_inputs(tempRows);
                        }
                        e.tableRows.push(tempRows);
                    });

                    e.tableToExcel(e.tableRows, e.settings.name, e.settings.sheetName);
                },

                tableToExcel: function (table, name, sheetName) {
                    var e = this, fullTemplate="", i, link, a;

                    e.format = function (s, c) {
                        return s.replace(/{(\w+)}/g, function (m, p) {
                            return c[p];
                        });
                    };

                    sheetName = typeof sheetName === "undefined" ? "Sheet" : sheetName;

                    e.ctx = {
                        worksheet: name || "Worksheet",
                        table: table,
                        sheetName: sheetName
                    };

                    fullTemplate= e.template.head;

                    if ( $.isArray(table) ) {
                        Object.keys(table).forEach(function(i){
                            //fullTemplate += e.template.sheet.head + "{worksheet" + i + "}" + e.template.sheet.tail;
                            fullTemplate += e.template.sheet.head + sheetName + i + e.template.sheet.tail;
                        });
                    }

                    fullTemplate += e.template.mid;

                    if ( $.isArray(table) ) {
                        Object.keys(table).forEach(function(i){
                            fullTemplate += e.template.table.head + "{table" + i + "}" + e.template.table.tail;
                        });
                    }

                    fullTemplate += e.template.foot;

                    for (i in table) {
                        e.ctx["table" + i] = table[i];
                    }
                    delete e.ctx.table;

                    var isIE = navigator.appVersion.indexOf("MSIE 10") !== -1 || (navigator.userAgent.indexOf("Trident") !== -1 && navigator.userAgent.indexOf("rv:11") !== -1); // this works with IE10 and IE11 both :)
                    //if (typeof msie !== "undefined" && msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // this works ONLY with IE 11!!!
                    if (isIE) {
                        if (typeof Blob !== "undefined") {
                            //use blobs if we can
                            fullTemplate = e.format(fullTemplate, e.ctx); // with this, works with IE
                            fullTemplate = [fullTemplate];
                            //convert to array
                            var blob1 = new Blob(fullTemplate, { type: "text/html" });
                            window.navigator.msSaveBlob(blob1, getFileName(e.settings) );
                        } else {
                            //otherwise use the iframe and save
                            //requires a blank iframe on page called txtArea1
                            txtArea1.document.open("text/html", "replace");
                            txtArea1.document.write(e.format(fullTemplate, e.ctx));
                            txtArea1.document.close();
                            txtArea1.focus();
                            sa = txtArea1.document.execCommand("SaveAs", true, getFileName(e.settings) );
                        }

                    } else {
                        var blob = new Blob([e.format(fullTemplate, e.ctx)], {type: "application/vnd.ms-excel"});
                        window.URL = window.URL || window.webkitURL;
                        link = window.URL.createObjectURL(blob);
                        a = document.createElement("a");
                        a.download = getFileName(e.settings);
                        a.href = link;

                        document.body.appendChild(a);

                        a.click();

                        document.body.removeChild(a);
                    }

                    return true;
                }
            };

            function getFileName(settings) {
                return ( settings.filename ? settings.filename : "table2excel" );
            }

            // Removes all img tags
            function exclude_img(string) {
                var _patt = /(\s+alt\s*=\s*"([^"]*)"|\s+alt\s*=\s*'([^']*)')/i;
                return string.replace(/<img[^>]*>/gi, function myFunction(x){
                    var res = _patt.exec(x);
                    if (res !== null && res.length >=2) {
                        return res[2];
                    } else {
                        return "";
                    }
                });
            }

            // Removes all link tags
            function exclude_links(string) {
                return string.replace(/<a[^>]*>|<\/a>/gi, "");
            }

            // Removes input params
            function exclude_inputs(string) {
                var _patt = /(\s+value\s*=\s*"([^"]*)"|\s+value\s*=\s*'([^']*)')/i;
                return string.replace(/<input[^>]*>|<\/input>/gi, function myFunction(x){
                    var res = _patt.exec(x);
                    if (res !== null && res.length >=2) {
                        return res[2];
                    } else {
                        return "";
                    }
                });
            }

            $.fn[ pluginName ] = function ( options ) {
                var e = this;
                    e.each(function() {
                        if ( !$.data( e, "plugin_" + pluginName ) ) {
                            $.data( e, "plugin_" + pluginName, new Plugin( this, options ) );
                        }
                    });

                // chain jQuery functions
                return e;
            };

        })( jQuery, window, document );
        </script>    

        <script>

        $(document).ready(function () {

        var table = $('#example').DataTable( {
            pageLength : 5,
            lengthMenu: [[5, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, -1], [5, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 'All']]
        });

        $(".exportToExcel").click(function(){
            $("#exampleExport").table2excel({
                name: "BBA_QUIZMATCH_",
            filename: "BBA_QUIZMATCH_" + new Date().toDateString() + ".xls",
            fileext: ".xls"

            }); 
            });

        });

        $(document).ready(function(){
        
        $(function () {

            $('#startDate').datepicker({ format: 'MM d, yyyy'});
            $('#endDate').datepicker({ format: 'MM d, yyyy'});


         });    
        
        });

        </script>
        
    <?php }

};