<!-- Begin Page Content -->
<div class="container-fluid">

<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Page Heading -->
    <div class="row">
    <!-- jumlah data yang akan di masukan ke card -->
    <?php 
    $this->db->select('*');
    $this->db->from('produk');
    $produk =$this->db->count_all_results();
    ?>
    <?php 
    // $this->db->select('*');
    // $this->db->from('buku_induk');
    // $buku =$this->db->count_all_results();
    ?>
    <?php 
    // $this->db->select('*');
    // $this->db->from('buku_pinjam');

    // $pinjaman =$this->db->count_all_results();
    ?>
    
    <?php 
    // $this->db->select('*');
    // $this->db->from('buku_pinjam');
    // $this->db->where('status_pinjaman',0);
    // $blmkembali =$this->db->count_all_results();
    ?>

    <?php 
    // $this->db->select('*');
    // $this->db->from('buku_pinjam');
    // $this->db->where('status_pinjaman',1);
    // $sdhkembali =$this->db->count_all_results();
    ?>

    <?php
    // $new_width = ($sdhkembali / $pinjaman) * 100;
    // $total = floor($new_width);
    ?>
    <!-- tutup jumlah angka -->
   
     <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Produk Tersedia</div>

                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$produk?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-box fa-2x text-black-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

     <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Anggota Pustaka</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">111</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-black-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
           
     <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Transaksi Peminjaman Buku</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">1111</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-black-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
           

            
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Buku Kembali</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-black-800">1111</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-black" role="progressbar" style="width: 11%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-black-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            </div>
    </div>




<!-- /.container-fluid -->

</div>
<!-- End of Main Content 