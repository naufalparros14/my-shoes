<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 justify-content-x">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>

    
    <div class="card mb-3" style="max-width: 600px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') .
                    $user['image']; ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        Nama &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :
                        <?= $user['nama'];
                        ?>
                    </h5>
                    <p class="card-text">
                        Email &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;:
                        <?= $user['email']; ?>
                    </p>
                    <p class="card-text">
                        Role &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 
                        <?= $user['role_id']; ?>
                    </p>
                    <p class="card-text">
                        
                        Status Aktivasi : 
                        <?= $user['is_active']; ?>
                        
                    </p>
                <div class="btn btn-info ml-3 my-3">
                    <a href="<?= base_url('user/ubahprofil'); ?>" class="text text-white"><i
                            class="fas fa-user-edit"></i> Ubah Profil</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->