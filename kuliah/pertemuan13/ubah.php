<?php

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}


require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari url
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id");

// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
          alert('data berhasil diubah');
          document.location.href = 'index.php';
          </script>";
  } else {
    echo "Data gagal diubah!";
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
  <link rel="stylesheet" href="style/styles.css">
</head>

<body>

  <h3>Form ubah data mahasiswa</h3>

  <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" id="id" value="<?= $mahasiswa['id']; ?>">
      <ul>
        <li><label>
            Nama
            <input type=" text" name="nama" placeholder="Nama" class="an" autofocus required value="<?= $mahasiswa['nama']; ?>">
          </label>
        </li>
        <li>
          <label>
            NRP
            <input type="text" name="nrp" placeholder="Nrp" class="an" required value="<?= $mahasiswa['nrp']; ?>">
          </label>
        </li>
        <li><label>
            Email
            <input type="text" name="email" placeholder="email" class="an" required value="<?= $mahasiswa['email']; ?>">
          </label>
        </li>
        <li>
          <label>
            Jurusan
            <input type="text" name="jurusan" placeholder="jurusan" class="an" required value="<?= $mahasiswa['jurusan']; ?>">
          </label>
        </li>
        <li>
          <input type="hidden" name="gambar_lama" value="<?= $mahasiswa['gambar']; ?>">
          <label>
            Gambar
            <input type="file" name="gambar" class="an gambarr" onchange="previewImage()">
            <img src="img/<?= $mahasiswa['gambar']; ?>" width="120" style="display: block" class="img-preview">
          </label>
        </li>
        <li>
          <button type="submit" class="tombol" name="ubah">Ubah Data!</button>
        </li>
      </ul>
    </form>
  </div>


  <script src="js/script.js"></script>
</body>

</html>