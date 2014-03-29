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

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Standard Login<b class="caret"></b></a>
                <ul class="nav dropdown-menu">
                  <li><a href="login1.php">Vulnerable</a></li>
                  <li><a href="login2.php">Secure</a></li>
                </ul>
              </li>
              <li class="active" class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Numeric Login<b class="caret"></b></a>
                <ul class="nav dropdown-menu">
                  <li><a href="login3.php">Vulnerable</a></li>
                  <li><a href="login4.php">Secure</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search<b class="caret"></b></a>
                <ul class="nav dropdown-menu">
                  <li><a href="books1.php">Vulnerable</a></li>
                  <li><a href="books2.php">Secure</a></li>
                </ul>
              </li>
            </ul>
		<a href="index.php"><h3 class="text-muted">SQL-Injection Demo</h3></a>
      </div>
      
      <?php
        if ($_GET['attempt'] != 1)
        {
      ?>
      
      <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
          <form class="form-horizontal" role="form" action="login3.php?attempt=1" method="POST">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Client</label>
              <div class="col-sm-8">
                <input name="client" type="text" class="form-control" id="inputEmail3" placeholder="Your client ID">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">PIN</label>
              <div class="col-sm-8">
                <input name="pin" type="text" class="form-control" id="inputPassword3" placeholder="Your PIN">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Sign in</button>
              </div>
            </div>
          </form>
        </div>  
      </div>
      
      <?php
        }
        else
        {
            $client = $_POST['client'];
            $pin = $_POST['pin'];
            
            $query = sprintf("SELECT * FROM clients WHERE id = %s AND pin = %s;",
                             mysqli_real_escape_string($connection, $client),
                             mysqli_real_escape_string($connection, $pin));
          
            $result = mysqli_query($connection, $query);
          
            if ($result->num_rows > 0)
            {
                echo "<p class=\"text-center\">Autenticato come <strong>" . $client . "</strong></p>";
              
                // ...
                // $_SESSION['logged_user'] = $client;
                // ...
            }
            else
            {
                echo "<p class=\"text-center\">Credenziali errate!</p>";
            }
      ?>
      
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
      
      <?php } ?>
      
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
TODO
            </pre>
          </div>
        </div>
      </div>
      
      <br>
      <div class="footer">
        <p></p>Francesco Borzì - Computer Security Project</p>
      </div>

    </div> <!-- /container -->
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
