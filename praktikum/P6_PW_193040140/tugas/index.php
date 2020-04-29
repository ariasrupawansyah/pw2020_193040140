<?php

//menghubungkan dengan file php lainnya
require 'php/function.php';

if (isset($_GET['cari'])) {
	$keyword = $_GET['keyword'];
	$apparel = query("SELECT * FROM apparel WHERE 
              nama LIKE '%$keyword%' OR
              deskripsi LIKE '%$keyword%' OR
              ukuran LIKE '%$keyword%' OR
              harga LIKE '%$keyword%' OR
              jenis_pakaian LIKE '%$keyword%' ");
} else {
	$apparel = query("SELECT * FROM apparel");
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Index</title>

	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body class="bodya">

	<!-- Aria Rupawansyah 193040140 -->

	<div class="container">

		<h2 style="text-align: center">Halaman Index</h2>

		<hr>

		<form action="" method="get">
			<input type="text" name="keyword" autofocus>
			<button type="submit" name="cari">Cari!</button>
		</form>

		<br>

		<?php if (empty($apparel)) : ?>

			<h1 style="text-align: center">Data tidak ditemukan</h1>

		<?php else : ?>

			<?php foreach ($apparel as $apl) : ?>
				<p class="nama">
					<a class="special" href="php/detail.php?id=<?= $apl['id'] ?>">
						<?= $apl['nama'] ?>
					</a>
				</p>
			<?php endforeach; ?>

		<?php endif; ?>

		<br>
		<hr>

		<a class="special" href="php/admin.php" style="line-height: 50px; background-color: maroon; border-radius: 10px;">
			Menuju halaman Admin!
		</a>

	</div>

</body>

</html>