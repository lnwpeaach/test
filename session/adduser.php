<?php
  session_start();
  $UserName = $_GET['UserName'];
  include("connect.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add user</title>
  </head>
  <body>
    <?php
      if($_SESSION['UserName'] && $UserName == $_SESSION['UserName']) {
    ?>
        <form class="" action="" method="post">
          <table align=center width=500 cellspacing=3>
            <tr>
              <td align=right> User ID : </td>
              <td><input type="text" name="userid" required></td>
            </tr>
            <tr>
              <td align=right> Name : </td>
              <td><input type="text" name="name" required></td>
            </tr>
            <tr>
              <td align=right> Surname : </td>
              <td><input type="text" name="surname" required></td>
            </tr>
            <tr>
              <td align=right> Username : </td>
              <td><input type="text" name="username" required></td>
            </tr>
            <tr>
              <td align=right> Password : </td>
              <td><input type="text" name="password" required></td>
            </tr>
            <tr>
              <td align=right> Status : </td>
              <td><select name="status">
                <option value="user" selected>User</option>
                <option value="admin">Admin</option>
              </td>
            </tr>
            <tr>
              <td colspan=2 align=center>
                <input type="hidden" value="1" name="chk">
                <input type="submit" value="Add">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="reset" value="Clear">
              </td>
            </tr>
          </table>
          </form>

          <?php
          echo "<br><a href='admin.php?UserName=$UserName'>ย้อนกลับ</a><br>";
          if($_POST['chk'] == 1) {
            $userid = $_POST['userid'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $status = $_POST['status'];

            $sqltxt = "insert into user values ('$userid', '$name', '$surname')";
            $sqltxt2 = "insert into login values ('$username', '$password', '$status', '$userid')";
            $result = mysqli_query($conn, $sqltxt) or die("ไม่สามารถเพิ่มผู้ใช้ได้ User ID มีผู้อื่นใช้แล้ว");
            $result2 = mysqli_query($conn, $sqltxt2);
            if(!$result2) {
              $sqltxt3 = "delete from user where UserID = '$userid'";
              mysqli_query($conn, $sqltxt3);
              echo  "ไม่สามารถเพิ่มผู้ใช้ได้ Username มีผู้อื่นใช้แล้ว";
            }
            if($result && $result2) {
              $_SESSION['a'] = 1;
              header("location: admin.php?UserName=$UserName");
            }
          }
        }
        else {
          echo "You not login.";
          echo "<br><a href='login.php'>คลิก กลับไปเพื่อ login </a>";
        }
      ?>

  </body>
</html>
