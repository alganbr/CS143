<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Project 1B</title>
    <link href="style.css" type="text/css" rel="stylesheet" media="all">
    <link href="bootstrap.min.css" type="text/css" rel="stylesheet" media="all">
    <link href="bootstrap.min.js" type="text/css" rel="stylesheet" media="all">
    <script src="jquery-2.2.4.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

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
                <li><a href="add_review.php">Add Review</a></li>
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
            <li><a href="add_review.php">Add Review</a></li>
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
          <form action="add_review.php" method="GET">
            <h3>Add Review</h3>
            <div class="form-group">
              <label for="first_name">Reviewer Name</label>
              <input type="text" class="form-control" placeholder="Text Input" name="rname">
            </div>
            <div class="form-group">
              <label for="movieid">Movie</label>
              <select class="form-control" name="movieid">
                <?php
                  $mid = $_POST["mid"];
                  if (!$mid)
                    echo "<option value=\"\" selected></option>";
                  else
                    echo "<option value=\"\"></option>";

                  $db_connection = mysql_connect("localhost", "cs143", "");
                  mysql_select_db("CS143", $db_connection);

                  $movie_query = mysql_query("SELECT id, title, year FROM Movie ORDER BY title ASC", $db_connection);
                  if(!$movie_query) {
                    die("Query failed: " . mysql_error());
                  }
                  $movie_count = mysql_num_rows($movie_query);

                  while($row = mysql_fetch_assoc($movie_query)){
                    $movies[] = array($row["id"], $row["title"], $row["year"]);
                  }
                  for ($i = 0; $i < $movie_count; $i++) {
                    $cur = $movies[$i];
                    if ($cur[0] == $mid)
                      echo "<option value=\"" . $cur[0] . "\" selected>" . $cur[1] . " (" . $cur[2] . ")</option>";
                    echo "<option value=\"" . $cur[0] . "\">" . $cur[1] . " (" . $cur[2] . ")</option>";
                  }
                ?>
              </select>
            </div>
            <label class="radio-inline">
              <input type="radio" name="rating" value="1" checked="checked">1</input>
            </label>
            <label class="radio-inline">
              <input type="radio" name="rating" value="2">2</input>
            </label>
            <label class="radio-inline">
              <input type="radio" name="rating" value="3">3</input>
            </label>
            <label class="radio-inline">
              <input type="radio" name="rating" value="4">4</input>
            </label>
            <label class="radio-inline">
              <input type="radio" name="rating" value="5">5</input>
            </label>
            <div class="form-group">
              <label for="DOB">Comment</label><br />
              <textarea name="comment" cols="60" rows="8"></textarea>
            </div>
            <button type="submit" class="btn btn-default" name="btnSubmit">Add</button>
          </form>
          <br>
          <?php 
            $db_connection = mysql_connect("localhost", "cs143", "");
            mysql_select_db("CS143", $db_connection);
    
            // create insertion query
            $rname = $_GET["rname"];
            $movieid = $_GET["movieid"];
            $rating = $_GET["rating"];
            $comment = $_GET["comment"];
            
            // insert into database
            if(isset($_GET["btnSubmit"])) {
              if(!$rname)
                echo "Query failed: reviewer name is empty.<br>";

              if(!$movieid)
                echo "Query failed: movie is not selected.<br>";

              if(!$comment)
                echo "Query failed: comment is empty.<br>";

              if ($rname && $movieid && $comment) {
                $query = "INSERT INTO Review VALUES(\"" . $rname . "\", now() ," . $movieid . "," . $rating . ",\"" . $comment . "\")";
                $rs = mysql_query($query, $db_connection);
                if(!$rs)
                  die("Query failed: " . mysql_error());
                else
                  echo "Add Review Success";
              }
              mysql_close($db_connection);
            }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
