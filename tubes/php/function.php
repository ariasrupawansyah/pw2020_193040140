<?php

function koneksi()
{

	$conn = mysqli_connect("localhost", "root", "") or die("Koneksi ke DB gagal");

	mysqli_select_db($conn, "tubes_193040140") or die("Database salah");

	return $conn;
}

function query($sql)
{
	$conn = koneksi();
	$result = mysqli_query($conn, "$sql");

	$laci = [];
	while ($isi = mysqli_fetch_assoc($result)) {
		$laci[] = $isi;
	}

	return $laci;
}

function tambah($data)
{
	$conn = koneksi();

	$nama = htmlspecialchars($data['nama']);
	$jenis = htmlspecialchars($data['jenis']);
	$deskripsi = htmlspecialchars($data['deskripsi']);
	$ukuran = htmlspecialchars($data['ukuran']);
	$harga = htmlspecialchars($data['harga']);
	// $foto = htmlspecialchars($data['foto']);

  // upload gambar
  $foto = upload();

  if (!$foto) {
    return false;
  }

	$query = "INSERT INTO apparel
						VALUES
						(null , '$foto', '$jenis', '$deskripsi', '$nama', '$ukuran', '$harga')";

	mysqli_query($conn, $query);

	echo mysqli_error($conn);

	return mysqli_affected_rows($conn);
}

function hapus($id)
{
	$conn = koneksi();

  // menghapus gambar di folder img

  $apl = query("SELECT * FROM apparel WHERE id = $id")[0];
  if ($apl['foto'] != 'nophoto.png') {
    unlink('../assets/img/' . $apl['foto']);
  }

	mysqli_query($conn, "DELETE FROM apparel where id = $id")or die(mysqli_error($conn));

	return mysqli_affected_rows($conn);
}

function ubah($data)
{
	$conn = koneksi();

	$id = htmlspecialchars($data['id']);
	$nama = htmlspecialchars($data['nama']);
	$jenis = htmlspecialchars($data['jenis_pakaian']);
	$deskripsi = htmlspecialchars($data['deskripsi']);
	$ukuran = htmlspecialchars($data['ukuran']);
	$harga = htmlspecialchars($data['harga']);
	// $foto = htmlspecialchars($data['foto']);
  $foto_lama = htmlspecialchars($data['foto_lama']);

  $foto = upload();
  
  if (!$foto) {
    return false;
  }

  if ($foto == 'nophoto.png') {
    $foto = $foto_lama;
  }

	$query = "UPDATE apparel
						SET
						foto = '$foto',
						jenis_pakaian = '$jenis',
						deskripsi = '$deskripsi',
						nama = '$nama',
						ukuran = '$ukuran',
						harga = '$harga'
						WHERE
						id = '$id'
						";

	mysqli_query($conn, $query);

	echo mysqli_error($conn);

	return mysqli_affected_rows($conn);
}

function login($data)
{


  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
  // mencocokan Username dan Password

  if (mysqli_num_rows($cek_user) > 0) {
    $user = mysqli_fetch_assoc($cek_user);
    if (password_verify($password, $user['password'])) {

      $_SESSION['username'] = $_POST['username'];
      $_SESSION['hash'] = hash('sha256', $user['id'], false);

      // jika remember me dicentang
      if (isset($data['remember'])) {
        setcookie('username', $row['username'], time() + 60 * 60 * 24);
        $hash = hash('sha256', $row['id']);
        setcookie('hash', $hash, time() + 60 * 60 * 24);
      }

      if (hash('sha256', $user['id']) == $_SESSION['hash']) {
        header("Location: admin.php");
        die;
      }
      header("Location: ../index.php");
      die;
    }
  }

   return [
    'error' => true,
    'pesan' => 'Username / Password Salah!'
  ];

}

function registrasi($data)
{
  $conn = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  // jika username / password kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "
      <script>
        alert('username /password tidak boleh kosong!');
        document.location.href = 'register.php';
        </script>
       ";
    return false;
  }

  // jika username sudah ada
  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
            alert('username sudah terdaftar!');
            document.location.href = 'register.php';
          </script>";
    return false;
  }

  // jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
            alert('konfirmasi password tidak sesuai!');
            document.location.href = 'register.php';
          </script>";
    return false;
  }

  // jika password < 5 digit
  if (strlen($password1) < 5) {
    echo "<script>
            alert('password terlalu pendek!');
            document.location.href = 'register.php';
          </script>";
    return false;
  }

  // jika username dan password sudah sesuai
  // enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // insert ke table user
  $query = "INSERT INTO user
            VALUES
            (null, '$username', '$password_baru')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function upload()
{
  $nama_file = $_FILES['foto']['name'];
  $tipe_file = $_FILES['foto']['type'];
  $ukuran_file = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmp_file = $_FILES['foto']['tmp_name'];

  // ketika tidak ada gambar yang dipilih

  if ($error == 4) {
    // echo "<script>alert('pilih gambar terlebih dahulu!');
    //       </script>";
    return 'nophoto.png';
  }

  // cek ekstensi file 
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));

  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
          alert('yang anda pilih bukan gambar!');
          </script>";
    return false;
  }

  // cek tipe file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
          alert('yang anda pilih bukan gambar!');
          </script>";
    return false;
  }

  // cek ukuran file
  // maksimal 5mb = 5000000
  if ($ukuran_file > 5000000) {
    echo "<script>
          alert('ukuran terlalu besar!');
          </script>";
    return false;
  }

  // lolos pengecekan
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, '../assets/img/' . $nama_file_baru);

  return $nama_file_baru;
}




 
