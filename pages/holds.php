 <?php 
  $dataHold= DB::getInstance()->get("holds", array('student_id', '=', "{$user->data()->student_id}")); //here is where we load any previously saved data from the database
   if($dataHold->count()){
    #what does this mean? count of the array?
     $studentHold = $dataHold->first(); //you can echo this member of this set anywhere on the page
    
   } else {
     #echo "We have no data for this user"; 
   }
 ?>
<div class="col-md-12 homeLinks">  
  <div class="row">
    <div class="col-md-5">
      <h1>Holds</h1>
      <table class = "table table-bordered table ">
        <thead>
          <tr>
            <th>Reason </th>
            <th>Contact</th>
          </tr>
        </thead>
        <tbody>
         <tr>
            <td><?php echo($studentHold->reason)?></td>
            <td><?php echo($studentHold->contact)?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>  

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>


       
