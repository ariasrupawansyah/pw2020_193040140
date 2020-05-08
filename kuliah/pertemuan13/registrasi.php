<?php

require 'functions.php';

if (isset($_POST['registrasi'])) {
  if (registrasi($_POST) > 0) {
    echo "<script>
            alert('User baru berhasil ditambahkan. silahkan login!');
            document.location.href = 'login.php';
          </script>";
  } else {
    echo "<script>
            alert('user gagal ditambahkan!');
          </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="style/materialize.min.css" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>

  <div class="container z-depth-3" style="width: 40%; margin-top: 30px;">
    <div class="card blue-grey darken-2">
      <div class="card-content white-text">
        <span class="card-title">
          <h3>Registrasi</h3>
        </span>

        <form action="" method="POST">
          <ul>

            <div class='row'>
              <div class='input-field col s12'>
                <li>
                  <label>
                    Username :
                    <input type="text" name="username" class="validate white-text" autocomplete="off" autofocus required>
                  </label>
                </li>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <li>
                  <label>
                    Password :
                    <input type="password" name="password1" class="validate white-text" required>
                  </label>
                </li>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <li>
                  <label>
                    Konfirmasi Password :
                    <input type="password" name="password2" class="validate white-text" required>
                  </label>
                </li>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <li>
                  <button type="submit" name="registrasi" class="btn waves-effect waves-light" style="width: 100%">Registrasi</button>
                </li>
              </div>
            </div>

          </ul>

        </form>

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>