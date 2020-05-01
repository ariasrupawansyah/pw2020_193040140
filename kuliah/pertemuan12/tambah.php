<?php

session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}


require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
          alert('data berhasil ditambahkan');
          document.location.href = 'index.php';
          </script>";
  } else {
    echo "Data gagal ditambahkan!";
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
  <link rel="stylesheet" href="style/styles.css">
</head>

<body>

  <h3>Form tambah data mahasiswa</h3>

  <div class="container">
    <form action="" method="POST">
      <ul>
        <li><label>
            Nama
            <input type="text" name="nama" placeholder="Nama" class="an" autofocus required>
          </label>
        </li>
        <li>
          <label>
            NRP
            <input type="text" name="nrp" placeholder="Nrp" class="an" required>
          </label>
        </li>
        <li><label>
            Email
            <input type="text" name="email" placeholder="email" class="an" required>
          </label>
        </li>
        <li>
          <label>
            Jurusan
            <input type="text" name="jurusan" placeholder="jurusan" class="an" required>
          </label>
        </li>
        <li>
          <label>
            Gambar
            <input type="text" name="gambar" placeholder="gambar" class="an" required>
          </label>
        </li>
        <li>
          <button class="tombol" type="submit" name="tambah">Tambah Data!</button>
        </li>
      </ul>
    </form>
  </div>

</body>

</html>