
<?php

//mengecek apakah ada id yang dikirimkan
//jika tidak maka akan dikembalikan ke index.php
if (!isset($_GET['id'])){
	header("location: ../index.php");
	exit;
}

require 'function.php';

//mengambil id dari url
$id = $_GET['id'];

$apparel = query("SELECT * from apparel where id = $id")[0];

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detail</title>
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
	<div class="container">
		<div class="gambar">
			<img src="../assets/img/<?= $apparel['foto']; ?>" alt="">
		</div>
		<div class="keterangan">
				<p><?= $apparel["jenis_pakaian"]?></p>
				<p class="desk"><?= $apparel["deskripsi"]?></p>
				<p><?= $apparel["nama"]?></p>
				<p><?= $apparel["ukuran"]?></p>
				<p>Rp.<?= $apparel["harga"]?></p>
		</div>

		<a href="../index.php"><button class="tombol-kembali">Kembali</button></a>

	</div>
</body>
</html>