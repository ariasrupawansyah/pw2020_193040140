<?php

session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}

require 'function.php';

$id = $_GET['id'];

if (hapus($id) > 0) {
  echo "<script>
            alert('Data Berhasil dihapus!'); 
            document.location.href = 'update.php';
          </script>";
} else {
  echo "<script>
            alert('Data Gagal dihapus!'); 
          </script>";
}
