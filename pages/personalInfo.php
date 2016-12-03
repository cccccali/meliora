 <?php 
 
  $dataStudent= DB::getInstance()->get("personal_info", array('student_id', '=', "{$user->data()->student_id}")); //here is where we load any previously saved data from the database
   if($dataStudent->count()){
    #what does this mean? count of the array?
     $studentInfo = $dataStudent->first(); //you can echo this member of this set anywhere on the page
    
   } else {
     #echo "We have no data for this user"; 
   }

  $dataMajor= DB::getInstance()->get("degree_programs", array('student_id', '=', "{$user->data()->student_id}")); //here is where we load any previously saved data from the database
   if($dataMajor->count()){
     $studentMajor = $dataMajor->first(); //you can echo this member of this set anywhere on the page 
   } else {
     #echo "We have no data for this user"; 
   }
?>

<div class="col-md-12 homeLinks personalInfo">
  
    <div class="row">
    <div class="col-md-5">
          <h1>Personal Information</h1>
          <h3 class="degreePadding"> Student Information: </h3> 
          <table class = "table table-bordered table ">
            <thead>
              <tr>
                <th>Student ID: </th>
                <th>Classification</th>
                <th>Citizenship</th>
                <th>Visa</th>
              </tr>
            </thead>
            <tbody>
             <tr>
                <td><?php echo($studentInfo->student_id)?></td>
                <td><?php echo($studentInfo->classification)?></td>
                <td><?php echo($studentInfo->citizenship)?></td>
                <td><?php echo($studentInfo->visa)?></td>
              </tr>
          </tbody>
        </table>
        <h3 class="degreePadding"> Degree Programs: </h3> 

        <table class = "table table-bordered table ">
            <thead>
              <tr>
                <th>Prog</th>
                <th>Off*</th>
                <th> College</th>
                <th>Gender</th>
                <th>Major(s)</th>
                <th> Minor(s) </th> 
                <th> Advisor</th> 
              </tr>
            </thead>
            <tbody>
             <tr>
                <td><?php echo($studentMajor->program)?></td>
                <td><?php echo($studentMajor->official)?></td>
                <td><?php echo($studentMajor->college)?></td>
                <td><?php echo($studentMajor->gender)?></td> <!--should be sex--> 
                <td><?php echo($studentMajor->majors)?></td>
                <td><?php echo($studentMajor->minors)?></td>
                <td><?php echo($studentMajor->advisor)?></td> 
              </tr>
          </tbody>
        </table>
        <p> * Official: indicates whether you are officially accepted as a candidate in the degree program. </p> 
        <p> * Contact your school's registrar if there are errors in your personal information.</p> 
            </div>
          </div>
        
</div> 

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>


       
