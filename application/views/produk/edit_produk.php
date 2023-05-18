<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
    
                <?= $this->session->flashdata('message'); ?>

            <?= form_open_multipart('produk/editProduk/'.$singleProduk['id_produk']); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" value="<?=$singleProduk['nama_produk']?>">
                    <?= form_error('nama_produk', '<small class="text-danger pl-3">', '</small>'); ?>           
                </div>
            </div>
     
        
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"> Harga</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" value="<?=$singleProduk['harga']
                ?>">
                    <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>           
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">Foto Produk</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/produk/') . $singleProduk['foto_produk']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" value="<?=$singleProduk['jumlah']
                ?>">
                    <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>           
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"><?=$singleProduk['deskripsi']?> </textarea>
                    <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>           
                </div>
            </div>
            
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" name=editBuku class="btn btn-primary">Edit Data</button>
                    <a href="<?= base_url('produk/'); ?>" name=editBuku class="btn btn-secondary">Kembali</a>
                </div>
            </div>
      


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 