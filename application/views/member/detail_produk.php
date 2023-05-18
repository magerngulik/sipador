<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- courosel -->
    <br>
    <div class="container card">
      <div class="container mx-3 my-3">
      <p class="text-center fs-3 mt-3 fw-semibold"> Detail Produk </p>
        <div class="row">


          <div class="col-md-4">
            <img src="<?= base_url('assets/img/produk/') . $detail['foto_produk']; ?>" class="card-img" >
          </div>
          <div class="col-md-8">
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label"> Nama Barang</label>
                <div class="col-sm-8">
                <label class="col-sm col-form-label"><?=$detail['nama_produk'];?></label>
              </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label"> Harga Sewa</label>
                <div class="col-sm-5">
                <label class="col-sm-4 col-form-label"><?=$detail['harga'];?> / Hari</label>
              </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label"> Deskripsi</label>
                <div class="col-sm-8">
                <label class="col-sm col-form-label"><?=$detail['deskripsi'];?></label>
              </div>
            </div>

            <div class="col-md-4">
              <a href="<?= base_url('member/addToCart/'). $detail['id_produk'] ?>" class="btn btn-danger">Sewa</a>
              <a href="<?= base_url('member/produk') ?>" class="btn btn-secondary">Kembali</a>
            </div>

          </div>
      </div>
    </div>
   
</div>
<!-- /.container-fluid -->
