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
          <li><a href="index.php">Index</a></li>
          <li><a href="login1.php">Vulnerable Login</a></li>
          <li class="active"><a href="login2.php">Secure Login</a></li>
        </ul>
		<h3 class="text-muted">SQL-Injection Demo</h3>
      </div>
      
      <?php
        if ($_GET['attempt'] != 1)
        {
      ?>
      
      <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
          <form class="form-horizontal" role="form" action="login2.php?attempt=1" method="POST">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-8">
                <input name="username" type="text" class="form-control" id="inputEmail3" placeholder="Username">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-8">
                <input name="password" type="text" class="form-control" id="inputPassword3" placeholder="Password">
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
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $query = sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s';",
                             mysqli_real_escape_string($connection, $username),
                             mysqli_real_escape_string($connection, $password));
          
            $result = mysqli_query($connection, $query);
          
            if ($result->num_rows > 0)
            {
                echo "<p class=\"text-center\">Autenticato come <strong>" . $username . "</strong></p>";
              
                // ...
                // $_SESSION['logged_user'] = $username;
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
$username = $_POST['username'];
$password = $_POST['password'];

$query = sprintf("SELECT * FROM users WHERE username = '%s' AND password = '%s';",
                 mysqli_real_escape_string($connection, $username),
                 mysqli_real_escape_string($connection, $password));

$result = mysqli_query($connection, $query);

if ($result->num_rows > 0)
{
    echo "Autenticato come " . $username;

    // ...
    // $_SESSION['logged_user'] = $username;
    // ...
}
else
{
    echo "Credenziali errate!";
}
            </pre>
          </div>
        </div>
      </div>
      
      <br>
      <div class="footer">
        <p></p>Francesco Borzì - Computer Security Project</p>
      </div>

    </div> <!-- /container -->
	  
  </body>
</html>
