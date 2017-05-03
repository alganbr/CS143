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

        <div class="col-md-3 sidebar">
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
        <div class="col-md-9">
          <form action="add_movie.php" method="GET" style="margin-left: 5%">
            <h3>Add New Movie</h3>
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" placeholder="Text Input" name="title">
            </div>
            <div class="form-group">
              <label for="company">Company</label>
              <input type="text" class="form-control" placeholder="Text Input" name="company">
            </div>
            <div class="form-group">
              <label for="year">Year</label>
              <input type="text" class="form-control" placeholder="Text Input" name="year">
            </div>
            <div class="form-group">
              <label for="rate">MPAA Rating</label>
              <select class="form-control" name="rate">
                <?php
                  $db_connection = mysql_connect("localhost", "cs143", "");
                  mysql_select_db("CS143", $db_connection);

                  $mpaa_query = mysql_query("SELECT DISTINCT(rating) FROM Movie ORDER BY rating ASC", $db_connection);
                  if(!$mpaa_query) {
                    die("Query failed: " . mysql_error());
                  }

                  while($row = mysql_fetch_row($mpaa_query)){
                    echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="genre">Genre:</label>
              <?php
                $genre_query = mysql_query("SELECT DISTINCT genre FROM MovieGenre ORDER BY genre", $db_connection);
                if(!$genre_query) {
                  die("Query failed: " . mysql_error());
                }
                $genre_count = mysql_num_rows($genre_query);

                while($row = mysql_fetch_assoc($genre_query)){
                  $genres[] = $row["genre"];
                }
                for ($i = 0; $i < $genre_count; $i++) {
                  $cur = $genres[$i];
                  echo ("<input type='checkbox' name='genre[]' value='" . $cur . "'> " . $cur . "</input> ");
                }
              ?> 
            </div>
            <button type="submit" class="btn btn-default" name="btnSubmit">Add</button>
          </form>
          <br>
          <?php
            $movieid = mysql_query("SELECT id FROM MaxMovieID", $db_connection);
            if(!$movieid)
              die("Query failed: " . mysql_error());
            $row = mysql_fetch_row($movieid);
            $MaxMovieID = $row[0];
            // create new unique ID
            $new_id = $MaxMovieID + 1;

            // create insertion query
            $title = "\"" . $_GET["title"] . "\"";
            $company = "\"" . $_GET["company"] . "\"";
            $year = $_GET["year"];
            $rate = "\"" . $_GET["rate"] . "\"";
            $genre_get = $_GET["genre"];

            // insert into database
            if(isset($_GET["btnSubmit"])) {
              if(!$title)
                echo "Query failed: title is empty.<br>";

              if(!$company)
                echo "Query failed: company is empty.<br>";

              if(!$year)
                echo "Query failed: year is empty.<br>";

              if(!$rate)
                echo "Query failed: rate is empty.<br>";

              if(empty($genre_get))
                echo "Query failed: genre is empty.<br>";

              if($title && $company && $year && $rate && $genre_get) {
                $query_Movie = "INSERT INTO Movie VALUES(" . $new_id . "," . $title . "," . $year . "," . $rate . "," . $company . ")";

                foreach ($genre_get as $genre) {
                  $genre_input = "\"" . $genre . "\"";
                  $query_MovieGenre = "INSERT INTO MovieGenre VALUES (" . $new_id . "," . $genre_input . ")";
                }

                $query_M = mysql_query($query_Movie, $db_connection);
                $query_MG = mysql_query($query_MovieGenre, $db_connection);

                if(!$query_M || !$query_MG) {
                  die("Query failed: " . mysql_error());
                }
                else {
                  echo "Add Movie Success:<br>";
                  echo $new_id . " " . $_GET["title"]  . " " . $_GET["company"] . " " . $_GET["year"] . " " . $_GET["rate"];

                  // update maxmovie id
                  mysql_query("UPDATE MaxMovieID SET id=" . $new_id, $db_connection);
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