<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

//ketika tombol cari diklik
if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
  <link rel="stylesheet" href="style/styles.css">
</head>

<body>

  <a href="logout.php" class="link" style="margin: 47%;">Logout</a>

  <h3>Daftar Mahasiswa</h3>

  <a href="tambah.php" class="link">Tambah Data Mahasiswa</a>
  <br>

  <div class="formcari">
    <form action="" method="POST">
      <input type="text" name="keyword" id="keyword" placeholder="masukan keyword pencarian.." autocomplete="off" autofocus>
      <button type="submit" class="cari" name="cari">Cari!</button>
    </form>
  </div>

  <br>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>

    <?php if (empty($mahasiswa)) : ?>
      <tr>
        <td colspan="4">
          <p style="color: red; font-style:italic;">Data mahasiswa tidak ditemukan!</p>
        </td>
      </tr>
    <?php endif; ?>

    <?php $i = 1;
    foreach ($mahasiswa as $m) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $m['gambar']; ?>" width="60"></td>
        <td><?= $m['nama']; ?></td>
        <td>
          <a href="detail.php?id=<?= $m['id']; ?>">Lihat detail</a>
        </td>
      </tr>
    <?php endforeach; ?>

  </table>

</body>

</html>