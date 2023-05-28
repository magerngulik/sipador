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
                <input type="text" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" value="<?=$history['tanggal_penyewaan']?>" readonly>
            </div>
          </div>

          <div class="row g-4 align-items-center mt-1">
            <div class="col-md-3">
                <label for="inputPassword6" class="col-form-label">Tanggal Pengembalian</label>
            </div>
            <div class="col-auto">
                <input type="text" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" value="<?=$history['tanggal_pengembalian']?>" readonly>
            </div>
          </div>
          <?php $color?>
          <?php $status?>
          <?php if ($history['status'] ==1) {
            $color = 'warning';
            $status = 'Diproses';
          } elseif ( $history['status'] ==2) {
            $color = 'success';
            $status = 'Di Kirim';
          }else {
            $color = 'danger';
            $status = 'Sampai';
          }
          ?>
          


          <div class="row g-4 align-items-center mt-1">
            <div class="col-md-3">
                <label for="inputPassword6" class="col-form-label">Status</label>
            </div>
            <div class="col-auto">
                <span class="badge text-bg-<?=$color?> justify-content-end"><?=$status?></span>
            </div>
          </div>

          <div class="row g-4 align-items-center my-3">
            <div class="col-md-3">
                <label for="inputPassword6" class="col-form-label">Pembayaran</label>
            </div>
            <div class="col-auto">
                <input type="text" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" name="pembayaran" id="pembayaran" value="<?=$history['pembayaran']?>" readonly >
            </div>
          </div>
   

          <?php if ($penyewaan['bukti_pembayaran'] == "default.png") :?>
          <?= form_open_multipart('member/detailHistory/'.$id) ?>
            <div class="form-group row">
              <div class="row g-4 align-items-center my-3">
                <div class="col-md-3">
                  <label for="email" class="col-form-label">Nama Pengirim</label>
                </div>
                <div class="col-auto">
                  <input type="text" class="form-control" id="harga" name="harga" placeholder="Nama Pengirim">
                  <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?> 
                </div>
              </div>
            </div>

          <input type="hidden" name="id" value="<?php $id?>">      
          <div class="form-group row">
                <div class="col-md-3">Foto Produk</div>
                <div class="col-sm-auto">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <?php else: ?>
            <div class="form-group row">
              <div class="row g-4 align-items-center my-3">
                <div class="col-md-3">
                  <label for="email" class="col-form-label">Bukti Pembayaran</label>
                </div>
                <div class="col-auto">
                  <p> Bukti Pembayaran sudah di upload</p>
                </div>
              </div>
            </div>
          <?php endif;?>
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
              <?php $i=1?>
              <?php $subTotal = 0; ?>
                <?php $total = 0; ?>
              
              <?php foreach ($detail as $m): ?>  
                <tr>
                <th scope="row"><?=$i?></th>
                <?php $hari = $m['lama_penyewaan']?>
                <?php if ($hari ==0) {
                  $hari =1;
                } ?>
                    <td><?=$m['nama_produk']?></td>
                    <td> <img src="<?= base_url('assets/img/produk/') . $m['foto_produk']; ?>" class="img-thumbnail" alt="produk" style="max-height: 100px;"></td>
                    <td><?=$hari?> hari</td>
                    <td><?=$m['jumlah_pinjam']?></td>
                    <td><?=rupiah($m['harga'])?></td>
                </tr>
                <?php $i++?>

                <?php $subTotal = ($hari/7) * $m['jumlah_pinjam'] * $m['harga']; ?>
                <?php $total = $subTotal + $total; ?>
                <?php endforeach; ?>
                     
                <tr>
                    <th scope="row">#</th>
                    <td class="fw-bold" colspan="4">Total bayar</td>
                    <td class="fw-bold" ><?=rupiah($total)?></td>
                </tr>
            
              </tbody>
            </table>

            

            <div class="form-group row">
                <div class="col-sm-10">
                  <?php if ($penyewaan['bukti_pembayaran'] == "default.png") :?>
                    <button type="submit" name=editBuku class="btn btn-primary">Simpan Data</button>
                  <?php endif;?>
                  <a  href="<?= base_url('member/history/'); ?>" name=kembali class="btn btn-secondary">Kembali</a>
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