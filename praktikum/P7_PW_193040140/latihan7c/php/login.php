<?php
session_start();
require 'function.php';

// cek cookie
if (isset($_COOKIE['username']) && isset($_COOKIE['hash'])) {
  $username = $_COOKIE['username'];
  $hash = $_COOKIE['hash'];

  // ambil username berdasarkan id
  $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if ($hash === hash('sha256', $row['id'], false)) {
    $_SESSION['username'] = $row['username'];
    header("Location: admin.php");
    exit;
  }
}

// melakukan pengecekan apakah user sudah melakukan login jika sudah redirect ke halaman admin
if (isset($_SESSION['username'])) {
  header("Location: admin.php");
  exit;
}

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
  // mencocokan Username dan Password
  if (mysqli_num_rows($cek_user) > 0) {
    $row = mysqli_fetch_assoc($cek_user);
    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['hash'] = hash('sha256', $row['id'], false);

      // jika remember me dicentang
      if (isset($_POST['remember'])) {
        setcookie('username', $row['username'], time() + 60 * 60 * 24);
        $hash = hash('sha256', $row['id']);
        setcookie('hash', $hash, time() + 60 * 60 * 24);
      }

      if (hash('sha256', $row['id']) == $_SESSION['hash']) {
        header("Location: admin.php");
        die;
      }
      header("Location: ../index.php");
      die;
    }
  }
  $error = true;
}

?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body class="bodyd">

  <div class="one-form">

    <h3 class="judul">Login Form</h3>

    <form action="" method="post">

      <?php if (isset($error)) : ?>

        <p style="color: red; font-style: italic;">Username atau Password salah</p>

      <?php endif; ?>

      <table cellspacing="10">

        <tr>
          <td width="10px"><label for="username">Username</label></td>
          <td>:</td>
        </tr>

        <tr>
          <td colspan="2" height="50px">
            <input type="text" name="username" class="input-login" placeholder="Masukan nama">
          </td>
        </tr>

        <tr>
          <td><label for="password">Password</label></td>
          <td>:</td>

        </tr>

        <tr>
          <td colspan="2" height="50px">
            <input type="password" name="password" class="input-login" placeholder="Masukan password">
          </td>
        </tr>

      </table>

      <div class="remember">
        <input type="checkbox" name="remember">
        <label for="remember">Remember me</label>
      </div>

      <button type="submit" name="submit" class="greenButton" style="margin: auto;">Login</button>

      <div class="registrasi">
        <p>Belum punya akun? Registrasi <a href="registrasi.php">Disini</a></p>
      </div>

    </form>

  </div>

</body>

</html>