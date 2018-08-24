<?php
  session_start();
  ob_start();
  $hostname = "localhost";
  $username = "root";
  $password = "1234";
  $dbname = "testlogin";

  $conn = @mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn) die ("ไม่สามาถติดต่อกับ MySQL ได้");
  mysqli_query($conn, "set names utf8");
?>
