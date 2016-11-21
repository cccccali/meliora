
    <div class="col-md-12 homeLinks">
      <div class="row">
        <div class="col-md-5">
          <h1>Search</h1>
        </div>
      </div>
      <form>
        <div class="form-group">
          <label for="formGroupExampleInput">Search</label>
          <input type="text" class="form-control" id="form" placeholder="CSC 219">
        </div>
      </form> 
      <input type="button" id="searchButton" onclick="search()" value="Submit"/>  
      <div class="container">
        <div id="results" class="row">
        </div>
      </div> 
      <footer> 
        <div class="col-md-5">
          <p> &copy; Meliorats, CSC 210</p>
        </div>
      </footer>
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
		  url: "apirequest.php",
		  data: {"string": encodeURIComponent(string), "index": i},
		  type: "GET",
		  context: document.body,
		  success: function( result ) {
		  	var node = document.createElement("p");
		    var textnode = document.createTextNode(result);
		    node.appendChild(textnode);
		    document.getElementById("results").appendChild(node);
	      }
  	})
	}
}
</script>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
       

