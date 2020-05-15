<?php 

session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

require 'function.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: update.php");
  exit;
}

// ambil id dari url
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$apparel = query("SELECT * FROM apparel WHERE id = $id")[0];

// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
          alert('data berhasil diubah');
          document.location.href = 'update.php';
          </script>";
  } else {
    echo "<script>
          alert('data gagal/tidak diubah');
          </script>";
  }
}

 ?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
       <!-- My css -->
      <link type="text/css" rel="stylesheet" href="../css/style.css">

      <title>Update Page</title>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
  
        <div class="container white mt-2 p-2 z-depth-2">
        	<span class="textlog">Edit Apparel</span>

          <hr>

        	<div class="row">
            <form action="" method="POST" enctype="multipart/form-data" class="col s12">
              
              <input type="hidden" name="id" value="<?= $apparel['id'];?>">

              <div class="row">
                <div class="input-field col s6">
                  <input id="nama" class="nama" name="nama" type="text" class="validate" autofocus autocomplete="off" value="<?= $apparel['nama']; ?>" required>
                  <label for="nama">Nama Apparel:</label>
                </div>

                <div class="input-field col s6 offset">
                    <textarea id="textarea1" name="deskripsi" class="materialize-textarea deskripsi" autocomplete="off" required><?= $apparel['deskripsi']; ?></textarea>
                    <label for="textarea1">Deskripsi Produk</label>
                </div>
              </div>  

              <div class="row">
                <div class="input-field col s6">
                  <input id="jenis_pakaian" class="jenis" name="jenis_pakaian" type="text" class="validate" autocomplete="off" value="<?= $apparel['jenis_pakaian']; ?>" required>
                  <label for="jenis_pakaian">Jenis Apparel:</label>
                </div>

                 <div class="input-field col s6">
                    <select name="ukuran" id="ukuran" required>
                      <option value="<?= $apparel['ukuran']; ?>">Ukuran Saat ini : <?= $apparel['ukuran']; ?></option>
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
                </div>
              </div>      

               <div class="row">
                <div class="input-field col s6">
                  <input id="harga" class="harga" name="harga" type="number" class="validate" autocomplete="off" value="<?= $apparel['harga']; ?>" required>
                  <label for="harga">Harga Apparel:</label>
                </div>
               </div>

              <div class="row">
                <input type="hidden" name="foto_lama" value="<?= $apparel['foto']; ?>">
                 <div class="file-field input-field col s6">
                  <div class="btn black">
                    <span>Upload Gambar</span>
                    <input type="file" name="foto" id="foto" class="gambarr" onchange="previewImage()">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" value="<?= $apparel['foto']; ?>">
                  </div>
                  <img src="../assets/img/<?= $apparel['foto']; ?>" width="120" height="200" style="display: block" class="img-preview">
                </div>
               </div>            
              
            <hr>

            <button class="btn waves-effect waves-light black mt-2" type="submit" name="ubah">Edit
            </button>
              
            </form>
          </div>

        </div>
  
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript" src="../js/scripts.js"></script>
      <script>
        
        const select = document.querySelectorAll('select');
        M.FormSelect.init(select);

        const textArea = document.querySelectorAll('#textarea1');
        M.textareaAutoResize.init(textArea);

      </script>
    </body>
  </html>