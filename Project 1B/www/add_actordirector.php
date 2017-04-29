<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Project 1B</title>
  <link href="style.css" type="text/css" rel="stylesheet" media="all">
  <link href="bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
  <link href="bootstrap.min.js" type="text/css" rel="stylesheet" media="all">
  <link href="jquery-3.2.1.min.js" type="text/css" rel="stylesheet" media="all">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
   <!-- Navbar -->
    <div class="navbar navbar-inverse navbar-static-top center" role="navigation">
        <div class="container">

          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
              <a href="index.php">
                <div class="navbar-brand">
                  CS 143
                  <small>Project 1B</small>
                </div>
              </a>
          </div>

          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Add New Content<b class="caret"></b></a>
                <ul class="dropdown-menu dropdown-menu-left">
                  <li><a href="add_actordirector.php">Add Actor/Director</a></li>
                  <li><a href="add_movie.php">Add Movie Information</a></li>
                  <li><a href="add_movieactor.php">Add Movie/Actor Relation</a></li>
                  <li><a href="add_moviedirector.php">Add Movie/Director Relation</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Browsing Content<b class="caret"></b></a>
                <ul class="dropdown-menu dropdown-menu-left">
                  <li><a href="show_actor.php">Show Actor Information</a></li>
                  <li><a href="show_movie.php">Show Movie Information</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search Interface<b class="caret"></b></a>
                <ul class="dropdown-menu dropdown-menu-left">
                  <li><a href="search.php">Search Actor/Movie</a></li>
                </ul>
              </li>
            </ul>
          </div>

        </div>
      </div>
  <!-- End Navbar -->

  <!-- Section -->
  <div class="container" style="margin-left: 0">
    <div class="row">

      <div class="col-sm-3 col-md-3 sidebar">
        <ul class="nav nav-sidebar">
            <h3>Add New Content</h3>
            <li><a href="add_actordirector.php">Add Actor/Director</a></li>
            <li><a href="add_movie.php">Add Movie Information</a></li>
            <li><a href="add_movieactor.php">Add Movie/Actor Relation</a></li>
            <li><a href="add_moviedirector.php">Add Movie/Director Relation</a></li>
          </ul>

          <ul class="nav nav-sidebar">
            <h3>Browsing Content</h3>
            <li><a href="show_actor.php">Show Actor Information</a></li>
            <li><a href="show_movie.php">Show Movie Information</a></li>
          </ul>

          <ul class="nav nav-sidebar">
            <h3>Search Interface</h3>
            <li><a href="search.php">Search Actor/Movie</a></li>
          </ul>
      </div>

      <div class="col-sm-9 col-md-9" style="padding-left: 5%">
        <form action="add_actordirector.php" method="GET">
          <h3>Add New Actor/Director</h3>
          <label class="radio-inline">
            <input type="radio" name="identity" value="Actor" checked="checked">Actor</input>
          </label>
          <label class="radio-inline">
            <input type="radio" name="identity" value="Director">Director</input>
          </label>
          <div class="form-group">
             <label for="first_name">First Name</label>
            <input type="text" class="form-control" placeholder="Text Input" name="fname">
          </div>
          <div class="form-group">
             <label for="last_name">Last Name</label>
            <input type="text" class="form-control" placeholder="Text Input" name="lname">
          </div>
          <label class="radio-inline">
            <input type="radio" name="sex" value="Male" checked="checked">Male</input>
          </label>
          <label class="radio-inline">
            <input type="radio" name="sex" value="Female">Female</input>
          </label>
          <div class="form-group">
             <label for="first_name">Date of Birth</label>
            <input type="text" class="form-control" placeholder="Text Input" name="DOB">
            <p>ie: 1997-05-05</p>
          </div>
          <div class="form-group">
             <label for="last_name">Date of Death</label>
            <input type="text" class="form-control" placeholder="Text Input" name="DOD">
            <p>(leave blank if alive now)</p>
          </div>
          <button type="submit" class="btn btn-default" name="btnSubmit">Add</button>
        </form>
	<br>
        <?php 
          $db_connection = mysql_connect("localhost", "cs143", "");
          mysql_select_db("CS143", $db_connection);
	  
	  // get maxperson id
	  $rs = mysql_query("SELECT id FROM MaxPersonID", $db_connection);
	  if(!$rs) {
	   die("Query failed: " . mysql_error());
	  }
	  $row = mysql_fetch_row($rs);
	  $MaxPersonID = $row[0];
	   
	  // create new unique ID
	  $new_id = $MaxPersonID + 1;
  
	  // create insertion query
          $identity = $_GET["identity"];
          $sex = "\"" . $_GET["sex"] . "\"";
	  $fname = "\"" . $_GET["fname"] . "\"";
	  $lname = "\"" . $_GET["lname"] . "\"";
	  $dob = "\"" . $_GET["DOB"] . "\"";
	  $dod = "\"" . $_GET["DOD"] . "\"";
	  if($dod == "\"\"") $dod = "null";
	  $query = "INSERT INTO " . $identity . " VALUES(" . $new_id . "," . $lname . "," . $fname . "," . $sex . "," . $dob . "," . $dod . ")";

	  // insert into databas
	  if(isset($_GET["btnSubmit"])) {
	   if(!$fname) {
	    echo "Query failed: first name is empty.<br>";
	   }
	   if(!$lname) {
	    echo "Query failed: last name is empty.<br>";
	   }
	   if(!$dob) {
	    echo "Query failed: date of birth is empty.<br>";
	   }
	   if($fname && $lname && $dob) {
	    $rs = mysql_query($query, $db_connection);
	    if(!rs) {
	     die("Query failed: " . mysql_error());
	    }
	    else {
	     echo "Successfully insert into database.";

	     // update maxperson id
	     mysql_query("UPDATE MaxPersonID SET id=" . $new_id, $db_connection);
	    }
	  }
          mysql_close($db_connection);
	 }
        ?>
      </div>
    </div>
  </div>


</body>

</html>
