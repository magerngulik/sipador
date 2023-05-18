<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- courosel -->
    <p class="text-center fs-3 mt-3 fw-semibold"> Selamat Datang </p>
  
  
    <div class="container mt-3">


      <div class="row justify-content-center">
       <div class="col-lg-6">

        <div id="carouselExampleIndicators" class="carousel slide">
          <div class="carousel-indicators">
            <?php $i=1?>
              <?php foreach ($produk as $m) :?>
              <?php if ($i ==1) :?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <?php else:?> 
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$i-1?>" aria-label="Slide <?=$i?>"></button>        
              <?php endif?>
         
              <?php $i++?>
              <?php endforeach ;?>
            </div>
            <div class="carousel-inner">
              <?php $i=1?>
              <?php foreach ($produk as $m) :?>
              <?php if ($i ==1) :?>
              <div class="carousel-item active">
                <img src="<?= base_url('assets/img/produk/') . $m['foto_produk']; ?>"  class="d-block w-100" alt="<?= $m["nama_produk"]?>">
              </div>    
              <?php else:?>  
              <div class="carousel-item">
                <img src="<?= base_url('assets/img/produk/') . $m['foto_produk']; ?>"  class="d-block w-100" alt="<?= $m["nama_produk"]?>">
              </div>
              <?php endif?>
              <?php $i++?>
              <?php endforeach ;?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        </div>
      </div>
     <!-- Tutup courosel -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
