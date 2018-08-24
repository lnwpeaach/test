<?php
  session_start();
  session_unset();
  session_destroy();

  $UserName = $_GET['UserName'];
  echo "User : ".$UserName." now logout.";

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Logout</title>
  </head>
  <body>
    <br><a href='login.php'>คลิก กลับไปหน้า login </a>
  </body>
</html>
