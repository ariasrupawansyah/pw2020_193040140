<?php

require 'function.php';

if (isset($_POST["tambah"])) {

  if (tambah($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil ditambahkan!'); 
            document.location.href = 'admin.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal ditambahkan!'); 
            document.location.href = 'admin.php';
          </script>";
  }
}

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Data Page</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>

<body class="bodyb">

  <div class="form">

    <h3>Form Tambah Data Pakaian :</h3>

    <hr>

    <form action="" method="post">

      <table class="tabletambah">
        <tr>
          <td>
            <label>
              Nama Pakaian :
          </td>
          <td>
            <input type="text" name="nama" id="nama" required autofocus>
            </label>
          </td>
        </tr>


        <tr>
          <td>
            <label>
              Jenis Pakaian :
          </td>
          <td>
            <input type="text" name="jenis_pakaian" id="jenis_pakaian" required>
            </label>
          </td>
        </tr>

        <tr>
          <td>
            <label>
              Deskripsi :
          </td>
          <td>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" required></textarea>
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
              <option value="">-- Ukuran Pakaian --</option>
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
            <input type="number" name="harga" id="harga" required>
            </label>
          </td>
        </tr>

        <tr>
          <td>
            <label>
              Gambar :
          </td>
          <td>
            <input type="text" name="foto" id="foto" required>
            </label>
          </td>
        </tr>

      </table>

      <hr>

      <button type="submit" name="tambah" class="blueButton">Tambah Data</button>

    </form>

    <a href="admin.php"><button type="submit" class="blueButton">Kembali</button></a>

  </div>

</body>

</html>