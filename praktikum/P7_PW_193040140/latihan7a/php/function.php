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
	$jenis = htmlspecialchars($data['jenis_pakaian']);
	$deskripsi = htmlspecialchars($data['deskripsi']);
	$ukuran = htmlspecialchars($data['ukuran']);
	$harga = htmlspecialchars($data['harga']);
	$foto = htmlspecialchars($data['foto']);

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
	mysqli_query($conn, "DELETE FROM apparel where id = $id");

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
	$foto = htmlspecialchars($data['foto']);

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
