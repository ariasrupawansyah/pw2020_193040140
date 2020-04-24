<?php

require 'functions.php';

// ambil id dari URL
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$mahasiswa = query("SELECT * FROM mahasiswa where id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
  <link rel="stylesheet" href="style/styles.css">
</head>

<body>

  <h3>Detail Mahasiswa</h3>

  <div class="container">

    <ul>
      <li><img src="img/<?= $mahasiswa['gambar']; ?>" class="gambar"></li>
      <li>
        <b>DATA :</b>
      </li>

      <div class="box1">

        <li>NRP : <?= $mahasiswa['nrp']; ?></li>
        <li>Nama : <?= $mahasiswa['nama']; ?></li>
        <li>Email : <?= $mahasiswa['email']; ?></li>
        <li>Jurusan : <?= $mahasiswa['jurusan']; ?></li>

      </div>

      <div class="box2">
        <li><a href="ubah.php?id=<?= $mahasiswa['id']; ?>">Ubah</a> | <a href="hapus.php?id=<?= $mahasiswa['id']; ?>" onclick="return confirm('apakah anda yakin?');">Hapus</a></li>
        <li><a href="index.php">Kembali ke daftar mahasiswa</a></li>
      </div>
    </ul>

  </div>

</body>

</html>