<h1 class="p-t-2 m-l-1">Register & Search</h1>
<div class="row">
  <div class="col-xl-6 col-lg-12">
  <div id="cal"></div>
  </div>
  <div class="col-xl-6 col-lg-12">
    <form>
        <div class="form-group">
          <label for="formGroupExampleInput">Search</label>
          <input type="text" class="form-control" id="form" placeholder="CSC 173">
        </div>
      </form>
      <input type="button" id="searchButton" onclick="search()" value="Submit"/>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Course Title</th>
          <th>Description</th>
          <th>Department</th>
          <th>Course ID</th>
          <th>Time</th>
          <th>Add Course</th>
        </tr>
      </thead>
      <tbody id="results">
      <!-- Gets edited here -->
      </tbody>
    </table>
  </div>
</div>

<script type="text/javascript">

function register(crn) {
  console.log("Register pressed");
  $.ajax({
      url: "../classes/addCourse.php?crn="+crn+"&id=<?php echo ($user->data()->student_id)?>",
      type: "POST",
      context: document.body,
      success: function( result ) {
        console.log(result);
  }});
}

function search() {
  var node = document.getElementById("results");
  while (node.hasChildNodes()) {
    node.removeChild(node.lastChild);
  }
  var queryString = document.getElementById("form").value;
  var string = document.getElementById("form").value;

  for (var i = 0; i < 20; i++) {
    $.ajax({
      url: "../classes/apirequest.php",
      data: {"string": encodeURIComponent(string), "index": i},
      type: "GET",
      context: document.body,
      success: function( result ) {
        var data_array = $.parseJSON(result);
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
          var textnode = document.createTextNode(data_array[4]);
          tdNode.appendChild(textnode);
          trNode.appendChild(tdNode);

          for (i = 0; i < data_array[4].length; i++) {
            var string = "Add Course" + "\n #" + data_array[4][0][0];
            var tdNode = document.createElement("td");
            var btn = document.createElement("BUTTON");
            btn.onclick = function() { register(); };
            var t = document.createTextNode(string);
            btn.appendChild(t);
            tdNode.appendChild(btn);
            trNode.appendChild(tdNode);
          }

          document.getElementById("results").appendChild(trNode);

        }
      }
    })
  }
}

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

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
