<?php
  session_start();
  ob_start();
  $UserName = $_POST['UserName'];
  $Password = $_POST['Password'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

      $hostname = "localhost";
      $username = "root";
      $password = "1234";
      $dbname = "testlogin";

      $conn = mysqli_connect($hostname, $username, $password, $dbname);
      if(!$conn) die ("ไม่สามาถติดต่อกับ MySQL ได้");

      $sqltxt = "select * from login where UserName = '$UserName'";

      $result = mysqli_query($conn, $sqltxt);
      $rs = mysqli_fetch_array($result);
      if($rs) {
        if($rs['Password'] == $Password) {
          $_SESSION['UserName'] = $UserName;
          if($rs['Status'] == "admin")
            header("location: admin.php?UserName=$UserName");
          else {
            header("location: user.php?UserName=$UserName");
          }
        }
        else {
          echo "<br>Password not match.";
          echo "<br><a href='login.php'>คลิก กลับไปเพื่อ login </a>";
        }
      }
      else {
        echo "Not found UserName ".$UserName;
        echo "<br><a href='login.php'>คลิก กลับไปเพื่อ login </a>";
      }
    ?>

  </body>
</html>
