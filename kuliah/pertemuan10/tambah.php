<?php

require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
          alert('data berhasil ditambahkan');
          document.location.href = 'latihan3.php';
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
            <input type="text" name="nama" placeholder="Nama" autofocus required>
          </label>
        </li>
        <li>
          <label>
            NRP
            <input type="text" name="nrp" placeholder="Nrp" required>
          </label>
        </li>
        <li><label>
            Email
            <input type="text" name="email" placeholder="email" required>
          </label>
        </li>
        <li>
          <label>
            Jurusan
            <input type="text" name="jurusan" placeholder="jurusan" required>
          </label>
        </li>
        <li>
          <label>
            Gambar
            <input type="text" name="gambar" placeholder="gambar" required>
          </label>
        </li>
        <li>
          <button type="submit" name="tambah">Tambah Data!</button>
        </li>
      </ul>
    </form>
  </div>

</body>

</html>