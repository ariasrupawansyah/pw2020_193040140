<?php

require 'function.php';

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
      <a href="logout.php"><button class="tambah">Log Out</button></a>
    </div>

    <div class="caridata">
      <form action="" method="get">
        <input type="text" name="keyword" autofocus>
        <button type="submit" name="cari" class="silverButton">Cari!</button>
      </form>
    </div>

    <table border="1px" cellspacing="0" cellpadding="10" style="width: 100%">
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

      <?php if (empty($apparel)) : ?>

        <tr>
          <td colspan="8">
            <h1 style="text-align: center">Data tidak ditemukan</h1>
          </td>
        </tr>

      <?php else : ?>

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
      <?php endif; ?>

    </table>

  </div>

</body>

</html>