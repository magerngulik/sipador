<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- courosel -->
    <p class="text-center fs-3 mt-3 fw-semibold"> Daftar Product </p>
  
  
    <div class="container mt-3 card">
    <br>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
      <?php foreach ($produk as $m) : ?>
    
      <div class="col my-5 mx-5">
        <div class="card" style="width: 18rem;">
          <img src="<?= base_url('assets/img/produk/') . $m['foto_produk']; ?>" class="card-img" alt="<?=$m['nama_produk']?>">
          <div class="card-body">
            <h5 class="card-title"><?=ringkas( $m['nama_produk'],20)?></h5>
            <p class="card-text fw-bold"><?= rupiah($m['harga'])?> / Hari </p>
            <p class="card-text fw-bold"><?= ringkas( $m['deskripsi'],50) ?> </p>
            <div class="row">
              <div class="col">
                <a href="<?= base_url('member/addToCart/'). $m['id_produk'] ?>" class="btn btn-danger">Sewa</a>
                <a href="<?= base_url('member/detailProduk/'). $m['id_produk'] ?>" class="btn btn-success">Detail Barang</a>
              </div>
            </div>

          </div>
        </div>
      </div>

      <?php endforeach;?>
    </div>


    <?php 
      function rupiah($angka){
          $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
          return $hasil_rupiah;
      }        
        ?>
    <?php 
      function ringkas($text,$maxLength){
       return $shortenedText = substr($text, 0, $maxLength);
      }
    ?>

</div>
<!-- /.container-fluid -->
