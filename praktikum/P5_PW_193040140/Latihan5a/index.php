<?php 

$conn = mysqli_connect("localhost", "root", "") or die("Koneksi ke DB gagal");

mysqli_select_db($conn, "tubes_193040140") or die("Database salah");

$result = mysqli_query($conn, "SELECT * from apparel");

?>


<html>
 <head>
 	<meta charset="UTF-8">
 	<title>Index</title>
	
	<link rel="stylesheet" type="text/css" href="css/styles.css">

 </head>
 <body>

 	<!-- Aria Rupawansyah 193040140 -->

 	<h2>Data Apparel 2020</h2>
 	
	<table border="1" cellspacing="0" cellpadding="10">

			<tr>
				<th>
					No
				</th>
				<th>
					Foto
				</th>
				<th>
					Jenis Pakaian
				</th>
				<th>
					Deskripsi pakaian
				</th>
				<th>
					Nama
				</th>
				<th>
					Ukuran
				</th>
				<th>
					Harga
				</th>

			</tr>
			
			<?php $i = 1; ?>
			<?php while($row = mysqli_fetch_assoc($result)) : ?>
			
			<tr>
				
				<td><?= $i ?></td>
				<td><img src="assets/img/<?= $row["foto"]; ?>"></td>
				<td><?= $row["jenis_pakaian"]?></td>
				<td width="300px"><?= $row["deskripsi"]?></td>
				<td><?= $row["nama"]?></td>
				<td><?= $row["ukuran"]?></td>
				<td><?= $row["harga"]?></td>

			</tr>	
		
			<?php $i++ ?>
			<?php endwhile; ?>

		</table>

 </body>
 </html>