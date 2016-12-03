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
  var events = [];
  events[0] = [];
  events[0][0] = "Tuesday";
  events[0][1] = "3:00pm";
  events[0][2] = "Just a sample event"
  events[0][3] = "#c0c0c0";
  events[1] = [];
  events[1][0] = "Monday";
  events[1][1] = "12:00pm";
  events[1][2] = "Another event"
  events[1][3] = "#8FD8D8";
  events[2] = [];
  events[2][0] = "Thursday";
  events[2][1] = "5:00pm";
  events[2][2] = "This is what happens when"
  events[2][3] = "orange";
  events[3] = [];
  events[3][0] = "Thursday";
  events[3][1] = "5:30pm";
  events[3][2] = "two events are side by side"
  events[3][3] = "purple";
  var prettyCal = new PrettyCalendar(events, "cal", false);
</script>

<script type="text/javascript">
function register() {
  console.log("Register pressed");
  $.ajax({
      url: "../classes/addCourse.php",
      data: {"crn": "49698"},
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

          var tdNode = document.createElement("td");
          var btn = document.createElement("BUTTON");
          btn.onclick = function() { register(); };
          var t = document.createTextNode("Add Course");
          btn.appendChild(t);
          tdNode.appendChild(btn);
          trNode.appendChild(tdNode);

          document.getElementById("results").appendChild(trNode);

        }
      }
    })
  }
}
</script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
      