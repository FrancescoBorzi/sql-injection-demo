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
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search<b class="caret"></b></a>
            <ul class="nav dropdown-menu">
              <li><a href="books1.php">Vulnerable</a></li>
              <li><a href="books2.php">Secure</a></li>
            </ul>
          </li>
          <li class="dropdown active">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tools<b class="caret"></b></a>
            <ul class="nav dropdown-menu">
              <li><a href="regexp.php">Regular Expression Checker</a></li>
            </ul>
          </li>
        </ul>
        <h3 class="text-muted"><a href="index.php">SQL-Injection Demo</a></h3>
      </div>
      <?php include("mobile-navbar.php"); ?>

      <h3 class="text-center"><span class="label label-info">
        Regular Expression Checker</span></h3><br>

      <?php

        if (isset($_GET['pattern']) &&
            isset($_GET['subject']) &&
            $_GET['pattern'] != "" &&
            $_GET['subject'] != "")
        {
          $pattern = $_GET['pattern'];
          $subject = $_GET['subject'];

          if (preg_match($pattern, $subject))
          {
            $result = "It matches!";
            $btn_result = "success";
          }
          else
          {
            $result = "It doesn't match!";
            $btn_result = "danger";
          }
        }

      ?>

      <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
          <form class="form-horizontal" role="form" action="regexp.php" method="GET">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Pattern</label>
              <div class="col-sm-8">
                <input value="<?= $pattern ?>" name="pattern" type="text" class="form-control" id="inputEmail3" placeholder="enter a regular expression between / and /">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Subject</label>
              <div class="col-sm-8">
                <input value="<?= $subject ?>" name="subject" type="text" class="form-control" id="inputPassword3" placeholder="enter a string">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Check</button>
              </div>
            </div>
          </form>

          <?php if (isset($_GET['pattern']) &&
                    isset($_GET['subject']) &&
                    $_GET['pattern'] != "" &&
                    $_GET['subject'] != "") {
          ?>
          <button type="submit" class="nonclickable btn btn-block btn-<?= $btn_result ?>"><?= $result ?></button>
          <?php } ?>

        </div>
      </div>

       <hr>
      <div class="row">
        <div class="col-sm-12">
          <h4>Regex reference:</h4>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="highlight">
            <pre>
[abc]     A single character: a, b or c
[^abc]     Any single character but a, b, or c
[a-z]     Any single character in the range a-z
[a-zA-Z]     Any single character in the range a-z or A-Z
^     Start of line
$     End of line
\A     Start of string
\z     End of string
.     Any single character
\s     Any whitespace character
\S     Any non-whitespace character
\d     Any digit
\D     Any non-digit
\w     Any word character (letter, number, underscore)
\W     Any non-word character
\b     Any word boundary character
(...)     Capture everything enclosed
(a|b)     a or b
a?     Zero or one of a
a*     Zero or more of a
a+     One or more of a
a{3}     Exactly 3 of a
a{3,}     3 or more of a
a{3,6}     Between 3 and 6 of a
            </pre>
          </div>
          <p>Detailed informations: <a href="http://www.php.net/manual/en/regexp.introduction.php">http://www.php.net/manual/en/regexp.introduction.php</a></p>
        </div>
      </div>

      <br>
      <div class="row">
        <div class="col-sm-12">
          <h4>Function <span style="color: #369">preg_match()</span> reference:</h4>
          <a href="http://www.php.net/manual/en/function.preg-match.php">http://www.php.net/manual/en/function.preg-match.php</a>
        </div>
      </div>

      <br>
      <div class="row">
        <div class="col-sm-12">
          <h4>Example</h4>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="highlight">
Regular expression <strong>/^[a-z]{2,4}+[0-9]{2}$/</strong> matches strings that begin with 2-4 literal characters (a-z) and end with 2 numeric characters (0-9).
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
