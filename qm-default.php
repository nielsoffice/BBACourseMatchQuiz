<?php 

add_action('init', function() {

	if(isset($_GET['begin']))      { BBAQuizMatchPageURL::setURL('begin');
	} else if(isset($_GET['pg1'])) { BBAQuizMatchPageURL::setURL('pg1'); 
	} else if(isset($_GET['pg2'])) { BBAQuizMatchPageURL::setURL('pg2'); 
	} else if(isset($_GET['pg3'])) { BBAQuizMatchPageURL::setURL('pg3'); 
	} else if(isset($_GET['pg4'])) { BBAQuizMatchPageURL::setURL('pg4'); 
    } else { BBAQuizMatchPageURL::setURL('result'); }

	if(	BBAQuizMatchPageURL::URL() == true ) {	

	add_action( 'bba_qm_top_add_settings_before_parent', function() {

		BBAQMSelf::assetInstall([
			'rel'  => 'stylesheet',
			'type' => 'text/css',
			'href' => '/wp-content/plugins/bbacoursematchquiz/public/css/bootstrap.min.css'
		], 'style');
		BBAQMSelf::launch();
		BBAQMSelf::assetInstall([
			'rel'  => 'stylesheet',
			'type' => 'text/css',
			'href' =>  '/wp-content/plugins/bbacoursematchquiz/public/css/bbacoursematchquiz-public.css'
		], 'style');
		BBAQMSelf::launch();
		BBAQMSelf::assetInstall([
			'type' => 'text/javascript',
			'id'   => 'jQuery',
			'src'  => '/wp-content/plugins/bbacoursematchquiz/public/js/bootstrap.bundle.min.js'
		]);
		BBAQMSelf::launch();
		BBAQMSelf::assetInstall([
			'type' => 'text/javascript',
			'id'   => 'jQuery',
			'src'  => '/wp-content/plugins/bbacoursematchquiz/public/js/bootstrap.bundle.min.js'
		]);
		BBAQMSelf::launch();
		BBAQMSelf::assetInstall([
			'type' => 'text/javascript',
			'id'   => 'jQuery',
			'src'  => '/wp-content/plugins/bbacoursematchquiz/public/js/jquery-3.6.0.min.js'
		]);
		BBAQMSelf::launch();
		BBAQMSelf::assetInstall([
			'type' => 'text/javascript',
			'id'   => 'script_id',
			'src'  => '/wp-content/plugins/bbacoursematchquiz/public/js/bbacoursematchquiz-public.js'
		]);
		BBAQMSelf::launch();
		?> 
		<style> 
        input[type="submit"] { white-space: normal; overflow-wrap: break-word !important;}
   
		/*--------------------------------------------------------------
		# Defined! Contents @Media Query All Device 
		--------------------------------------------------------------*/
		 @media only screen and (min-width: 1024px ) { img#bba_icon_brand { width: 15%;}	input#bba_qm2a, input#bba_qm2b, input#bba_qm2a { width: 40% !important; } }
		 @media only screen and (min-width: 768px)  { #courseRecommend { margin: 0 auto; width: 50% !important;  } .col-12 h3 {  font-size: 18px; font-weight: 400; }  #bba_qm_brand { margin-bottom: 5% !important; }  }
         
         @media only screen and (max-width: 1024px ) { 
		 #bba_qm_brand { margin-bottom: 0px !important; } 
		 div#col1 a, div#col2 a { color: #FFA18B; text-decoration: none; }
		 div#col1 a:hover, div#col2 a:hover { color: #fe9279; font-weight: 500; font-size: 16px; border-bottom: solid 1px #fe9279; }
		}
		
		@media only screen and (max-width: 966px )  { img#bba_icon_brand { width: 20%; } input#bba_qm2a, input#bba_qm2b, input#bba_qm2a { width: 100% !important; } }
		@media only screen and (max-width: 768px )  { #bba_qm2a-textwrap { width: 100%; } input#email_input, input#bba_qm2email { width: 80%; } }
		@media only screen and (max-width: 690px )  { img#bba_icon_brand { width: 20%; } }
		@media only screen and (max-width: 480px )  { 
            
            #courseRecommend { margin: 0 auto; width: 100% !important;  } .col-12 h3 {  font-size: 18px; font-weight: 400; }  #bba_qm_brand { margin-bottom: 5% !important; }  
            #col1, #col2 { margin: 10px; }
            input#bba_qm2a, input#bba_qm2b { width: 100% !important; }          img#bba_icon_brand { width: 20%; } }
		@media only screen and (max-width: 425px )  {
        #courseRecommend { margin: 0 auto; width: 160% !important; margin-left: -65px; }
        img#bba_icon_brand { width: 30%; } }
		@media only screen and (max-width: 320px )  { input#bba_qm2a, input#bba_qm2b { width: 100% !important; } img#bba_icon_brand { width: 40% !important; } .bbarow div h3 { font-size: 18px !important; font-weight: 400 !important; } 
         #courseRecommend { margin: 0 auto; width: 160% !important; margin-left: -55px; }
        }
	   </style>
	   <?php 
	});   

	add_action( 'bba_qm_add_settings_after_child_parent', function() { print(BBAQMSelf::BBABranding()); });

  }
});

		/**
		 * Defined: Apply hook for begin page
		 * Page URL name: ?bba-qm-pg
		 *
		 * @since    1.0.0
		 * @since    09.20.2022 */ 
		add_action('init', function() {
			
			if (class_exists('BBAQMSelection')) {     
		
				BBAQuizMatchPageURL::setURL('begin');
		
			if(BBAQuizMatchPageURL::URL() == true ) {

				BBAQMSelection::BBATemplate('1-col' , ['box-md' , 'bba_mq'] ); 
				BBAQMSelection::BBAaddCol1Content([
					
					'target'    => 'bba_qm_begin',
					'redirect'  =>  get_site_url().'/?begin',  
					'redirect'  =>  get_site_url().'/quiz/?pg1', 
					'question'  => 'BEGIN',
					'selection' =>  [] 
					
				],'lg', function() {
		
					$html  = '';
					$html .= '<h3>Which BBA course is right for me?</h3>';
					$html .= '<p>Take the quiz to be matched with your perfect lash journey!</p>';

					return($html);
		
				});
				BBAQMSelection::execute();  

			}

		} else {
			echo "PG1 | WP Plugin: BBA Quiz Match was removed or deactivated";
		}  

		});

		/**
		 * Defined: Apply hook for page 1
		 * Page URL name: ?bba-qm-pg
		 *
		 * @since    1.0.0
		 * @since    09.20.2022 */ 
		add_action('init', function() {
			
		  if (class_exists('BBAQMSelection')) {     

				BBAQuizMatchPageURL::setURL('pg1');
		
			if(BBAQuizMatchPageURL::URL() == true ) {

				BBAQMSelection::BBATemplate('1-col' , ['box-md' , 'bba_mq'] ); 
				BBAQMSelection::BBAaddCol1Content( null ,'lg-12', function() {

					$html  = '';		
					$html .= '<div id="qm_container" class="container-fluid">';
					$html .= '<div class="container">';
					$html .= '<div class="row align-items-center">';
					$html .= '<div class=" col-sm-12 col-md-12 col-lg-6">';

					$html .= '<h3 class="qm_hd_mbile">Which best describes you?</h3>';

					$html .= '<div class="row align-items-center">';

					$html .= '<div class="col-12">';
					$html .= BBAQMSelection::BBAaddCol1Content([	
					          'target'    => 'bba_qm2b', 
					          'origin'    => get_site_url().'/quiz/?begin',
					          'redirect'  => get_site_url().'/quiz/?pg2', 
					          'question'  => "I am brand new to lashing",
					          'selection' =>  [1,2,1,0] 
			
					],'lg-12', function() {
							
						return(BBAQMPerform::do_insert());
						
					});
					
					$html .= BBAQMSelection::addColContent();
			
					$html .= '</div>';

					$html .= '<div class="col-12">';
					$html .= BBAQMSelection::BBAaddCol1Content([	
					          'target'    => 'bba_qm2a', 
					          'origin'    => get_site_url().'/quiz/?begin',
					          'redirect'  => get_site_url().'/quiz/?pg2', 
					          'question'  => "I have some experience",
					          'selection' =>  [0,1,0,3] 
				
					],'lg-12', function() { 
						
						return(BBAQMPerform::do_insert());
					
					});
					
					$html .= BBAQMSelection::addColContent();

					$html .= '</div>';

					$html .= '</div>'; // row
					$html .= '</div>'; // col 6

					$html .= '<div class="col-sm-12 col-md-12 col-lg-6">';
					$html .= '<img src="'.  plugins_url("/admin/img/Elizabeth.png", __FILE__) .'" class="img-fluid" />';
					$html .= '</div>';

					$html .= '</div>'; // row
					$html .= '</div>'; // container
					$html .= '</div>'; // qm_container

					return($html);

				});
				BBAQMSelection::execute();  

				}

			} else {
			echo "WP Plugin: BBA Quiz Match was removed or deactivated";
			} 

		});
 
		/**
		 * Defined: Apply hook for page 2
		 * Page URL name: ?bba-qm-pg
		 *
		 * @since    1.0.0
		 * @since    09.20.2022 */ 
		add_action('init', function() {

			if (class_exists('BBAQMSelection')) {     
				
				BBAQuizMatchPageURL::setURL('pg2');

				if(BBAQuizMatchPageURL::URL() == true ) {

					add_action( 'bba_qm_add_settings_bottom_child_row_parent', function() {
							
						BBAQMSelection::BBAaddCol1Content([	
						'target'    => 'bba_qm2a', 
						'origin'    => get_site_url().'/quiz/?begin',
						'redirect'  => get_site_url().'/quiz/?pg3',  
						'question'  => "I want to try it out as a hobby.",
						'selection' =>  [2,0,1,0] 
				
						],'lg-12', function() {
							return BBAQMPerform::do_insert();
						});
						BBAQMSelection::addColContent();
			
					});

					BBAQMSelection::BBATemplate('1-col' , ['box-md' , 'bba_mq'] ); 
					BBAQMSelection::BBAaddCol1Content([
						
					'target'    => 'bba_qm2b', 
					'origin'    => get_site_url().'/quiz/?begin',
					'redirect'  => get_site_url().'/quiz/?pg3', 
					'question'  => "I want to make lashing my career!",
					'selection' =>  [0,2,1,0] 
					
					],'lg-12', function() {

					$html  = '';
					$html .= '<h3>What are your lash goals?</h3>';
					$html .=  BBAQMPerform::do_insert();

					return($html);

					});
				
					BBAQMSelection::execute();  

				}

			} else {
			echo "WP Plugin: BBA Quiz Match was removed or deactivated";
			} 
			
		});

		/**
		 * Defined: Apply hook for page 3
		 * Page URL name: ?bba-qm-pg
		 *
		 * @since    1.0.0
		 * @since    09.20.2022 */ 
		add_action('init', function() {
			
			if (class_exists('BBAQMSelection')) {     
			
				   BBAQuizMatchPageURL::setURL('pg3');

				if(BBAQuizMatchPageURL::URL() == true ) {

					add_action( 'bba_qm_add_settings_bottom_child_row_parent', function() {
							
						BBAQMSelection::BBAaddCol1Content([	
						'target'    => 'bba_qm2a', 
						'origin'    => get_site_url().'/quiz/?begin',
						'redirect'  => get_site_url().'/quiz/?pg4', 
						'question'  => "No supplies yet!",
						'selection' =>   [2,2,0,0] 
				
						],'lg-12', function() {
							return BBAQMPerform::do_insert();
						});
						BBAQMSelection::addColContent();
							
					});

					BBAQMSelection::BBATemplate('1-col' , ['box-md' , 'bba_mq'] ); 
					BBAQMSelection::BBAaddCol1Content([
						
						'target'    => 'bba_qm2a-textwrap', 
						'origin'    => get_site_url().'/quiz/?begin',
						'redirect'  => get_site_url().'/quiz/?pg4',  
						'question'  => "Yup! I've got tweezers adhesive, lash extensions & more.",
						'selection' =>  [0,0,3,3] 
						
						],'lg-12', function() {

						$html  = '';
						$html .= '<h3>Do you currently own any lash supplies?</h3>';
						$html .=  BBAQMPerform::do_insert();
						return($html);

						});
					
						BBAQMSelection::execute();  

				  }

			} else {
			  echo "WP Plugin: BBA Quiz Match was removed or deactivated";
			}  

		});

		/**
		 * Defined: Apply hook for page 4
		 * Page URL name: ?bba-qm-pg
		 *
		 * @since    1.0.0
		 * @since    09.20.2022 */ 
	add_action('init', function() {

			if (class_exists('BBAQMSelection')) {     
				
				BBAQuizMatchPageURL::setURL('pg4');

				if(BBAQuizMatchPageURL::URL() == true ) {

					BBAQMSelection::BBATemplate('1-col' , ['box-md' , 'bba_mq'] ); 
					BBAQMSelection::BBAaddEmailContent([
						
					'target'    => 'bba_qm2email', 
					'origin'    => get_site_url().'/quiz/?begin',
					'redirect'  => get_site_url().'/quiz/?result', 
					'question'  => "I want to receive emails from Beauty Boss Academy",
					'selection' =>  [1,2,3,4]

					],'lg', function() {

					$html  = '';
					$html .= '<h2>Almost There!</h2>';
					$html .= '<h4>What is your email address?</h4>';
					$html .=  BBAQMPerform::do_insert();

					return($html);

					});
				
					BBAQMSelection::execute();  

			}

		} else {
		  echo "WP Plugin: BBA Quiz Match was removed or deactivated";
		}
		
	});


	add_action('init', function() { 
				
			BBAQuizMatchPageURL::setURL('result');

		if(BBAQuizMatchPageURL::URL() == true ) {
			
			add_action( 'bba_qm_add_settings_bottom_child_row_parent', function() {
							
				BBAQMSelection::BBAaddCol1Content([],'lg-12', function() {

					$stringsURL = '/quiz/?begin';

					return('
					
					<div class="container-fluid">
					<div class="container">
					<div class="row">
				
					<div id="col1" class="col-md-6"> 
					<a class="" href="http://beautybossacademy.com/courses"> Learn More!</a></div>
					<div id="col2" class="col-md-6"> 
					<a class="" href="'. get_site_url() . $stringsURL .'"> Try Again?</a></div>
				
					</div> 
					</div> 
					</div>
					
					'.BBAQMPerform::do_insert()
					);
				});
				BBAQMSelection::addColContent();
					
			});

			BBAQMSelection::BBATemplate('1-col' , ['box-md' , 'bba_mq'] ); 
			BBAQMSelection::BBAaddEmailContent([],'lg-12', function() { 

				return (do_shortcode( '[QUIZ_MATCH]' ) . BBAQMPerform::do_insert());

			});

			BBAQMSelection::execute();  

		}   

	});
