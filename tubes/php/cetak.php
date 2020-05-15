<?php
// Require composer autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// php require
require 'function.php';

$apparel = query("SELECT * FROM apparel");

// Write some HTML code:
$html = '
<!DOCTYPE html>
<html>
<head>
	<title>List Apparel</title>
</head>
<body>
	

	<h1>Daftar Inventory Apparel</h1>
	<p>Daftar dari apparel yang sudah terdaftar</p>

	<hr>

	<table class="striped" border="1" cellspacing="0" cellpadding="10">

        <tr>
        	<th>No </th>
            <th>Foto</th>
        	<th>Nama</th>
        	<th>Jenis Pakaian</th>
        	<th>Ukuran</th>
        	<th>Deskripsi</th>
        	<th>Harga</th>
        </tr>';

    $i = 1;
    foreach ($apparel as $apl) {
        $html .= '<tr>
        			<td>'. $i++ .'</td>
        			<td><img src="../assets/img/'. $apl["foto"] .'" width="50"></td>
        			<td>'. $apl["nama"] .'</td>
        			<td>'. $apl["jenis_pakaian"] .'</td>
        			<td>'. $apl["ukuran"] .'</td>
        			<td>'. $apl["deskripsi"] .'</td>
        			<td>Rp.'. $apl["harga"] .'</td>
        		</tr>';
    }
	
 $html .= '</table>

</body>
</html>
';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
