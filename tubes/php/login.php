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

if (isset($_POST['login'])) {
  $login = login($_POST);
}


?>


<!DOCTYPE html>
  <html>

    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <!-- My css -->
      <link rel="stylesheet" href="../css/style.css">
	  <title>Login</title>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>

    <body>
	
	<div class="container login">
		
	 <div class="row">
	    <div class="col s12 m12">
		    <div class="card horizontal z-depth-2">
		      <div class="card-content pinggirlogin blue-grey lighten-2">
		        <i class="large material-icons logo">person_pin</i>
		        <p class="white-text textlog">Welcome</p>
		      </div>

		      <div class="card-stacked">
		        <div class="card-content">
		          <h4 id="displayd" class="log">Login Page</h4>

		          <?php if (isset($login['error'])) : ?>
		          	<script>alert("<?= $login['pesan']?>");</script>
		          <?php endif; ?>
					
					<form action="" method="POST">
						<div class="row">
							 <div class="input-field col s12">
					          <input id="username" type="text" name="username" class="validate" autofocus autocomplete="off" required>
					          <label for="username">Masukan Nama :</label>
					        </div>
						</div>

						<div class="row">
							 <div class="input-field col s12">
					          <input id="password" type="password" name="password" class="validate" autocomplete="off" required>
					          <label for="password">Masukan Password :</label>
					        </div>
						</div>
						
						<div class="row">
						<div class="col s12">
						<label>
					       <input type="checkbox" name="remember" />
					       <span>Remember me</span>
					    </label>
					    </div>
					    </div>
						
						<div class="row">
						<div class="col s12">
						<button class="btn waves-effect waves-light blue lighten-2" type="submit" name="login">
							<i class="material-icons left">person</i>Login
						</button>
						</div>
						</div>
					</form>

		        </div>
		        <div class="card-action" style="margin-top: -20px">Don't have any account?
		          <a href="register.php">Register here</a>
		          <a href="../index.php">
		          	<button class="btn waves-effect waves-light blue lighten-2 back" type="submit" name="action">
					<i class="material-icons right">send</i>back to index
				  </button>
				  </a>
		        </div>
		      </div>
		    </div>
		</div>
	 </div>

	</div>
	
	<!-- Javascript -->
	<script src="../js/materialize.min.js"></script>
	<script>
		 const input = document.querySelectorAll('.input-field');
         M.updateTextFields.init(input);
	</script>
    </body>

  </html>