# BBACourseMatchQuiz
Exclusive BBA Course Match Quiz Micro Plugin 

```PHP
 // Front End Base or Primary Approach 
 // Adding Question Column base on b5 Framework BBA Quiz Match approach
 BbaQMCourse::BBATemplate('3-col' , ['breakPoint' , 'parentId'] ); : [ 'colType', [parentBreakPoint, 'parentId'] ]
 BbaQMCourse::BBAaddCol1Content( selection: '',' breakpoint: lg', content: function() {
   return 'test';
 });
 BbaQMCourse::BBAaddCol2Content('','sm',function() {
   return 'test col 2';
 });
 BbaQMCourse::BBAaddCol3Content('','sm', function() {
   return 'test col 3';
 });
 BbaQMCourse::execute(); 
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
 // New Request Selection and page redirect!
 BbaQMCourse::BBATemplate('1-col' , ['xl' , 'newSelectionPage'] ); 
 BbaQMCourse::BBAaddCol1Content([
     
    'target'          => ['#btn_iD'],    // btn must be click to process
    'redirect'        => ['https://www.domain.com/quiz-match/?bba-qm-pg2'],  // page redirect after processing
    'Have you try?'   => [ 1 , 0 , 2 , 1],
    // can add more here .... 
    'Don\'t even try!' => [ 1 , 0 , 2 , 1],

  ],'lg', function() {
    return '<h1>New Selection Request!</h1>';
 });
 BbaQMCourse::execute(); 
```
