<!-- Begin Page Content -->
<div class="container-fluid">
 <!-- row ux-->
 <div class="row">
 <div class="col-xl-3 col-md-6 mb-4">
 <div class="card border-left-danger shadow h-100 py-2 bg-primary">
 <div class="card-body">
 <div class="row no-gutters align-items-center">
 <div class="col mr-2">
 <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Pegawai Toko</div>
 <div class="h1 mb-0 font-weight-bold text-white"><?=
$this->ModelUser->getUserWhere(['role_id' => 1])->num_rows();
?></div>
 </div>
 <div class="col-auto">
 <a href="<?= base_url('user/anggota'); ?>"><i
class="fas fa-users fa-3x text-warning"></i></a>
 </div> 
 </div>
 </div>
 </div>
 </div>
 <div class="col-xl-3 col-md-6 mb-4">
 <div class="card border-left-primary shadow h-100 py-2 bg-warning">
 <div class="card-body">
 <div class="row no-gutters align-items-center">
 <div class="col mr-2">
 <div class="text-md font-weight-bold text-white text-uppercase mb-1">Stok Sepatu Yang Terdaftar</div>
 <div class="h1 mb-0 font-weight-bold text-white">
 <?php
 $where = ['stok != 0'];
 $totalstok = $this->ModelSepatu->total('stok',
$where);
 echo $totalstok;
 ?>
 </div>
 </div>
 <div class="col-auto">
 <a href="<?= base_url('sepatu'); ?>"><i class="fas fa-book fa-3x text-primary"></i></a>
 </div>
 </div>
 </div>
 </div>
 </div>
 <!-- <div class="col-xl-3 col-md-6 mb-4">
 <div class="card border-left-success shadow h-100 py-2 bg-danger">
 <div class="card-body">
 <div class="row no-gutters align-items-center">
 <div class="col mr-2">
 <div class="text-md font-weight-bold text-white text-uppercase mb-1">Buku yang dipinjam</div>
 <div class="h1 mb-0 font-weight-bold text-white">
 <?php
//  $where = ['dipinjam != 0'];
//  $totaldipinjam = $this->ModelBuku->total('dipinjam',
// $where);
//  echo $totaldipinjam;
 ?>
 </div>
 </div>
 <div class="col-auto">
 <a href="<?= base_url('user'); ?>"><i class="fas fa-user-tag fa-3x text-success"></i></a>
 </div>
 </div>
 </div>
 </div>
 </div> -->
 <!-- <div class="col-xl-3 col-md-6 mb-4">
 <div class="card border-left-warning shadow h-100 py-2 bg-success">
 <div class="card-body">
 <div class="row no-gutters align-items-center">
 <div class="col mr-2">
 <div class="text-md font-weight-bold text-white text-uppercase mb-1">Buku yang dibooking</div>
 <div class="h1 mb-0 font-weight-bold text-white">
 <?php
//  $where = ['dibooking !=0'];
//  $totaldibooking = $this->ModelBuku->total('dibooking', $where);
//  echo $totaldibooking;
 ?>
 </div>
 </div>
 <div class="col-auto">
 <a href="<?= base_url('user'); ?>"><i class="fas fa-shopping-cart fa-3x text-danger"></i></a>
 </div>
 </div>
 </div>
 </div>
 </div> -->
 </div>
 <!-- end row ux-->
 <!-- Divider -->
 <hr class="sidebar-divider">
 <!-- row table-->
 <div class="row">
 <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
 <div class="page-header">
 <span class="fas fa-users text-primary mt-2 "> Data
User</span>
 </div>
 <table class="table mt-3">
 <thead>
 <tr>
 <th>#</th>

            <th style="text-align:center" nowrap>Nama</th>
            <th style="text-align:center" nowrap>Email</th>
            <th style="text-align:center" nowrap>Role ID</th>
            <th style="text-align:center" nowrap>Status</th>
 </tr>
 </thead>
 <tbody>
 <?php
 $i = 1;
 foreach ($anggota as $a) { ?>
 <tr>
 <td><?= $i++; ?></td>
 <td style="text-align:center"><?= $a['nama']; ?></td>
 <td style="text-align:center"><?= $a['email']; ?></td>
 <td style="text-align:center"><?= $a['role_id']; ?></td>
 <td style="text-align:center"><?= $a['is_active']; ?></td>
 <?php } ?>
 
 </tbody>
 </table>
 </div>
 <div class="table-responsive table-bordered col-sm-5 ml-auto mr-auto mt-2">
 <div class="page-header">
 <span class="fas fa-book text-warning mt-2"> Data Sepatu</span>
 </div>
 <div class="table-responsive">
 <table class="table mt-3" id="table-datatable">
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
 </tr>
 </thead>
 <tbody>
 <?php
 $i = 1;
 foreach ($sepatu as $s) { ?>
 <tr>
 <td><?= $i++; ?></td>
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
 </tr>
 <?php } ?>
 </tbody>
 </table>
 </div>
 </div>
 </div>
 <!-- end of row table-->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
 