<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
 <div class="row">
    <div class="col-lg-12">
        <?php if(validation_errors()){?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors();?>
            </div>
    <?php }?>
 
    <?= $this->session->flashdata('pesan'); ?>
 
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#sepatuBaruModal"><i class="fas fa-file-alt"></i> Sepatu Baru</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" style="text-align: center;">#</th>
                    <th scope="col" style="text-align: center;">Nama Sepatu</th>
                    <th scope="col" style="text-align: center;">Merk</th>
                    <th scope="col" style="text-align: center;">Jenis Sepatu</th>
                    <th scope="col" style="text-align: center;">Ukuran Sepatu</th>
                    <th scope="col" style="text-align: center;">Stok</th>
                    <th scope="col" style="text-align: center;">Harga</th>
                    <th scope="col" style="text-align: center;">Gambar</th>
                    <th scope="col" style="text-align: center;">Pilihan</th>
                    </tr>
            </thead>

        <tbody>
                <?php
                    $a = 1;
                    foreach ($sepatu as $s) { ?>
                <tr>
                    <th scope="row"><?= $a++; ?></th>
                    <td style="text-align: center;"><?= $s['nama_sepatu']; ?></td>
                    <td style="text-align: center;"><?= $s['merk']; ?></td>
                    <td style="text-align: center;"><?= $s['jenis']; ?></td>
                    <td style="text-align: center;"><?= $s['ukuran']; ?></td>
                    <td style="text-align: center;"><?= $s['stok']; ?></td>
                    <td style="text-align: center;"><?= "RP ", $s['harga']; ?></td>
                    
                <td style="text-align: center;">
                    <picture>
                        <source srcset=""type="image/svg+xml">
                            <img src="<?=base_url('assets/img/upload/') . $s['image'];?>" class="img-fluid img-thumbnail" alt="...">
                    </picture>
                </td>
                <td style="text-align: center;">
                    <a href="<?=base_url('sepatu/ubahSepatu/').$s['id'];?>" class="badge badge-info">
                        <i class="fas fa-edit"></i> Ubah
                    </a>

                <a href="<?=base_url('sepatu/hapusSepatu/').$s['id'];?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul.''.$s['nama_sepatu'];?> ?');" 
                class="badge badge-danger">
                    <i class="fas fa-trash"></i> Hapus</a>
                </td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
 </div>
 </div>
 </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Modal Tambah sepatu baru-->
        <div class="modal fade" id="sepatuBaruModal" tabindex="-1"
            role="dialog" aria-labelledby="sepatuBaruModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title"
        id="sepatuBaruModalLabel">Tambah Sepatu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="<?= base_url('sepatu'); ?>" method="post"
            enctype="multipart/form-data">
            <div class="modal-body">
 
                <div class="form-group">
                <input type="text" class="form-control form-control-user" id="nama_sepatu" name="nama_sepatu"
                placeholder="Masukkan Nama Sepatu">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="merk" name="merk" placeholder="Masukkan merk">
                </div>

    
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="jenis" name="jenis" placeholder="Masukkan Jenis Sepatu ">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="ukuran" name="ukuran" placeholder="Masukkan Jumlah Ukuran ">
                </div>

                <div class="form-group">
                    <input type="number" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan Jumlah Stok ">
                </div>

                <div class="form-group">
                    <input type="number" class="form-control form-control-user" id="harga" name="harga" placeholder="Masukkan Harga ">
                </div>

                <div class="form-group">
                    <input type="file" class="form-control form-control-user" id="image" name="image">
                </div>
                </div>

                <div style="text-align: center;" class="modal-footer">
                <button type="button" class="btn btn-secondary"
                data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                <button type="submit" class="btn btn-primary"><i
                class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->