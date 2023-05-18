<section class="h-100 h-custom" >
  <div class="container py-5 h-100">
  <?php if(empty($cart)):?>
        <div class="col-lg">
            <div class="alert alert-danger" role="alert">   
                Belum ada data transaksi
            </div>
        </div>                              
    <?php else :?>
    <div class="row d-flex justify-content-center align-items-center h-100">
 

      <div class="col-lg-8">
        <div class="card">
          <div class="card-body p-4">
            
       
            <div class="row">

              <div class="col-lg">
        
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1 fw-bold">Keranjang Belanja</p>
                    <p class="mb-0">Kamu punya <?=count($cart)?> item di keranjang</p>
                  </div>
                </div>
                <?php foreach ($cart as $m): ?>
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="<?= base_url('assets/img/produk/') . $m['foto_produk']; ?>"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5><?=$m['name']?></h5>
                          <!-- <p class="small mb-0">256GB, Navy Blue</p> -->
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <a href="<?= base_url('member/removeItem/').$m['rowid'] ?>"  class="btn btn-light rounded-circle ms-5">-</a>
                        <!-- <button href="" type="button" class="btn btn-light rounded-circle ms-5">-</button> -->
                        <h5 class="fw-normal mb-0"><?=$m['qty']?></h5>
                        <a href="<?= base_url('member/addItem/').$m['rowid'] ?>" class="btn btn-light rounded-circle">+</a>
                        <div style="width: 120px;">
                          <h5 class="mb-0 fs-5"><?=rupiah($m['price'])?></h5>
                        </div>
                        <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

                <?php endforeach;?>

              
            <form action="" method="post">

                    
              <div class="form-group row">
                <div class="col-lg">
                  <label for="tglKembali" class="form-label mx-3">Tanggal Kembali</label>
                  <input type="date" id="tanggal" name="tanggal">
                  <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>

                </div>
              </div>
              <div class="mb-3 mt-3">
                <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?=$user['alamat']?>">
              </div>

              <div class="form-group row">
                <label for="pesan" class="form-label">Pesan</label>
                <div class="col-lg">
                  <textarea class="form-control" id="pesan" rows="3" name="pesan"></textarea>
                  <?= form_error('pesan', '<small class="text-danger pl-3">', '</small>'); ?>     
                </div>
              </div>
             

              <button type="submit" name="tambahPesanan" class="btn btn-success mt-5">Lanjutkan</button>
              
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  <?php endif?>
  
</section>

<?php 
function rupiah($angka){
        
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
}        
?>
