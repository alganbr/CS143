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

        <div class="col-md-3 sidebar">
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

        <div class="col-md-9">
          <div class="nav nav-sidebar">
            <form action="search.php" method="GET" style="margin-left: 5%">
            <h3>Actor Information Page</h3>
            <?php 
            $db_connection = mysql_connect("localhost", "cs143", "");
            mysql_select_db("CS143", $db_connection);

            if($_GET["identifier"]) {
              
              $actor_query = mysql_query("SELECT CONCAT(first, \" \", last) AS name, sex, dob, dod FROM Actor WHERE(id = " . $_GET["identifier"] . ")", $db_connection);
              if(!$actor_query)
                  die("Query failed: " . mysql_error());

              $movie_query = mysql_query("SELECT id, role, title FROM MovieActor JOIN Movie ON MovieActor.mid = Movie.id WHERE(aid = " . $_GET["identifier"] . ")", $db_connection);
              if(!$movie_query)
                  die("Query failed: " . mysql_error());

              echo "<h4>Actor Information</h4>";
              echo "<div class=\"table-responsive\">";
                echo "<table class=\"table table-bordered table-condensed table-hover\">";
                  echo "<thead><tr><td>Name</td><td>Sex</td><td>Date of Birth</td><td>Date of Death</td></tr></thead>";
                  if($actor_query) {
                    echo "<tbody>";
                      while($actor_row = mysql_fetch_assoc($actor_query)) {
                        echo "<tr>";
                          echo "<td>" . $actor_row["name"] . "</td>";
                          echo "<td>" . $actor_row["sex"] . "</td>";
                          echo "<td>" . $actor_row["dob"] . "</td>";
                          if(!$actor_row["dod"])                                     
                            echo "<td>Still Alive</td>";
                          else
                            echo "<td>" . $actor_row["dod"] . "</td>";
                        echo "</tr>";
                      }
                    echo "</tbody>";
                  }
                echo "</table>";
              echo "</div>";

              echo "<br>";

              echo "<h4>Actor's Movies and Role</h4>";
              echo "<div class=\"table-responsive\">";
                echo "<table class=\"table table-bordered table-condensed table-hover\">";
                  echo "<thead><tr><td>Role</td><td>Movie Title</td></tr></thead>";
                  if($movie_query) {
                    echo "<tbody>";
                      while($movie_row = mysql_fetch_assoc($movie_query)) {
                        echo "<tr>";
                          echo "<td>" . $movie_row["role"] . "</td>";
                          echo "<td><a href=\"show_movie.php?identifier=" . $movie_row["id"] .  "\">" . $movie_row["title"] . "</a></td>";
                        echo "</tr>";
                      }
                    echo "</tbody>";
                  }
                echo "</table>";
              echo "</div>";
            }

            mysql_close($db_connection);
          ?>
          <br>
          <div class="form-group">
              <label for="search">Search</label>
              <input type="text" class="form-control" placeholder="Search..." name="terms">
            </div>
            <button type="submit" class="btn btn-default" onClick="document.location.href = 'search.php?terms=<?php echo $_GET["terms"]; ?>'">Search</button>
          </form>
        </div>
      </div>

    </div>
  </body>
</html>