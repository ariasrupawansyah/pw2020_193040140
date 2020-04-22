<?php

require 'function.php';

$apparel = query("SELECT * FROM apparel");

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link rel="stylesheet" href="../css/table.css">
</head>

<body class="admin">

  <div class="container admin">

    <div class="add">
      <a href="tambah.php"><button class="tambah">Tambah Data</button></a>
    </div>

    <table border="1px" cellspacing="0" cellpadding="10">
      <tr>
        <th>No</th>
        <th width="13%">Opsi</th>
        <th>Foto</th>
        <th>Jenis Pakaian</th>
        <th>Deskripsi pakaian</th>
        <th width="14%">Nama</th>
        <th width="9%">Ukuran</th>
        <th width="11%">Harga</th>
      </tr>

      <?php $i = 1; ?>
      <?php foreach ($apparel as $apl) : ?>

        <tr>

          <td><?= $i ?></td>
          <td>
            <a href="ubah.php?id=<?= $apl['id']; ?>"><button class="ubah">Ubah</button></a>
            <a href="hapus.php?id=<?= $apl['id']; ?>" onclick="return confirm('Hapus Data?')"><button class="hapus">Hapus</button></a>
          </td>
          <td><img src="../assets/img/<?= $apl["foto"]; ?>" class="foto"></td>
          <td><?= $apl["jenis_pakaian"] ?></td>
          <td width="300px"><?= $apl["deskripsi"] ?></td>
          <td><?= $apl["nama"] ?></td>
          <td><?= $apl["ukuran"] ?></td>
          <td><?= "Rp ." . $apl["harga"] ?></td>

        </tr>

        <?php $i++ ?>
      <?php endforeach; ?>

    </table>

  </div>

</body>

</html>