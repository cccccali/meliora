<h1 class="p-t-2 m-l-1">View Schedule</h1>
<div class="row">
  <div class="col-xl-6 col-lg-12 homeLinks">
  <div id="cal"></div>
  </div>
  <div class="col-xl-6 col-lg-12 homeLinks">
    <table class = "table table-striped">
      <thead>
        <tr>
          <th>Course ID</th>
          <th>Course</th>
          <th> Professor</th>
          <th>Time</th>
          <th>Location</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>00001</td>
          <td>CSC170</td>
          <td><a  href = "#" data-toggle= "tooltip" title="JohnD@u.rochester.edu">John Doe</a></td> <!--Add link for the professor at RateMyprofessor or Evaluation!-->
          <td>MWF</td>
          <td>CSB101</td>
        </tr>
        <tr>
          <td>00001</td>
          <td>CSC170</td>
          <td><a  href = "#" data-toggle= "tooltip" title="JohnD@u.rochester.edu">John Doe</a></td> 
          <td>MWF</td>
          <td>CSB101</td>
        </tr>
        <tr>
          <td>00001</td>
          <td>CSC170</td>
          <td><a  href = "#" data-toggle= "tooltip" title="JohnD@u.rochester.edu">John Doe</a></td> 
          <td>MWF</td>
          <td>CSB101</td>
        </tr>
        <tr>
          <td>00001</td>
          <td>CSC170</td>
          <td><a  href = "#" data-toggle= "tooltip" title="JohnD@u.rochester.edu">John Doe</a></td> 
          <td>MWF</td>
          <td>CSB101</td>
        </tr>
        <tr>
          <td>00001</td>
          <td>CSC170</td>
          <td><a  href = "#" data-toggle= "tooltip" title="JohnD@u.rochester.edu">John Doe</a></td> 
          <td>MWF</td>
          <td>CSB101</td>
        </tr>
      </tbody>
    </table>  
  </div>
</div>
<script>
//tooltip
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
  });
</script>
<script>

  /*
  *
  * STANDARD EVENT ARRAY - ONE ARRAY WHICH CONTAINS INDIVIDUAL EVENT ARRAYS
  * INDIVIDUAL EVENTS ARRAYS CONTAIN STRINGS W/ THE FOLLOWING:
  * [dayOfWeek, standardTime, eventTitle, backgroundColor]
  *
  */

  var events = [];
  events[0] = [];
  events[0][0] = "Wednesday";
  events[0][1] = "1500";
  events[0][2] = "CSC170";
  events[0][3] = "orange";
  events[0][4] = "1830";
  events[0][5] = "CSB101";
  events[1] = [];
  events[1][0] = "Monday";
  events[1][1] = "1500";
  events[1][2] = "CSC170";
  events[1][3] = "orange";
  events[1][4] = "1830";
  events[1][5] = "CSB101";
  events[2] = [];
  events[2][0] = "Friday";
  events[2][1] = "1500";
  events[2][2] = "CSC170";
  events[2][3] = "orange";
  events[2][4] = "1830";
  events[2][5] = "CSB101";
  var prettyCal = new PrettyCalendar(events, "cal", false);
</script>