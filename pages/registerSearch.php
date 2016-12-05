<h1 class="p-t-2 m-l-1">Search</h1>
<div class="row">
  <div class="col-xl-6 col-lg-12 homeLinks">
  <div id="cal"></div>
  </div> 

  <div class="col-xl-6 col-lg-12 homeLinks">
    <form>
        <div class="form-group">
        <label for="formGroupExampleInput">Search</label>
          <input type="text" class="form-control" id="form" placeholder="PSY">
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
        </tr>
      </thead>
      <tbody id="results">
      <!-- Gets edited here -->
      </tbody>
    </table>  
  </div>
</div>

<script type="text/javascript">
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
          document.getElementById("results").appendChild(trNode);
        }
    })
  }
}
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
  events[1][4] = "1830pm";
  events[1][5] = "CSB101";
  events[2] = [];
  events[2][0] = "Friday";
  events[2][1] = "1500pm";
  events[2][2] = "CSC170";
  events[2][3] = "orange";
  events[2][4] = "1830pm";
  events[2][5] = "CSB101";
  var prettyCal = new PrettyCalendar(events, "cal", false);
</script>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
