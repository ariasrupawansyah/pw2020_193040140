<?php

require 'function.php';

if (isset($_POST["register"])) {

  if (registrasi($_POST) > 0) {
    echo "<script>
            alert('Registrasi Berhasil!'); 
            document.location.href = 'login.php';
          </script>";
  } else {
    echo "<script>
            alert('Registrasi Gagal'); 
          </script>";
  }
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Registrasi</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body class="bodyb">

  <div class="one-form">

    <h3 class="judul">Registration Form</h3>

    <form action="" method="post">

      <table cellspacing="10">

        <tr>
          <td width="10px"><label for="username">Username</label></td>
          <td>:</td>
        </tr>

        <tr>
          <td colspan="2" height="50px">
            <input type="text" name="username" class="input-login" style="border: 1px solid blue;" placeholder="Masukan nama">
          </td>
        </tr>

        <tr>
          <td><label for="password">Password</label></td>
          <td>:</td>

        </tr>

        <tr>
          <td colspan="2" height="50px">
            <input type="password" name="password" class="input-login" style="border: 1px solid blue;" placeholder="Masukan password">
          </td>
        </tr>

      </table>

      <hr style="margin: 40px 0 40px 0">

      <button type="submit" name="register" class="blueButton" style="margin: auto;">REGISTER</button>

    </form>

  </div>

</body>

</html>