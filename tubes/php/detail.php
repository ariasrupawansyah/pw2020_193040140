<?php

// mengecek apakah id sudah ditangkap
if (!isset($_GET['id'])) {
	header("location: ../index.php");
	exit;
}

require 'function.php';

// ambil id dari URL
$id = $_GET['id'];

// query apparel berdasarkan id
$apparel = query("SELECT * FROM apparel where id = $id")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Apparel</title>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
  <!-- My css -->
  <link rel="stylesheet" href="../css/style.css">

</head>

<body class="grey lighten-4">

  <div class="container white cB z-depth-2">
	<div class="row">
		
	<div class="col s12 m9">
	 <div class="card horizontal cP">
      <div class="card-image gambardetail z-depth-2">
        <img src="../assets/img/<?= $apparel['foto']; ?>" style="width: 200px; height: 350px;">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <h4 id="displayd"><?= $apparel['nama'];?></h4>
          <p>Detail Apparel:</p>
          <p><?= $apparel['jenis_pakaian']; ?></p>
          <p class="grey-text"><?= $apparel['ukuran']; ?></p>
		  <h5>Rp. <?= $apparel['harga'];?></h5>
        </div>
        <div class="card-action">
          <a href="../index.php" class="black-text backM">Back To Index</a>
        </div>
      </div>
     </div>
	</div>

	<div class="col s12 m3">
	  <div class="card grey lighten-3 displaydes">
        <div class="card-content black-text">
          <span class="card-title jDesk" style="font-size: 40px;">Deskripsi :</span>
          <p><?= $apparel['deskripsi'];?></p>
        </div>
      </div>
	</div>	

   </div>

  </div>

</body>

</html>