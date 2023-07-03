<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- courosel -->

  
    <div class="container justify-content-center">
        <div class="row">
            
        <div class="card mb-3 mt-5">
            <div class="row no-gutters">
            <p class="text-center fs-3 mt-3 fw-semibold"> Profile User </p>
                <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" >
                </div>
                
                <div class="col-md-8">
                    <div class="card-body">
                    <?= form_open_multipart('member/user/') ?>

                    <input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
                    
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label"> Nama</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?=$user['name']?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>           
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="col-sm-2">Foto Profile</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="custom-file" >
                                            <input type="file" class="margin-top: 10px; padding: 5px;" id="image" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <label for="email" class="col-sm-2 col-form-label"> Email</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?=$user['email']?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>           
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="email" class="col-sm-2 col-form-label"> Alamat</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="<?=$user['alamat']?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>           
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label for="email" class="col-sm-2 col-form-label"> Nomor Telpon</label>
                            <div class="col-sm-5">
                            <input type="text" class="form-control" id="notelp" name="notelp" placeholder="notelp" value="<?=$user['notelp']?>">
                                <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>           
                            </div>
                        </div>

                        <div class="form-group row justify-content-end mt-3">
                            <div class="col-sm-10">
                                <button type="submit" name=editBuku class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    
             
                        
                    </div>
                </div>
            </div>
        </div>       
        </div>
    </div>
    


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
