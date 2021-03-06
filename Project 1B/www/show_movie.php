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
          <div class="nav nav-sidebar" style="margin-left: 5%">
            <h3>Movie Information Page</h3>
            <?php 
              $db_connection = mysql_connect("localhost", "cs143", "");
              mysql_select_db("CS143", $db_connection);

              if($_GET["identifier"]) {
                $movieid = $_GET["identifier"];
                $movie_query = mysql_query("SELECT title, company, rating FROM Movie WHERE(Movie.id = " . $movieid . ")", $db_connection);
                if(!$movie_query)
                    die("Query failed: " . mysql_error());

                $director_query = mysql_query("SELECT CONCAT(first, \" \", last) AS director FROM (MovieDirector JOIN Movie ON MovieDirector.mid = Movie.id) JOIN Director ON MovieDirector.did = Director.id WHERE(Movie.id = " . $movieid . ")", $db_connection);
                if(!$director_query)
                    die("Query failed: " . mysql_error());

                $genre_query = mysql_query("SELECT genre FROM MovieGenre JOIN Movie ON MovieGenre.mid = Movie.id WHERE(Movie.id = " . $movieid . ")", $db_connection);
                if(!$genre_query)
                    die("Query failed: " . mysql_error());

                $actor_query = mysql_query("SELECT id, CONCAT(first, \" \", last) AS name, role FROM MovieActor JOIN Actor ON MovieActor.aid = Actor.id WHERE(mid = " . $movieid . ")", $db_connection);
                if(!$actor_query)
                    die("Query failed: " . mysql_error());

                $review_query = mysql_query("SELECT name, comment FROM Review where mid = " . $movieid, $db_connection);
                if(!$review_query)
                  die("Query failed: " . mysql_error());

                $rating_query = mysql_query("SELECT ROUND(AVG(rating), 2) AS avgrating FROM Review where mid = " . $movieid, $db_connection);
                if(!$rating_query)
                  die("Query failed: " . mysql_error());

                $movie_row = mysql_fetch_assoc($movie_query);
                echo "<h4>Movie Information</h4>";
                echo "Title: " . $movie_row["title"] . "<br>";
                echo "Producer: " . $movie_row["company"] . "<br>";
                echo "MPAA Rating: " . $movie_row["rating"] . "<br>";

                $director_row = mysql_fetch_assoc($director_query);
                echo "Director: ";
                if (!$director_row["director"])
                  echo "No director found";
                else
                  echo $director_row["director"];
                echo "<br>";

                echo "Genre: ";
                if (mysql_num_rows($genre_query) == 0)
                  echo "No genres found";
                else {
                  while($genre_row = mysql_fetch_assoc($genre_query))
                    echo $genre_row["genre"] . " ";
                }
                echo "<br>";
                
                echo "Average Rating: ";
                while($rating_row = mysql_fetch_assoc($rating_query)) {
                  if (!$rating_row["avgrating"])
                    echo "No ratings yet";
                  else
                    echo $rating_row["avgrating"] . "/5";
                }
                echo "<br>";

                echo "<br>";

                echo "<h4>Actors in this Movie</h4>";
                echo "<div class=\"table-responsive\">";
                  echo "<table class=\"table table-bordered table-condensed table-hover\">";
                    echo "<thead><tr><td>Name</td><td>Role</td></tr></thead>";
                    if($actor_query) {
                      echo "<tbody>";
                        while($actor_row = mysql_fetch_assoc($actor_query)) {
                          echo "<tr>";
                            echo "<td><a href=\"show_actor.php?identifier=" . $actor_row["id"] .  "\">" . $actor_row["name"] . "</a></td>";
                            echo "<td>" . $actor_row["role"] . "</td>";
                          echo "</tr>";
                        }
                      echo "</tbody>";
                    }
                  echo "</table>";
                echo "</div>";

                echo "<h4>Comments</h4>";
                echo "<div class=\"table-responsive\">";
                  echo "<table class=\"table table-bordered table-condensed table-hover\">";
                    echo "<thead><tr><td>Name</td><td>Comment</td></tr></thead>";
                    if($review_query) {
                      echo "<tbody>";
                        while($review_row = mysql_fetch_assoc($review_query)) {
                          echo "<tr>";
                            echo "<td>" . $review_row["name"] . "</td>";
                            echo "<td>" . $review_row["comment"] . "</td>";
                          echo "</tr>";
                        }
                      echo "</tbody>";
                    }
                  echo "</table>";
                echo "</div>";
              ?>
              <form action="add_review.php" method="POST">
                <input type="hidden" name="mid" value="<?php echo $movieid; ?>">
                <button type="submit" class="btn btn-default" onClick="document.location.href = 'add_review.php'">Add Comment</button>
              </form>
              <?php
            }
            echo "<br>";
            echo "<br>";

            mysql_close($db_connection);
            ?>
            <form action="search.php" method="GET">
              <div class="form-group">
                <label for="search">Search</label>
                <input type="text" class="form-control" placeholder="Search..." name="terms">
              </div>
              <button type="submit" class="btn btn-default" onClick="document.location.href = 'search.php?terms=<?php echo $_GET["terms"]; ?>'">Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>