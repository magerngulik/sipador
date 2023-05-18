<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-8">
            <div class="row g-4 align-items-center mt-3">
                <div class="col-md-3">
                    <label for="inputPassword6" class="col-form-label">Tanggal Peminjaman</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" value="<?=$sPenyewaan['tanggal_penyewaan']?>" readonly>
                </div>
            </div>

            <div class="row g-4 align-items-center mt-2">
                <div class="col-md-3">
                    <label for="inputPassword6" class="col-form-label">Tanggal Pengembalian</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" value="<?=$sPenyewaan['tanggal_pengembalian']?>" readonly>
                </div>
            </div>
            <?php $color?>
            <?php $status?>
            <?php if ($sPenyewaan['status'] ==1) {
                $color = 'warning';
                $status = 'Diproses';
            } elseif ( $sPenyewaan['status'] ==2) {
                $color = 'success';
                $status = 'Dikirim';
            }else {
                $color = 'danger';
                $status = 'Sampai';
            }
            ?>
            
            <div class="row g-4 align-items-center mt-2">
                <div class="col-md-3">
                    <label for="inputPassword6" class="col-form-label">Pembayaran</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline" value="<?=$sPenyewaan['pembayaran']?>"readonly>
                </div>
            </div>
            <?= form_open_multipart('produk/detailPenyewaan/'.$dataid )?>
            <div class="row g-4 align-items-center mt-1">
                <div class="col-md-3">
                    <label for="inputPassword6" class="col-form-label">Status</label>
                </div>
                <div class="col-auto">
                    <div class="form-group">
                        <select name="status" id="status" class="form-control">
                            <option value="<?= $sPenyewaan['status']?>"><?= $status ?></option>
                            <option value="1">Diproses</option>
                            <option value="2">Dikirim</option>
                            <option value="3">Sampai</option>
                            </select>
                    </div>
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
                    <td><?=$m['harga']?></td>
                </tr>
                <?php $i++?>

                <?php $subTotal = $hari * $m['jumlah_pinjam'] * $m['harga']; ?>
                <?php $total = $subTotal + $total; ?>
                <?php endforeach; ?>
                     
                <tr>
                    <th scope="row">#</th>
                    <td class="fw-bold" colspan="4">Total bayar</td>
                    <td class="fw-bold" ><?=rupiah($total)?></td>
                </tr>
            
            </tbody>
            </table>

            <div class="row">
                <div class="col-lg-6 align-self-end">
                    <button type="submit" name=editBuku class="btn btn-success">Simpan</button>
                    <a  href="<?= base_url('produk/penyewaan/'); ?>" name=kembali class="btn btn-secondary">Kembali</a>
                </div>
            </div>



          
        </div>
    </div>
       
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php 
     function rupiah($angka){
 
         $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
         return $hasil_rupiah;
     }        
 ?>