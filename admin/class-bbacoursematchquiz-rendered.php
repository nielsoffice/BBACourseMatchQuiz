<?php 

// require_once 'class-bbacoursematchquiz-frontEnd-shortcode.php';

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
                <th>ID</th>
                <th>Date</th>
                <th>Email</th>
                <th>Match Course</th>
                <th id="bba_qm_ignore">Quiz</th>
                <th id="bba_qm_ignore">Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- session QM Response Begin -->
            <tr>
                <td scope="row"> 1 </td>
                <td scope="row">August 2022</td>
                <td scope="row">test1@mail.com</td>
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
                <th>ID</th>
                <th>Date</th>
                <th>Email</th>
                <th>Match Course</th>
                <th>Quiz</th>
                <th>Delete</th>
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

		if($my_current_screen->parent_base === 'bba-quiz-match-result' ) : ?>
		<style> /* BBA QM Branding */ #bba_icon_brand { width: 10%; margin-bottom: 35px;} .bba_col { text-align: center;} </style>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.7/css/scroller.bootstrap5.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
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

        <script src="https://rawcdn.githack.com/FuriosoJack/TableHTMLExport/v2.0.0/src/tableHTMLExport.js"></script>
        <script>
            /*
 *  jQuery table2excel - v1.1.2
 *  jQuery plugin to export an .xls file in browser from an HTML table
 *  https://github.com/rainabba/jquery-table2excel
 *
 *  Made by rainabba
 *  Under MIT License
 */
//table2excel.js
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
       
        </script>

        <?php endif;

     }

}
    