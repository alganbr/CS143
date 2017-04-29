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
    </nav>
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
        <form action="add_actordirector.php" method="GET" style="margin-left: 5%">
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
             <label for="rating">MPAA Rating</label>
             <select class="form-control" name="rate">
              <option value="G">G</option>
              <option value="NC-17">NC-17</option>
              <option value="PG">PG</option>
              <option value="PG-13">PG-13</option>
              <option value="R">R</option>
              <option value="surrendere">surrendere</option>
             </select>
          </div>
          <div class="form-group">
            <label>Genre:</label>
            <input type="checkbox" name="genre[]" value="Action">Action</input>
            <input type="checkbox" name="genre[]" value="Adult">Adult</input>
            <input type="checkbox" name="genre[]" value="Adventure">Adventure</input>
            <input type="checkbox" name="genre[]" value="Animation">Animation</input>
            <input type="checkbox" name="genre[]" value="Comedy">Comedy</input>
            <input type="checkbox" name="genre[]" value="Crime">Crime</input>
            <input type="checkbox" name="genre[]" value="Documentary">Documentary</input>
            <input type="checkbox" name="genre[]" value="Drama">Drama</input>
            <input type="checkbox" name="genre[]" value="Family">Family</input>
            <input type="checkbox" name="genre[]" value="Fantasy">Fantasy</input>
            <input type="checkbox" name="genre[]" value="Horror">Horror</input>
            <input type="checkbox" name="genre[]" value="Musical">Musical</input>
            <input type="checkbox" name="genre[]" value="Mystery">Mystery</input>
            <input type="checkbox" name="genre[]" value="Romance">Romance</input>
            <input type="checkbox" name="genre[]" value="Sci-Fi">Sci-Fi</input>
            <input type="checkbox" name="genre[]" value="Short">Short</input>
            <input type="checkbox" name="genre[]" value="Thriller">Thriller</input>
            <input type="checkbox" name="genre[]" value="War">War</input>
            <input type="checkbox" name="genre[]" value="Western">Western</input>
          </div>
          <button type="submit" class="btn btn-default">Add</button>
        </form>
      </div>
    </div>
  </div>


</body>

</html>