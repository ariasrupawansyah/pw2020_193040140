<?php 

require '../php/function.php';

 $keyword = $_GET['keyword'];
 $apparel = query("SELECT * FROM apparel WHERE 
              nama LIKE '%$keyword%' OR
              deskripsi LIKE '%$keyword%' OR
              ukuran LIKE '%$keyword%' OR
              harga LIKE '%$keyword%' OR
              jenis_pakaian LIKE '%$keyword%'");

 ?>

 			<div class="kotakAjax">
	          <?php if (empty($apparel)) : ?>
	                <h3 class="red-text mt-2 mb-2" style="text-align: center;">Data apparel tidak ditemukan!</h3>
	          <?php endif; ?>
				
				<?php foreach ($apparel as $apl) : ?>	
				<div class="row">
			
				<div class="col s12 m9">
				 <div class="card horizontal cP">
			      <div class="card-image gambardetail z-depth-2">
			        <img src="../assets/img/<?= $apl['foto']; ?>" style="width: 120px; height: 200px;">
			      </div>
			      <div class="card-stacked">
			        <div class="card-content">
			          <h4 id="displayd"><?= $apl['nama'];?></h4>
			          <p>Detail Apparel:</p>
			          <p><?= $apl['jenis_pakaian']; ?></p>
			          <p class="grey-text"><?= $apl['ukuran']; ?></p>
					  <h5>Rp. <?= $apl['harga'];?></h5>
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