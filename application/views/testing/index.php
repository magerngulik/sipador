<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg-8">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="<?= base_url('produk/addProduct') ?>" class="btn btn-primary mb-3">Tambah Produk Baru</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($produk as $m) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td> <img src="<?= base_url('assets/img/produk/') . $m['foto_produk']; ?>" class="img-thumbnail" alt="produk" style="max-height: 100px;"></td>
                        <td><?= $m['nama_produk']; ?></td>
                        <td><?= rupiah($m['harga'])  ?></td>
          
                        <td><?= $m['jumlah']; ?></td>
                        <td>
                            <a href="<?= base_url('produk/editProduk/').$m['id_produk'] ?>" class="badge badge-success">edit</a>
                            <a href="<?= base_url("produk/deleteProduk/").$m["id_produk"] ?>" class="badge badge-danger">delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
        <?php 
            function rupiah($angka){
        
                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;
            }        
        ?>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
