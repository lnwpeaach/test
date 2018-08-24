<?php
  session_start();
  $UserName = $_GET['UserName'];
  include("connect.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User page</title>
  </head>
  <body>
    <?php

      if($_SESSION['UserName'] && $UserName == $_SESSION['UserName']) {

        $sqltxt = "select * from login as l join user as u on l.UserId = u.UserId";

        $result = mysqli_query($conn, $sqltxt);

?>
        <table border=1 align=center bgcolor=#ffcccc width=700>
          <tr>
            <td align=center colspan=5 bcolor=#ff99cc><B>แสดงรายละเอียดผู้ใช้</B></td>
          </tr>
          <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Username</th>
            <th>Status</th>
          </tr>
          <?php
          while($rs = mysqli_fetch_array($result)) {
          ?>
            <tr>
              <td><?php echo $rs['UserId']; ?></td>
              <td><?php echo $rs['Name']; ?></td>
              <td><?php echo $rs['Surname']; ?></td>
              <td><?php echo $rs['UserName']; ?></td>
              <td><?php echo $rs['Status']; ?></td>
            </tr>
        <?php
        }
        echo "</table>";
        echo "  <br><a href='logout.php?UserName=$UserName'> Logout </a>";
      }
      else {
        echo "You not login.";
        echo "<br><a href='login.php'>คลิก กลับไปเพื่อ login </a>";
      }
    ?>

  </body>
</html>
