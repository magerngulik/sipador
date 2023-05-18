<section class="container-fluit h-100 h-custom" >
  <div class="container-fluit py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
   
    <?php if(empty($history)):?>
        <div class="col-lg-8">
            <div class="alert alert-danger" role="alert">   
                Belum ada data transaksi
            </div>
        </div>                              
    <?php else :?>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body p-4">
          <p class="fw-bold fs-3">Riwayat Pesanan</p>
          
          <div class="row">
          <?php foreach ($history as $m): ?>
            <?php $color?>
          <?php $status?>
          <?php if ($m['status'] ==1) {
            $color = 'warning';
            $status = 'Diproses';
          } elseif ( $m['status'] ==2) {
            $color = 'success';
            $status = 'Dikirim';
          }else {
            $color = 'danger';
            $status = 'Sampai';
          }
          ?>
                
            <div class="col-md-3">
                <p class="fw-medium">Pengembalian </p>
                <p class="fs-5 fw-normal"> <?=$m['tanggal_pengembalian']?> </p>
            </div>
            <div class="col-md-3">
                <p class="fw-medium">Peminjaman </p>
                <p class="fs-5 fw-normal"> <?=$m['tanggal_penyewaan']?>  </p>              
            </div>
            <div class="col-md-2 ">
                <p class="fw-medium"> Status </p>
                <span class="badge text-bg-<?=$color?> justify-content-end"><?=$status?></span>
            </div>
            <div class="col-md-2 ">
                <p class="fw-medium"> Pembayaran </p>
                <p class="fw-normal">  <?=$m['pembayaran']?> </p>              
            </div>
          
            <div class="col-md-2 ">
                <p class="fw-medium"> Action </p>
                <a href="<?=base_url('member/detailHistory/').$m['id_penyewaan']?>" class="badge text-bg-success" style=" text-decoration: none;"> lihat</a>              
            </div>
            <?php endforeach; ?>
        </div>
    
        </div>
        </div>
    </div>
    <?php endif?>
    </div>
 </div>

 </section>