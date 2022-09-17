# BBACourseMatchQuiz
Exclusive BBA Course Match Quiz Micro Plugin 

```PHP
 // Front End Approach 
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
