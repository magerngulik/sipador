<section class="container-fluit h-100 h-custom" >
  <div class="container-fluit py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
    
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body p-4">
          <p class="fw-bold fs-3">Detail Pembayaran</p>
           <p class="fs-4 "><?=$message?></p>

          <a href="<?= base_url("member/history") ?>" class="btn btn-danger">Kembali</a>
          </div>
        </div>
       
       </div>
       
    </div>
 </div>

 </section>

 <?php 
     function rupiah($angka){
         $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
         return $hasil_rupiah;
     }        
 ?>