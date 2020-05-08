<?php
session_start();

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}


require 'functions.php';

if (isset($_POST['login'])) {
  $login = login($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="style/materialize.min.css" media="screen,projection" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

</head>

<body>

  <div class="container z-depth-3" style="width: 40%; margin-top: 60px;">
    <div class="card blue-grey darken-2">
      <div class="card-content white-text">
        <span class="card-title">
          <h3>Form Login</h3>
        </span>

        <?php if (isset($login['error'])) : ?>
          <p style="color: red; font-style: italic;"><?= $login['pesan']; ?></p>
        <?php endif; ?>

        <form action="" method="POST">
          <ul>

            <div class='row'>
              <div class='input-field col s12'>
                <li>
                  <label>
                    Username :
                    <input type="text" name="username" class="validate white-text" autofocus autocomplete="off" required>
                  </label>
                </li>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <li>
                  <label>
                    Password :
                    <input type="password" name="password" class="validate white-text" required>
                  </label>
                </li>
              </div>
            </div>

            <li>
              <button type="submit" name="login" class="btn waves-effect waves-light" style="width: 100%">Login</button>
            </li>
            <br>
            <li>
              <div class="card-action">
                <a href="registrasi.php" class="white-text">Tambah user baru</a>
              </div>
            </li>

          </ul>
        </form>
      </div>
    </div>
  </div>

  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>