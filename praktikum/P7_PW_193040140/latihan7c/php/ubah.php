<?php

session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}
require 'function.php';

$id = $_GET['id'];
$apl = query("SELECT * FROM apparel WHERE id = $id")[0];

if (isset($_POST["ubah"])) {

  if (ubah($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil diubah!'); 
            document.location.href = 'admin.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal diubah!'); 
            document.location.href = 'admin.php';
          </script>";
  }
}

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Data Page</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body class="bodyc">

  <div class="form">

    <h3>Form Ubah Data Pakaian :</h3>

    <hr>

    <form action="" method="post">

      <input type="hidden" name="id" id="id" value="<?= $apl['id']; ?>">

      <table class="tabletambah">
        <tr>
          <td>
            <label>
              Nama Pakaian :
          </td>
          <td>
            <input type="text" name="nama" id="nama" required autofocus value="<?= $apl['nama']; ?>">
            </label>
          </td>
        </tr>


        <tr>
          <td>
            <label>
              Jenis Pakaian :
          </td>
          <td>
            <input type="text" name="jenis_pakaian" id="jenis_pakaian" required value="<?= $apl['jenis_pakaian']; ?>">
            </label>
          </td>
        </tr>

        <tr>
          <td>
            <label>
              Deskripsi :
          </td>
          <td>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" required><?= $apl['deskripsi']; ?></textarea>
            </label>
          </td>
        </tr>

        <tr>
          <td>
            <label>
              Ukuran :
          </td>
          <td>
            <select name="ukuran" id="ukuran" required>
              <option value="<?= $apl['ukuran']; ?>"> Ukuran Saat ini : <?= $apl['ukuran']; ?></option>
              <option value="S">S</option>
              <option value="S, M">S, M</option>
              <option value="S, M, L">S, M, L</option>
              <option value="S, M, L, XL">S, M, L, XL</option>
              <option value="M">M</option>
              <option value="M, L">M, L</option>
              <option value="M, L, XL">M, L, XL</option>
              <option value="L">L</option>
              <option value="L, XL">L, XL</option>
              <option value="XL">XL</option>
            </select>
            </label>
          </td>
        </tr>

        <tr>
          <td>
            <label>
              Harga :
          </td>
          <td>
            <input type="number" name="harga" id="harga" required value="<?= $apl['harga']; ?>">
            </label>
          </td>
        </tr>

        <tr>
          <td>
            <label>
              Gambar :
          </td>
          <td>
            <input type="text" name="foto" id="foto" required value="<?= $apl['foto']; ?>">
            </label>
          </td>
        </tr>

      </table>

      <hr>

      <button type="submit" name="ubah" class="greenButton">Ubah Data!</button>

    </form>

    <a href="admin.php"><button type="submit" class="greenButton">Kembali</button></a>

  </div>

</body>

</html>