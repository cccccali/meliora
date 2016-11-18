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
    <input type="button" id="searchButton" onclick="search()" value="Submit"/>  
  </form> 
  <div class="container">
    <div id="results" class="row">
      <div class="col-xs-12 col-sm-6">
        Title: CSC 173 Computational and Formal Systems
      </div>
    </div>
  </div> 
</div> 
<script type="text/javascript">
  function search() { 
    var queryString = document.getElementById("form").value;
    console.log(document.getElementById("form").value);
    $.ajax({
      type: "GET",
      dataType: 'json',
      url: "http://www.skedgeur.com/api/courses/?q=" + queryString,
      async: false,
      contentType: "application/json; charset=utf-8",
      success: function (msg) {
        console.log(msg); // Modify the DOM with contents of each JSON element of each class                
      }
    });   
  }
</script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
       

