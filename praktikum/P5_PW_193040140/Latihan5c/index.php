<?php 

//menghubungkan dengan file php lainnya
require 'php/function.php';

//melakukan query
$apparel = query("SELECT * from apparel");

?>

<!DOCTYPE html>
<html>
 <head>
 	<meta charset="UTF-8">
 	<title>Index</title>
	
	<link rel="stylesheet" type="text/css" href="css/styles.css">

 </head>
 <body>

 	<!-- Aria Rupawansyah 193040140 -->

 	<div class="container">
 		
 		<?php foreach ($apparel as $apl) : ?>
 			<p class="nama">
 				<a class="special" href="php/detail.php?id=<?= $apl['id'] ?>">
				<?= $apl['nama'] ?>
				</a>
 			</p>
 		<?php endforeach; ?>

 	</div>

 </body>
 </html>