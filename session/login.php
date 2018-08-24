<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <form class="" action="checkuser.php" method="post">
      <table align="center" border="1" width="300">
        <tr>
          <td colspan='2' align='center'> กรุณาป้อนชื่อผู้ใช้งานและรหัสผ่าน</td>
        </tr>
        <tr>
          <td>Username : </td>
          <td><input type='text' name='UserName'></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type='password' name='Password'></td>
        </tr>
        <tr>
          <td colspan='2' align='center'><input type='submit' value='  OK  '> </td>
        </tr>
      </table>
    </form>
  </body>
</html>
