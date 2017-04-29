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

  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Movie Database Project</h3>
      <p>
        In Project 1B, you should create a fully functioning Movie Database system accessed by users exclusively through a Web interface. While there is much flexibility in the functionality required from your Movie Database system, all students are expected to implement the baseline capabilities described next.
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <h3>Add New Content</h3>
      <p>The add new content feature allows user to add more information to the relation. There are several add options that are supported:</p>
        <ul class="nav nav-sidebar">
          <li><a href="add_actordirector.php">Add Actor/Director</a></li>
          <li><a href="add_movie.php">Add Movie Information</a></li>
          <li><a href="add_movieactor.php">Add Movie/Actor Relation</a></li>
          <li><a href="add_moviedirector.php">Add Movie/Director Relation</a></li>
        </ul>
    </div>

    <div class="col-md-4">
      <h3>Browsing Content</h3>
      <p>The browsing content feature allows user to browse more information to the relation. There are several browse options that are supported:</p>
        <ul class="nav nav-sidebar">
          <li><a href="show_actor.php">Show Actor Information</a></li>
          <li><a href="show_movie.php">Show Movie Information</a></li>
        </ul>
    </div>

    <div class="col-md-4">
      <h3>Search Interface</h3>
      <p>The add search content feature allows user to search more information to the relation. There are several search options that are supported:</p>
        <ul class="nav nav-sidebar">
          <li><a href="search.php">Search Actor/Movie</a></li>
        </ul>
    </div>
  </div>

<!--   <div class="row">
    <div class="col-md-12">
      <h3>Team</h3>
      <div class="col-md-6">
        <p>
          Name: <b>Algan Binggi Rustinya</b><br>
          UID: <b>604670111</b>
        </p>
      </div>
      <div class="col-md-6">
        <p>
          Name: <b>Frederick Kennedy</b><br>
          UID: <b>404667930</b>
        </p>
      </div>
    </div>
  </div> -->

</body>

</html>
