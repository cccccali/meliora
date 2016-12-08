<h1 class="p-t-2 m-l-1">View Schedule</h1>
<div class="row">
  <div class="col-xl-6 col-lg-12 homeLinks">
  <div id="cal"></div>
  </div>
  <div class="col-xl-6 col-lg-12 homeLinks">
    <table class = "table table-striped">
      <thead>
        <tr>
          <th>Course</th>
          <th>Description</th>
          <th>Department</th>
          <th>Course Number</th>
          <th>Time</th>
        </tr>
      </thead>
      <tbody id="results">
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

  <?php
    // $data = DB::getInstance()->get("enrollments", array('student_id', '=', "{$user->data()->student_id}"));
    // if($data->count()){
    //   foreach($data->results() as $datum){
    //     $sections = DB::getInstance()->get("sections", array('crn', '=', "{$datum->course_id}"));
    //     if($sections->count()){
    //       foreach ($sections->results() as $section){
    //         $courses = DB::getInstance()->get("courses", array('course_id', '=', "{$section->course_id}"));
    //         echo $section->course_id;
    //         echo $courses->count();
    //         //echo $courses->results()->first()->course_id;
    //       }
    //     }
    //   }
    // }
  ?>

<script>

var events = [];
events[0] = [];
$.ajax({
    url: "../classes/enroll.php?",
    type: "POST",
    context: document.body,
    success: function( result ) {
      console.log(result);
      $.ajax({
        url: "../classes/apirequest.php",
        data: {"string": encodeURIComponent(result), "index": 0},
        type: "GET",
        context: document.body,
        success: function( result ) {
          var data_array = $.parseJSON(result);
          console.log(data_array);
          if (data_array[0] != null) {
            var trNode = document.createElement("tr");
            var tdNode = document.createElement("td");
            var textnode = document.createTextNode(data_array[0]);
            tdNode.appendChild(textnode);
            trNode.appendChild(tdNode);
            var tdNode = document.createElement("td");
            var textnode = document.createTextNode(data_array[1]);
            tdNode.appendChild(textnode);
            trNode.appendChild(tdNode);
            var tdNode = document.createElement("td");
            var textnode = document.createTextNode(data_array[2]);
            tdNode.appendChild(textnode);
            trNode.appendChild(tdNode);
            var tdNode = document.createElement("td");
            var textnode = document.createTextNode(data_array[3]);
            tdNode.appendChild(textnode);
            trNode.appendChild(tdNode);
            var tdNode = document.createElement("td");
            var textnode = document.createTextNode(data_array[4][0][1] + ", " + data_array[4][0][2]);
            tdNode.appendChild(textnode);
            trNode.appendChild(tdNode);
            document.getElementById("results").appendChild(trNode);

            var day = data_array[4][0][1];
            var time = data_array[4][0][2];

            for (var i = 0, len = day.length; i < len; i++) {
              switch (day[i]) {
                case "M":
                  events[0][0] = "Monday";
                case "T":
                  events[0][0] = "Tuesday";
                case "W":
                  events[0][0] = "Wednesday";
                case "R":
                  events[0][0] = "Thursday";
                case "F":
                  events[0][0] = "Friday";
                default:

              }
            }

            events[0][1] = time.split("-")[0];
            events[0][4] = time.split("-")[1];
            events[0][3] = "orange";
            events[0][2] = data_array[0];
            var prettyCal = new PrettyCalendar(events, "cal", false);
        };
      }});
    }});

</script>
