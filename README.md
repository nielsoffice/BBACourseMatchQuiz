# BBACourseMatchQuiz
Exclusive BBA Course Match Quiz Micro Plugin 

```PHP
 // Front End Base or Primary Approach 
 // Adding Question Column base on b5 Framework BBA Quiz Match approach
 if (class_exists('BbaQMCourse')) {
  
   BbaQMCourse::BBATemplate('3-col' , ['breakPoint' , 'parentId'] ); : [ 'colType', [parentBreakPoint, 'parentId'] ]
   BbaQMCourse::BBAaddCol1Content( selection: [],' breakpoint: lg', content: function() {
     return 'test';
   });
   BbaQMCourse::BBAaddCol2Content( [],'sm',function() {
     return 'test col 2';
   });
   BbaQMCourse::BBAaddCol3Content( [],'sm', function() {
     return 'test col 3';
   });
   BbaQMCourse::execute(); 
  
 } else {
   echo "WP Plugin: BBA Quiz Match was removed or deactivated";
 }
```

```HTML
 <!-- front end rendered --> 
 <div id="parentId" class="container-fluid bbafluid">
    <div class="container-fluid bba-box">
      <div class="row bbarow">
                     
      <div class="col-lg">test</div>             
      <div class="col-sm">test col 2</div>
      <div class="col-sm">test col 3</div>
    
      </div>
    </div>
 </div>
```

```PHP
// Init action then run custom selection!
add_action('init', function() {
   
  if (class_exists('BBAQMSelection')) {
       
     // Initialize Custom Page URL
     BBAQuizMatchPageURL::setURL('?this-1');

    if(BBAQuizMatchPageURL::URL() == true ) {
   
       BBAQMSelection::BBATemplate('1-col' , ['box-md' , 'bba_activate_page'] ); 
       BBAQMSelection::BBAaddCol1Content([
                  
         'target'    => '#bba_qm_begin', 
         'redirect'  => 'http://localhost/bba/quiz-match/?bba-qm-pg1', 
         'question'  => 'Have you try?',
         'selection' =>  [ ] 
                
       ],'lg', function() {
      
          $html  = '';
          $html .= '<h3>Which BBA course is right for me?</h3>';
          $html .= '<p>Take the quiz to be matched with your perfect lash journey!</p>';

          return($html);

        });
        BBAQMSelection::execute();  
     }

   }  else {
      echo "WP Plugin: BBA Quiz Match was removed or deactivated";
   }     
    
});
```

```PHP
  # Using BBATemplate Hooks 
   - bba_qm_top_add_settings_before_parent
   - bba_qm_add_settings_before_child_parent
   - bba_qm_add_settings_after_child_parent
   - bba_qm_add_settings_after_child_row_parent
   - bba_qm_add_settings_bottom_child_row_parent
   - bba_qm_add_settings_bottom_child_parent
   - bba_qm_add_settings_after_bottom_child_parent
   - bba_qm_add_settings_after_bottom_parent

  # Hook Reference:
  - Plugin/admin/class-bbacoursematchquiz-quiz-match.php

  # functions.php file
  add_action('init', function() {
  
  BBAQuizMatchPageURL::setURL('bba-qm-pg');

  if(BBAQuizMatchPageURL::URL() == true ) {

    add_action( 'bba_qm_add_settings_before_child_parent', function() {
                    
	echo "hookS@"; 
	
    });
  
  }

});

```
