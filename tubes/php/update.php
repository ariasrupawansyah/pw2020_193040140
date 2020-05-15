<?php 

require 'function.php';

session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
  exit;
}
  if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];
    $apparel = query("SELECT * FROM apparel WHERE 
              nama LIKE '%$keyword%' OR
              deskripsi LIKE '%$keyword%' OR
              ukuran LIKE '%$keyword%' OR
              harga LIKE '%$keyword%' OR
              jenis_pakaian LIKE '%$keyword%'");
  } else {
    $apparel = query("SELECT * FROM apparel");
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

      <title>List Page</title>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

    <!-- Navbar -->
     <div class="navbar-fixed">
	    <nav class="black">
	      <div class="nav-wrapper">
	      <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><b>Dasboard Menu</b><i class="material-icons left">menu</i></a>
	       <ul id="nav-mobile" class="right hide-on-med-and-down">
	          <li style="width: 500px">
                  <form action="" method="get">
                      <div class="input-field">
                        <input name="keyword" id="keyword" class="keyword-update grey-text" type="search" placeholder="search" autocomplete="off">
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                        <button name="search" class="tombol-cari-update" hidden>cari</button>
                      </div>
                   </form>
               </li>
	       </ul>
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
	      <li><a href="admin.php">Home</a></li>
	      <li><a href="list.php">List Apparel</a></li>
	      <li><a href="tambah.php">Add Apparel</a></li>
	      <li><a href="#">Update List Apparel</a></li>
	      <li><a href="cetak.php" target="_blank">Cetak Laporan Apparel</a></li>
	      <li><a href="logout.php">Logout</a></li>
	    </ul>
	 <!-- end sidebar -->
  
      
        <div class="container white mt-2 p-2 z-depth-2">
        	<span class="textlog">List Apparel</span>
        	<hr>
			<div class="kotakAjax">
	          <?php if (empty($apparel)) : ?>
	                <h3 class="red-text mt-2 mb-2" style="text-align: center;">Data apparel tidak ditemukan!</h3>
	          <?php endif; ?>
				
			    <?php foreach ($apparel as $apl) : ?>	
	      			<div class="row">
	      		
	      			<div class="col s12 m9">
	      			 <div class="card horizontal cP">
	      		      <div class="card-image gambardetail z-depth-2">
	      		        <img src="../assets/img/<?= $apl['foto']; ?>" style="width: 120px; height: 200px; margin-top: 20px;">
	      		      </div>
	      		      <div class="card-stacked">
	      		        <div class="card-content">
	      		          <h4 id="displayd"><?= $apl['nama'];?></h4>
	      		          <p>Detail Apparel:</p>
	      		          <p><?= $apl['jenis_pakaian']; ?></p>
	      		          <p class="grey-text"><?= $apl['ukuran']; ?></p>
	      				      <h5>Rp. <?= $apl['harga'];?></h5>
	                    
	                    <div class="row">
	                      <div class="col s12 m6">
	                        <a href="edit.php?id=<?= $apl['id']; ?>" class="white-text"><button class="btn waves-effect waves-lightgreen mt-2" type="submit">Edit
	                          <i class="material-icons right">send</i>
	                        </button>
	                        </a>
	                      </div>
	                      <div class="col s12 m6">
	                         <a href="delete.php?id=<?= $apl['id']; ?>" class=" white-text"><button class="btn waves-effect waves-light  white-text red mt-2" type="submit" name="hapus" onclick="return confirm('apakah anda yakin?');">Delete
	                          <i class="material-icons right">send</i>
	                        </button>
	                        </a>
	                      </div>
	                    </div>

	                    </button>
	      		        </div>
	      		      </div>
	      		     </div>
	      			</div>

	      			<div class="col s12 m3">
	      			  <div class="card grey lighten-3 displaydes h-10">
	      		        <div class="card-content black-text">
	      		          	<span class="card-title jDesk" style="font-size: 40px;">Deskripsi :</span>
	      		          	<p><?= $apl['deskripsi'];?></p>
	      		        	</div>
	      		      	</div>
	      			  </div>	
	      			</div>
    			<?php endforeach; ?>

        </div>
      </div>  
  
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript" src="../js/script-update.js"></script>
      <script>
      	
		const sideNav = document.querySelectorAll('.sidenav');
        M.Sidenav.init(sideNav);
         
      </script>
    </body>
  </html>