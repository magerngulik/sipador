<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Konsumen</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Pesan</th>
                        <th scope="col">Tanggal Penyewaan</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th scope="col">Pembayaran</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($penyewaan as $m) : ?>
                    <tr>
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
                    
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $m['name']; ?></td>
                        <td><?= $m['alamat']; ?></td>
                        <td><?= $m['pesan']; ?></td>
                        <td><?= $m['tanggal_penyewaan']; ?></td>
                        <td><?= $m['tanggal_pengembalian']; ?></td>
                        <td><?= $m['pembayaran']; ?></td>
                        <td> <span class="badge badge-<?=$color?> justify-content-end"><?=$status?></span></td>
                        <td>
                            <a href="<?= base_url('produk/detailPenyewaan/').$m['id_penyewaan']?>" class="badge badge-success">lihat</a>
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
