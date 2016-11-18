
 <?php 
  $user = new user();
?>

<div class="col-md-12 homeLinks personalInfo">
  
    <div class="row">
    <div class="col-md-5">
          <h1>Personal Information</h1>
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
                <td><?php echo($user->data()->student_id) ?></td>
                <td>SR</td>
                <td>N</td>
                <td>Y</td>
                

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
                <th>Time</th>
                <th>Major(s)</th>
                <th> Minor(s) </th> 
                
                <!--th>Ins 1</th>
                <th>Ins 2</th-->
                <th> Advisor</th> 
              </tr>
            </thead>
            <tbody>
             <tr>
                <td>BS</td>
                <td>Y</td>
                <td>School of ENG & Applied Science</td>
                <td>F</td>
                <td>CSC</td>
                <td>Dance</td>
                <td><a  href = "#" data-toggle= "tooltip" title="JohnD@u.rochester.edu">PAWLICKI, TED F.</a></td> 
              </tr>
          </tbody>
        </table>
        <p> * Official: indicates whether you are officially accepted as a candidate in the degree program. </p> 
        <p> * Contact your school's registrar if there are errors in your personal information.</p> 
            </div>
          </div>
        

       
      <footer> 
        <div class="col-md-5">
            <p> &copy; Meliorats, CSC 210</p>
      </div>
      </footer>
   </div> 

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>


       
