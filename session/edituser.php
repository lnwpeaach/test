<?php
  session_start();
  $UserName = $_GET['UserName'];
  $UserIDselt = $_GET['UserID'];
  include("connect.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit user</title>
  </head>
  <body>
    <?php
      if($_SESSION['UserName'] && $UserName == $_SESSION['UserName']) {
        $sqltxt = "select * from login as l join user as u on l.UserId = u.UserId where l.UserID = '$UserIDselt'";
        $result = mysqli_query($conn, $sqltxt);
        $rs = mysqli_fetch_array($result);
    ?>
        <form class="" action="" method="post">
          <table align=center width=500 cellspacing=3>
            <tr>
              <td align=right> User ID : </td>
              <td><input type="text" name="userid" value='<?php echo $rs['UserID'];?>' required></td>
            </tr>
            <tr>
              <td align=right> Name : </td>
              <td><input type="text" name="name" value='<?php echo $rs['Name'];?>' required></td>
            </tr>
            <tr>
              <td align=right> Surname : </td>
              <td><input type="text" name="surname" value='<?php echo $rs['Surname'];?>' required></td>
            </tr>
            <tr>
              <td align=right> Username : </td>
              <td><input type="text" name="username" value='<?php echo $rs['UserName'];?>' required></td>
            </tr>
            <tr>
              <td align=right> Password : </td>
              <td><input type="text" name="password" value='<?php echo $rs['Password'];?>' required></td>
            </tr>
            <tr>
              <td align=right> Status : </td>
              <td><select name="status">
                <option value="user" <?php if($rs['Status'] == 'user') echo "selected";?>>User</option>
                <option value="admin" <?php if($rs['Status'] == 'admin') echo "selected";?>>Admin</option>
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

            $sqltxt = "update user set UserId = '$userid', Name = '$name', Surname = '$surname' where UserId = '$UserIDselt'";
            $sqltxt2 = "update login set UserName = '$username', Password = '$password', Status = '$status', UserId = '$userid' where UserId = '$UserIDselt'";
            $result = mysqli_query($conn, $sqltxt) or die("ไม่สามารถเพิ่มผู้ใช้ได้ User ID มีผู้อื่นใช้แล้ว");
            $result2 = mysqli_query($conn, $sqltxt2);
            if(!$result2) {
              $sqltxt3 = "update user set UserId = '".$rs[4]."', Name = '".$rs[5]."', Surname = '".$rs[6]."' where UserId = '$userid'";
              echo $sqltxt3;
              mysqli_query($conn, $sqltxt3);
              echo  "ไม่สามารถเพิ่มผู้ใช้ได้ Username มีผู้อื่นใช้แล้ว";
            }
            if($result && $result2) {
              $_SESSION['a'] = 2;
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
