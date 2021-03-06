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

    <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Movie Database Project</h3>
        <p>
          In Project 1B, we created fully-functioning Movie Library database system accessed by users exclusively through a Web interface. The functionalities include adding actors and directors into the database, adding movies into the database while specifying the many genres it falls under, adding roles for actors in their respective movies, adding a director in his/her movie, adding reviews for movies (showing its average rating and the comments people have). Another feature that we have is the search functionality, which is basically used to search for a term in the database. There are 3 search pages, 1 for actors for browsing exclusively for an actor, 1 for movies for browsing exclusively for a movie, and 1 for a general search page.
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
            <li><a href="add_review.php">Add Review</a></li>
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
        <p>The search content feature allows user to search more information to the relation. There is one search option that is supported:</p>
          <ul class="nav nav-sidebar">
            <li><a href="search.php">Search Actor/Movie</a></li>
          </ul>
      </div>
    </div>
  </body>
</html>
