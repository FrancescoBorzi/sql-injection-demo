<?php 
    require "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SQL Injection demo">
    <meta name="author" content="Francesco Borzì">

    <title>SQL Injection Demo</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <div class="header hidden-xs">
        <ul class="nav nav-pills pull-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Standard Login<b class="caret"></b></a>
            <ul class="nav dropdown-menu">
              <li><a href="login1.php">Vulnerable</a></li>
              <li><a href="login2.php">Secure</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Numeric Login<b class="caret"></b></a>
            <ul class="nav dropdown-menu">
              <li><a href="login3.php">Vulnerable</a></li>
              <li><a href="login4.php">Secure</a></li>
            </ul>
          </li>
          <li class="active dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search<b class="caret"></b></a>
            <ul class="nav dropdown-menu">
              <li><a href="books1.php">Vulnerable</a></li>
              <li><a href="books2.php">Secure</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tools<b class="caret"></b></a>
            <ul class="nav dropdown-menu">
              <li><a href="regexp.php">Regular Expression Checker</a></li>
            </ul>
          </li>
        </ul>
		<h3 class="text-muted"><a href="index.php">SQL-Injection Demo</a></h3>
      </div>
      <?php include("mobile-navbar.php"); ?>
      
      <h3 class="text-center"><span class="label label-success">
Secure Search</span></h3><br>
      
      <div class="row">
        <div class="col-sm-10">
          <form class="form-inline" role="form" action="books2.php" method="GET">
            <div class="form-group">
              <label class="sr-only" for="exampleInputEmail2">Book title</label>
              <input type="text" name="title" class="form-control" placeholder="Book title">
            </div>
            <div class="form-group">
              <label class="sr-only" for="exampleInputPassword2">Book author</label>
              <input type="text" name="author" class="form-control"placeholder="Book author">
            </div>
            <button type="submit" class="btn btn-success">Search</button>
          </form>
        </div>
        <div class="col-sm-2">
          <span class="visible-xs">&nbsp;</span>
          <a href="books2.php?all=1"><button type="button" class="btn btn-info">All books</button></a>
        </div>
      </div>
      
      <br>
      
      <table class="table table-bordered">
        <tr>
          <th>#ID</th>
          <th>Title</th>
          <th>Author</th>
        </tr>
      <?php
        if ($_GET['all'] == 1)
        {
            $query = "SELECT * FROM books;";
        }
        else if ($_GET['title'] || $_GET['author'])
        {
            $query = sprintf("SELECT * FROM books WHERE title = '%s' OR author = '%s';",
                             mysqli_real_escape_string($connection, $_GET['title']),
                             mysqli_real_escape_string($connection, $_GET['author']));
        }
            
        if ($query != null)
		{
			$result = mysqli_query($connection, $query);

			while (($row = mysqli_fetch_row($result)) != null)
			{
				printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $row[0], $row[1], $row[2]);
			}
		}
      ?>
      </table>
      
      <hr>
      <div class="row">
        <div class="col-sm-12">
          <h4>Query Executed:</h4>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-12">
          <div class="highlight">
            <pre><?= $query ?></pre>
          </div>
        </div>
      </div>
      
      <hr>
      <div class="row">
        <div class="col-sm-12">
          <h4>PHP Code:</h4>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-12">
          <div class="highlight">
            <pre>
if ($_GET['all'] == 1)
{
    $query = "SELECT * FROM books;";
}
else if ($_GET['title'] || $_GET['author'])
{
    $query = sprintf("SELECT * FROM books WHERE title = '%s' OR author = '%s';",
                             mysqli_real_escape_string($connection, $_GET['title']),
                             mysqli_real_escape_string($connection, $_GET['author']));
}

if ($query != null)
{
	$result = mysqli_query($connection, $query);

	while (($row = mysqli_fetch_row($result)) != null)
	{
		printf("&lt;tr&gt;&lt;td&gt;%s&lt;/td&gt;&lt;td&gt;%s&lt;/td&gt;&lt;td&gt;%s&lt;/td&gt;&lt;/tr&gt;", $row[0], $row[1], $row[2]);
	}
}
            </pre>
          </div>
        </div>
      </div>
      
      <br>

      <?php include("footer.php"); ?>

    </div> <!-- /container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
