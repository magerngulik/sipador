<section class="container-fluit h-100 h-custom" >
  <div class="container-fluit py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
    
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body p-4">
          <p class="fw-bold fs-3">Detail Pesanan</p>
          <div class="row g-4 align-items-center mt-3">
            <div class="col-md-3">
                <label for="inputPassword6" class="col-form-label">Tanggal Peminjaman</label>
            </div>
            <div class="col-auto">
                <input type="text" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" value="<?=$payment['tanggal_penyewaan']?>" readonly>
            </div>
          </div>

          <div class="row g-4 align-items-center mt-1">
            <div class="col-md-3">
                <label for="inputPassword6" class="col-form-label">Tanggal Pengembalian</label>
            </div>
            <div class="col-auto">
                <input type="text" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" value="<?=$payment['tanggal_pengembalian']?>" readonly>
            </div>
          </div>

          <?= form_open_multipart('member/payment/') ?>
          <div class="row g-4 align-items-center mt-1">
            <div class="col-md-3">
                <label for="inputPassword6" class="col-form-label">Pembayaran</label>
            </div>
            <div class="col-auto">
              <select class="form-select" aria-label="Default select example" name="pembayaran" id="pembayaran">      
                    <option value="1">COD</option>
                    <option value="2">Dana</option>
                    <option value="3">OVO</option>
                    <option value="4">Transfer Bank</option>
                  </select>
                    <?= form_error('pembayaran', '<small class="text-danger pl-3">', '</small>'); ?> 
            </div>
          </div>

          <p class="fw-bold fs-5 mt-3">Semua Transaksi</p>
          
          <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Foto Produk</th>
                <th scope="col">Lama Penyewaan</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php $i = 1; ?>
                <?php $subTotal = 0; ?>
                <?php $total = 0; ?>
                <?php if ($hari ==0) {
                  $hari =1;
                } ?>
                <?php foreach ($cart as $m) : ?>

                <th scope="row"><?= $i; ?></th>  
                    <td><?=$m['name'];?></td>
                    <td> <img src="<?= base_url('assets/img/produk/') . $m['foto_produk']; ?>" class="img-thumbnail" alt="produk" style="max-height: 100px;"></td>
                    <td><?=$hari?> hari</td>
                    <td><?=$m['qty'];?></td>
                    <td><?=rupiah( $m['price'])?></td>

                </tr>
                <?php $i++; ?>
                <?php $subTotal = ($hari/7) * $m['qty'] * $m['price']; ?>
                <?php $total = $subTotal + $total; ?>
                <?php endforeach;?>
                <tr>
                    <th scope="row">#</th>
                    <td class="fw-bold" colspan="4">Total bayar</td>
                    <td class="fw-bold" ><?=rupiah($total)?></td>
                </tr>
            </tbody>
            </table>

            <div class="row">
                <div class="col-lg-6 align-self-end">
                  <button type="submit" name=editBuku class="btn btn-success">Bayar</button>
                  <a  href="<?= base_url('member/card/'); ?>" name=kembali class="btn btn-secondary">Kembali</a>
                </div>
            </div>

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