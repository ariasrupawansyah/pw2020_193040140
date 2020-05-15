<?php 

  require 'php/function.php';


  // pagination & search

  if (!empty($_GET['keyword'])) {  
    $keyword = $_GET['keyword'];
    $apparel = query("SELECT * FROM apparel WHERE 
              nama LIKE '%$keyword%' OR
              jenis_pakaian LIKE '%$keyword%'");
  } else {
    $apparel = query("SELECT * FROM apparel");
  }

  $jumlahDataHalaman = 8;
  $jumlahData = count($apparel);
  $jumlahTotalHalaman = ceil($jumlahData / $jumlahDataHalaman);
  $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
  // awal data
  $awalData = ($jumlahDataHalaman * $halamanAktif) - $jumlahDataHalaman;

  if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];
    $apparel = query("SELECT * FROM apparel WHERE 
              nama LIKE '%$keyword%' OR
              jenis_pakaian LIKE '%$keyword%' LIMIT $awalData, $jumlahDataHalaman");
  } else {
    $apparel = query("SELECT * FROM apparel LIMIT $awalData, $jumlahDataHalaman");
  }

  // show semua foto
    $fotoApparel = query("SELECT * from apparel WHERE foto != 'nophoto.png'");

?>

 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!-- My css -->
      <link rel="stylesheet" href="css/style.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body id="home" class="scrollspy">

      <!-- start navbar -->
      <div class="navbar-fixed">
        <nav class="setnav">
          <div class="nav-wrapper">
            <a href="#home" class="brand-logo"><img src="assets/img/Logo2.png" alt="MyLogo" width="70px"></a>
              <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li>
                  <form action="" method="get">
                      <div class="input-field">
                        <input name="keyword" id="keyword" class="keyword" type="search" autocomplete="off">
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                        <button name="search" class="tombol-cari" hidden>cari</button>
                      </div>
                    </form>
                </li>
                <li><a href="#list-apparel" class="waves-effect waves-light">List Apparel</a></li>
                <li><a href="#toplist" class="waves-effect waves-light">Show Product</a></li>
                <li><a href="php/login.php" class="waves-effect waves-light">Login for Admin</a></li>
              </ul>
          </div>
        </nav>
      </div>

      <ul class="sidenav" id="mobile-nav">
         <li>
          <form>
              <div class="input-field">
                  <input id="keyword" name="keyword" type="search" class="keyword" style="padding: 0 0 0 50px;" required>
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
                  <button name="search" class="tombol-cari" hidden>cari</button>
              </div> 
          </form>
        </li>
        <li><a href="#list-apparel" class="waves-effect waves-light">List Apparel</a></li>
        <li><a href="#toplist" class="waves-effect waves-light">Show Product</a></li>
        <li><a href="php/login.php" class="waves-effect waves-light">Login for Admin</a></li>
      </ul>      
     <!-- end navbar -->

     <!-- Slider -->

      <section id="home" class="home scrollspy">
        <div class="slider fullscreen">
           <ul class="slides">

              <li>
                  <img src="assets/img/sample1.jpg">
                  <div class="caption center-align">
                    <h3>Apparel of the year</h3>
                    <h5 class="light grey-text text-lighten-3">See our product to make more trendy.</h5>
                  </div>
              </li>

              <li>
                  <img src="assets/img/sample2.jpg">
                  <div class="caption right-align">
                    <h3>Best price, and Quality!</h3>
                    <h5 class="light grey-text text-lighten-3">The price must be cheap, but not to Quality.</h5>
                  </div>
              </li>
                  
                <li>
                  <img src="assets/img/sample3.jpg">
                  <div class="caption left-align">
                    <h3>Colorfull and Beautifull!</h3>
                    <h5 class="light grey-text text-lighten-3">Make yourself more fasionable!.</h5>
                  </div>
                </li>

          </ul>
        </div>
      </section>
      <!-- End Slider -->
    
      <!-- List Product page -->
      
      <section class="list-apparel scrollspy" id="list-apparel">

            <div class="container listapp">

              <h3 class="light center grey-text text-darken-3 judul">List Apparel</h3>

              <img src="assets/img/loading.gif" class="loadd">
                
                <div class="kotakAjax">

                  <?php if (empty($apparel)) : ?>

                    <h1 style="text-align: center">Data tidak ditemukan</h1>

                  <?php else : ?>

                  <div class="row">
                  
                  <?php foreach ($apparel as $apl) : ?>

                   <div class="col s12 m3">
                      <div class="card">
                        <div class="card-image">
                          <img src="assets/img/<?= $apl['foto']; ?>" class="gambar materialboxed" style="width: 160px;">
                          <span class="card-title blue-grey"><?= $apl['jenis_pakaian']; ?></span>
                        </div>              
                        <div class="card-action">
                          <a href="php/detail.php?id=<?= $apl['id'] ?>" class="namabaju black-text"><?= $apl['nama']; ?></a>
                        </div>
                      </div>
                    </div>        
                   
                  <?php endforeach; ?>

                  <?php endif; ?>
          
                  </div>
                
                <!-- Navigasi pagination -->

                <ul class="pagination" style="margin-left: 10px;">

                  <?php if ($halamanAktif > 1) : ?>

                   <?php if(empty($_GET['keyword'])): ?>

                     <li class="waves-effect"><a href="?halaman=<?= $halamanAktif - 1;?>"><i class="material-icons">chevron_left</i></a></li>
                      
                    <?php else : ?>  
                    
                    <li class="waves-effect"><a href="?halaman=<?= $halamanAktif - 1;?>&keyword=<?= $keyword ?>&search=<?= $_GET['search']?>"><i class="material-icons">chevron_left</i></a></li>

                    <?php endif; ?>

                  <?php endif; ?>
            
                  <?php for ($i=1; $i <= $jumlahTotalHalaman; $i++) : ?>

                     <?php if($i == $halamanAktif) : ?>

                      <?php if(isset($_GET['keyword'])) : ?>
                    
                        <li class="active waves-effect"><a href="?halaman=<?= $i;?>&keyword=<?= $keyword ?>&search=<?= $_GET['search']?>"><?= $i; ?></a></li>
                    
                      <?php else : ?>

                        <li class="active waves-effect"><a href="?halaman=<?= $i;?>"><?= $i; ?></a></li>

                      <?php endif; ?>

                     <?php else : ?>
                      
                      <?php if(isset($_GET['keyword'])) : ?>
                    
                        <li class="waves-effect"><a href="?halaman=<?= $i;?>&keyword=<?= $keyword ?>&search=<?= $_GET['search']?>"><?= $i; ?></a></li>
                    
                      <?php else : ?>

                        <li class="waves-effect"><a href="?halaman=<?= $i;?>"><?= $i; ?></a></li>

                      <?php endif; ?>

                     <?php endif; ?>

                    <?php endfor; ?>
                  
                  <?php if ($halamanAktif < $jumlahTotalHalaman) : ?>
                    
                    <?php if(empty($_GET['keyword'])): ?>

                     <li class="waves-effect"><a href="?halaman=<?= $halamanAktif + 1;?>"><i class="material-icons">chevron_right</i></a></li>
                      
                    <?php else : ?>  
                    
                    <li class="waves-effect"><a href="?halaman=<?= $halamanAktif + 1;?>&keyword=<?= $keyword ?>&search=<?= $_GET['search']?>"><i class="material-icons">chevron_right</i></a></li>

                    <?php endif; ?>

                  <?php endif; ?>
                  
                </ul>

            </div>

              <!-- End Navigasi pagination -->

            </div>

        </section>

      <!-- End List product page -->

      <!-- Start Top Product -->

      <section id="toplist" class="toplist scrollspy">

        <h3 class="judulcaro z-depth-2">See for our Product Here</h3>
        
        <div class="carousel bgcaro z-depth-3">

          <?php foreach ($fotoApparel as $foto) : ?>

            <i class="carousel-item z-depth-3" style="margin-top: -50px;"><img src="assets/img/<?= $foto['foto'];?>" width="100" height="300"></i>
        
          <?php endforeach; ?>

        </div>

      </section>

      <!-- End Top product -->

      <!-- Footer -->

        <footer class="page-footer grey darken-3">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text judulfooter">Aria Rupawansyah As Lord Amon</h5>
                <p class="grey-text text-lighten-4">Bandung, Jln Laswi Kawung sari, kecamatan baleendah,
                Kabupaten bandung.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Social Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" target="_blank" href="https://www.facebook.com/lucius.wayne.988">Facebook</a></li>
                  <li><a class="grey-text text-lighten-3" target="_blank" href="https://github.com/ariasrupawansyah/">Github</a></li>
                  <li><a class="grey-text text-lighten-3" target="_blank" href="https://twitter.com/GabrielUdon">Twitter</a></li>
                  <li><a class="grey-text text-lighten-3" target="_blank" href="https://www.instagram.com/ethan_wisteria/">Instagram</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2020 Copyright Aria 193040140 ALL RIGHTS RESERVED. 
            </div>
          </div>
        </footer>

      <!-- End Footer -->

      <!--JavaScript at end of body for optimized loading-->
      <script src="js/jquery-3.5.1.min.js"></script>
      <script src="js/scripts.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script>

        const sideNav = document.querySelectorAll('.sidenav');
         M.Sidenav.init(sideNav);

         const slider = document.querySelectorAll('.slider');
         M.Slider.init(slider, {
             indicators: false,
             height: 570,
             transition: 650,
             interval: 3000
         });

         const scroll = document.querySelectorAll('.scrollspy');
         M.ScrollSpy.init(scroll, {
             scrollOffset: 70,
         });

        const materialBoxed = document.querySelectorAll('.materialboxed');
         M.Materialbox.init(materialBoxed);


        const carouSel = document.querySelectorAll('.carousel');
         M.Carousel.init(carouSel);

      </script>
    </body>
  </html>