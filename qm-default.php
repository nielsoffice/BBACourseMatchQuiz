<?php 

add_action('init', function() {

	session_start();
	
	if(isset($_GET['begin']))             { BBAQuizMatchPageURL::setURL('begin');
	} else if(isset($_GET['bba-qm-pg1'])) { BBAQuizMatchPageURL::setURL('bba-qm-pg1'); 
	} else if(isset($_GET['bba-qm-pg2'])) { BBAQuizMatchPageURL::setURL('bba-qm-pg2'); 
	} else if(isset($_GET['bba-qm-pg3'])) { BBAQuizMatchPageURL::setURL('bba-qm-pg3'); 
	} else { BBAQuizMatchPageURL::setURL('bba-qm-pg4'); }

	if(	BBAQuizMatchPageURL::URL() == true ) {	

	add_action( 'bba_qm_top_add_settings_before_parent', function() {

		BBAQMSelf::assetInstall([
			'rel'  => 'stylesheet',
			'type' => 'text/css',
			'href' =>  '/wp-content/plugins/bbacoursematchquiz/public/css/bootstrap.min.css'
		], 'style');
		BBAQMSelf::lounch();
		BBAQMSelf::assetInstall([
			'rel'  => 'stylesheet',
			'type' => 'text/css',
			'href' =>  '/wp-content/plugins/bbacoursematchquiz/public/css/bbacoursematchquiz-public.css'
		], 'style');
		BBAQMSelf::lounch();
		BBAQMSelf::assetInstall([
			'type' => 'text/javascript',
			'id'   => 'script_id',
			'src'  =>  '/wp-content/plugins/bbacoursematchquiz/public/js/bbacoursematchquiz-public.js'
		]);
		BBAQMSelf::lounch();
	});   

	add_action( 'bba_qm_add_settings_after_child_parent', function() {

		print(BBAQMSelf::BBABranding());
			 
	 });

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
			 'redirect'  => 'http://localhost/bba/quiz-match/?bba-qm-pg1', 
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

        BBAQuizMatchPageURL::setURL('bba-qm-pg1');
   
       if(BBAQuizMatchPageURL::URL() == true ) {

		add_action( 'bba_qm_add_settings_bottom_child_row_parent', function() {
					
			BBAQMSelection::BBAaddCol1Content([	
			  'target'    => 'bba_qm2b_form', 
			  'origin'    => 'http://localhost/bba/?begin',
			  'redirect'  => 'http://localhost/bba/?bba-qm-pg2', 
			  'question'  => "I have some experience",
			  'selection' =>  [0,1,0,3] 
	
			],'lg');
			BBAQMSelection::addColContent();
				 
		 });

           BBAQMSelection::BBATemplate('1-col' , ['box-md' , 'bba_mq'] ); 
           BBAQMSelection::BBAaddCol1Content([
               
             'target'    => 'bba_qm2a_form', 
             'origin'    => 'http://localhost/bba/?begin',
             'redirect'  => 'http://localhost/bba/?bba-qm-pg2', 
             'question'  => "I am brand new to lashing",
             'selection' =>  [1,2,1,0] 
             
           ],'lg', function() {
   
              $html  = '';
              $html .= '<h3>Which best describes you?</h3>';

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
        
        BBAQuizMatchPageURL::setURL('bba-qm-pg2');

        if(BBAQuizMatchPageURL::URL() == true ) {

			add_action( 'bba_qm_add_settings_bottom_child_row_parent', function() {
					
				BBAQMSelection::BBAaddCol1Content([	
				  'target'    => 'bba_qm2b', 
				  'origin'    => 'http://localhost/bba/?begin',
				  'redirect'  => 'http://localhost/bba/?bba-qm-pg3', 
				  'question'  => "I want to try it out as a hobby.",
				  'selection' =>  [2,0,1,0] 
		
				],'lg');
				BBAQMSelection::addColContent();
					 
			 });

            BBAQMSelection::BBATemplate('1-col' , ['box-md' , 'bba_mq'] ); 
            BBAQMSelection::BBAaddCol1Content([
                
              'target'    => 'bba_qm2a', 
              'origin'    => 'http://localhost/bba/?begin',
              'redirect'  => 'http://localhost/bba/?bba-qm-pg3', 
              'question'  => "I want to make lashing my career!",
              'selection' =>  [0,2,1,0] 
              
            ],'lg', function() {

              $html  = '';
              $html .= '<h3>What are your lash goals?</h3>';

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
      
		   BBAQuizMatchPageURL::setURL('bba-qm-pg3');

        if(BBAQuizMatchPageURL::URL() == true ) {

			add_action( 'bba_qm_add_settings_bottom_child_row_parent', function() {
					
				BBAQMSelection::BBAaddCol1Content([	
				  'target'    => 'bba_qm2b', 
				  'origin'    => 'http://localhost/bba/?begin',
				  'redirect'  => 'http://localhost/bba/?bba-qm-pg4', 
				  'question'  => "No supplies yet!",
				  'selection' =>   [2,2,0,0] 
		
				],'lg');
				BBAQMSelection::addColContent();
					 
			});

            BBAQMSelection::BBATemplate('1-col' , ['box-md' , 'bba_mq'] ); 
            BBAQMSelection::BBAaddCol1Content([
                
              'target'    => 'bba_qm2a', 
              'origin'    => 'http://localhost/bba/?begin',
              'redirect'  => 'http://localhost/bba/?bba-qm-pg4', 
              'question'  => "Yup! I've got tweezers adhesive, lash extensions & more.",
              'selection' =>  [0,0,3,3] 
              
            ],'lg', function() {

              $html  = '';
              $html .= '<h3>Do you currently own any lash supplies?</h3>';

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
      
	BBAQuizMatchPageURL::setURL('bba-qm-pg4');

	if(BBAQuizMatchPageURL::URL() == true ) {

		BBAQMSelection::BBATemplate('1-col' , ['box-md' , 'bba_mq'] ); 
		BBAQMSelection::BBAaddEmailContent([
			
		  'target'    => 'bba_qm2a', 
		  'redirect'  => 'http://localhost/bba/?begin', 
		  'question'  => "I want to receive emails from Beauty Boss Academy",
		  'selection' =>  [1,2,3,4],

		  
		],'lg', function() {

		  $html  = '';
		  $html .= '<h2>Almost There!</h2>';
		  $html .= '<h4>What is your email address?</h4>';

		  return($html);

		});
	
		BBAQMSelection::execute();  

   }

  } else {
  echo "WP Plugin: BBA Quiz Match was removed or deactivated";
  }
 
});