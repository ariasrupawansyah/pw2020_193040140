<?php 


require "../php/function.php";

    $keyword = $_GET['keyword'];

    $apparel = query("SELECT * FROM apparel WHERE 
              nama LIKE '%$keyword%' OR
              jenis_pakaian LIKE '%$keyword%'");

   $jumlahDataHalaman = 8;
   $jumlahData = count($apparel);
   $jumlahTotalHalaman = ceil($jumlahData / $jumlahDataHalaman);
   $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
   // awal data
   $awalData = ($jumlahDataHalaman * $halamanAktif) - $jumlahDataHalaman;

	    $apparel = query("SELECT * FROM apparel WHERE 
	              nama LIKE '%$keyword%' OR
	              jenis_pakaian LIKE '%$keyword%' LIMIT $awalData, $jumlahDataHalaman");

 ?>

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

       <ul class="pagination" style="margin-left: 10px;">

          <?php if ($halamanAktif > 1) : ?>

            <li class="waves-effect"><a href="?halaman=<?= $halamanAktif - 1;?>&keyword=<?= $keyword ?>&search="><i class="material-icons">chevron_left</i></a></li>

          <?php endif; ?>
            
          <?php for ($i=1; $i <= $jumlahTotalHalaman; $i++) : ?>

              <?php if($i == $halamanAktif) : ?>

                   <?php if(isset($_GET['keyword'])) : ?>
                    
                        <li class="active waves-effect"><a href="?halaman=<?= $i;?>&keyword=<?= $keyword ?>&search="><?= $i; ?></a></li>
                    
                    <?php else : ?>

                        <li class="active waves-effect"><a href="?halaman=<?= $i;?>"><?= $i; ?></a></li>

                    <?php endif; ?>

              <?php else : ?>
                      
                    <?php if(isset($_GET['keyword'])) : ?>
                    
                        <li class="waves-effect"><a href="?halaman=<?= $i;?>&keyword=<?= $keyword ?>&search="><?= $i; ?></a></li>
                    
                    <?php else : ?>

                        <li class="waves-effect"><a href="?halaman=<?= $i;?>"><?= $i; ?></a></li>

                    <?php endif; ?>

              <?php endif; ?>

          <?php endfor; ?>
                  
          <?php if ($halamanAktif < $jumlahTotalHalaman) : ?>

              <li class="waves-effect"><a href="?halaman=<?= $halamanAktif + 1;?>&keyword=<?= $keyword ?>&search="><i class="material-icons">chevron_right</i></a></li>
    
          <?php endif; ?>
                  
        </ul>
                
       