<?php 

require 'php/function.php';

$apparel = query("SELECT * from apparel");

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
			<?php foreach ($apparel as $apl) : ?>
			
			<tr>
				
				<td><?= $i ?></td>
				<td><img src="assets/img/<?= $apl["foto"]; ?>"></td>
				<td><?= $apl["jenis_pakaian"]?></td>
				<td width="300px"><?= $apl["deskripsi"]?></td>
				<td><?= $apl["nama"]?></td>
				<td><?= $apl["ukuran"]?></td>
				<td><?= $apl["harga"]?></td>

			</tr>	
		
			<?php $i++ ?>
			<?php endforeach; ?>

		</table>

 </body>
 </html>