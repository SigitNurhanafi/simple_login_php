<?php
session_start();
require('database.php');

$base_url = "http://localhost/simple_login_php";

if (empty($_SESSION["data_login"])) {
  header("Location: " . $base_url . "/login.php");
  die();
}

// logout action
if (count($_SESSION) != 0 && $_SERVER["REQUEST_METHOD"] == "POST" && $_POST['logout'] == 'true') {
  session_destroy();
  header("Location: " . $base_url . "/login.php");
  die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Info</title>
  <style>
    body {
      text-align: center;
    }
  </style>
</head>
<body>
<center>
  <h1>Info Akun</h1>
  <table>
    <tr>
      <td>Email</td>
      <td>: <?= $_SESSION['data_login'][0]['email']?></td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td>: <?= $_SESSION['data_login'][0]['full_name']?></td>
    </tr>
    <tr>
      <td>Kode Referal Kamu</td>
      <td>: <?= $_SESSION['data_login'][0]['referal_code']?></td>
    </tr>
  </table>
  <br>

  <form action="" method="post">
    <input type="hidden" name="logout" value="true">
    <button type="submit" value="true" >Logout</button>
  </form>
</center>
</body>
</html>