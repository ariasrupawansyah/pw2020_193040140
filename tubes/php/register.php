<?php 

session_start();

if (isset($_SESSION["username"])) {
  header("Location: admin.php");
  exit;
}


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

<!DOCTYPE html>
  <html>

    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <!-- My css -->
      <link rel="stylesheet" href="../css/style.css">
	  <title>Register</title>
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
		        <p class="white-text textlog">Hello Sir!</p>
		      </div>
		      <div class="card-stacked">
		        <div class="card-content">
		          <h4 id="displayd" class="log">Register Page</h4>
					
					<form action="" method="post">
						<div class="row">
							 <div class="input-field col s12">
					          <input id="username" name="username" type="text" class="validate" autofocus autocomplete="off" required>
					          <label for="username">Masukan Nama :</label>
					        </div>
						</div>

						<div class="row">
							 <div class="input-field col s12">
					          <input id="password1" name="password1" type="password" class="validate" autocomplete="off" required>
					          <label for="password1">Masukan Password :</label>
					        </div>
						</div>
						
						<div class="row">
							 <div class="input-field col s12">
					          <input id="password2" name="password2" type="password" class="validate" autocomplete="off" required>
					          <label for="password2">Confirm Password :</label>
					        </div>
						</div>
						
						<div class="row">
						<div class="col s12">
						<button class="btn waves-effect waves-light blue lighten-2" type="submit" name="register">
							<i class="material-icons left">person</i>Sign up
						</button>
						</div>
						</div>
					</form>

		        </div>
		        <div class="card-action" style="margin-top: -20px">Have an account?
		          <a href="login.php">Back to login</a>
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