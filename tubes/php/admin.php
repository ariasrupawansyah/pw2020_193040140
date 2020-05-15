<?php 

require 'function.php';

session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
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

      <title>Admin Page</title>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body class="grey lighten-4">

	<!-- Navbar -->
     <div class="navbar-fixed">
	    <nav class="black">
	      <div class="nav-wrapper">
	      <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><b>Dasboard Menu</b><i class="material-icons left">menu</i></a>
	      </div>
	    </nav>
	  </div>
	  <!-- end navbar -->
		
	  <!-- Menu sidebar -->
		<ul id="slide-out" class="sidenav">
		  <li>
			 <div class="user-view">
		       <a href="#user"><i class="large material-icons logo-side">person_pin</i></a>
		       <a href="#name"><span class="center black-text name backM mt--1 mb-3" style="font-size: 40px;">Hello <?= $_SESSION['username']; ?></span></a>
		     </div>
		  </li>
			<hr class="grey">
	      <li><a href="#">Home</a></li>
	      <li><a href="list.php">List Apparel</a></li>
	      <li><a href="tambah.php">Add Apparel</a></li>
	      <li><a href="update.php">Update List Apparel</a></li>
	      <li><a href="cetak.php" target="_blank">Cetak Laporan Apparel</a></li>
	      <li><a href="logout.php">Logout</a></li>
	    </ul>
	 <!-- end sidebar -->

		<!-- Bagian container -->
	   <section>
        <div class="container white p-2 mt-2 z-depth-2">
	        <h3 class="center mb-3">Selamat Datang <span class="red-text"><?= $_SESSION['username']; ?></span>, dihalaman Admin</h3>
	        <hr>
	        <p>Halaman ini merupakan halaman utama admin anda bisa menambahkan data apparel, mengubah dan menghapus data apparel, serta melihat list apparel.</p>
	        <h5>Panduan :</h5>
	        <ul>
	          <li>Untuk melakukan operasi crud data apparel, silahkan pilih menu dari navbar, dikiri atas halaman ini</li>
	          <li>Disana terdapat beberapa menu dengan fungsi:</li>
	          <br>
	          <li><b>Home :</b> Terdapat panduan website, yaitu halaman ini.</li>
	          <li><b>List Apparel :</b> Terdapat daftar dari apparel yang sudah terdaftar diweb ini.</li>
	          <li><b>Add Apparel :</b> Fitur yang dapat digunakan untuk menambahkan data apparel.</li>
	          <li><b>Update List Apparel :</b> Fitur yang didalamnya terdapat tombol yang digunakan untuk merubah dan menghapus data apparel.</li>
	          <br>
	          <li><b>Search :</b> Untuk mencari suatu data dalam list, anda bisa menggunakan fitur search pada bagian navbar pada page list, dan update dengan cara mengetikan nama atau bisa juga elemen lain seperti harga dan lain - lain.</li>
	          <li><b>Add Apparel :</b> Setelah menambahkan suatu data di menu add apparel, maka page akan otomatis diarahkan ke halaman list.</li>
	          <br>
	          <li><b>Note :</b> Untuk search dalam halaman admin page list atau update belum menggunakan pagination seperti yang terdapat di halaman index, ini karena saya pribadi memutuskan untuk tidak menambahkannya karena halamannya yang tidak memiliki footer, dan juga dibantu ajax.</li>
	          <li>Mohon maaf atas segala kekurangannya. Terima kasih</li>
	        </ul>
	        </div>
        </div> 
      </section> 
		<!-- End bagian container -->
	
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script>
      	
		 const sideNav = document.querySelectorAll('.sidenav');
         M.Sidenav.init(sideNav);
         
      </script>
    </body>
  </html>