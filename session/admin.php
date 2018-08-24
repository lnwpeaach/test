<?php
  session_start();
  $UserName = $_GET['UserName'];
  include("connect.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin page</title>
  </head>
  <body>
    <?php

      if($_SESSION['UserName'] && $UserName == $_SESSION['UserName']) {

        $sqltxt = "select * from login as l join user as u on l.UserId = u.UserId";
        $result = mysqli_query($conn, $sqltxt);
?>
        <table border=1 align=center bgcolor=#ffcccc width=700>
          <tr>
            <td align=center colspan=6 bcolor=#ff99cc><B>แสดงรายละเอียดผู้ใช้</B></td>
          </tr>
          <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Username</th>
            <th>Status</th>
            <th>Edit</th>
          </tr>
          <?php
          while($rs = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$rs['UserId']."</td>";
            echo "<td>".$rs['Name']."</td>";
            echo "<td>".$rs['Surname']."</td>";
            echo "<td>".$rs['UserName']."</td>";
            echo "<td>".$rs['Status']."</td>";
            echo "<td>";
            if($rs['UserName'] != $UserName)
              echo "<a href='edituser.php?UserName=$UserName&UserID=".$rs['UserId']."'>Edit</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        if($_SESSION['a'] == 1) {
          echo "<br>เพิ่มผู้ใช้สำเร็จ";
          $_SESSION['a'] = null;
        }
        else if($_SESSION['a'] == 2) {
          echo "<br>แก้ไขข้อมูลผู้ใช้สำเร็จ";
          $_SESSION['a'] = null;
        }
        echo "<br><a href='adduser.php?UserName=$UserName'> Add User </a>";
        echo "  <br><a href='logout.php?UserName=$UserName'> Logout </a>";

      }
      else {
        echo "You not login.";
        echo "<br><a href='login.php'>คลิก กลับไปเพื่อ login </a>";
      }
    ?>

  </body>
</html>
