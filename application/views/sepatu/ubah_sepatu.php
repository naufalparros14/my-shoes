<!-- Begin Page Content -->
<div class="container-fluid">
	<?= $this->session->flashdata('pesan'); ?>
	<div class="row">
		<div class="col-lg-6">
			<?php if (validation_errors()) { ?>
				<div class="alert alert-danger" role="alert">
				<?= validation_errors(); ?>
				</div>
			<?php } ?>
			<?= $this->session->flashdata('pesan'); ?>
			<?php foreach ($sepatu as $s ) { ?>
			<form action="<?= base_url('sepatu/ubahSepatu'); ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="hidden" name="id" id="id" value="<?php echo $s['id']; ?>">
					<input type="text" class="form-control form-control-user" id="nama_sepatu" name="nama_sepatu" placeholder="Masukkan Nama sepatu" value="<?=$s['nama_sepatu']; ?>">
				</div>
				
				<div class="form-group">
					<input type="text" class="form-control form-control-user" id="merk" name="merk" placeholder="Masukkan Nama Merk" value="<?= $s['merk'];?>">
				</div>
				<div class="form-group">
					<input type="text" class="form-control form-control-user" id="jenis" name="jenis" placeholder="Masukkan Jenis Sepatu" value="<?= $s['jenis'];?>">
				</div>
				<div class="form-group">
					<input type="text" class="form-control form-control-user" id="ukuran" name="ukuran" placeholder="Masukkan Ukuran" value="<?=$s ['ukuran']; ?> ">
				</div>
				<div class="form-group">
					<input type="number" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok" value="<?=$s ['stok']; ?> ">
				</div>
				<div class="form-group">
					<input type="number" class="form-control form-control-user" id="harga" name="harga" placeholder="Masukkan Harga" value="<?=$s ['harga']; ?> ">
				</div>
				<div class="form-group">
					<?php
					if (isset($s['image'])) { ?>

						<input type="hidden" name="old_pict" value="<?= $s['image']; ?>">

						<picture>
							<source srcset="" type="image/svg+xml">
								<img src="<?= base_url('assets/img/upload/').$s['image'];?>" class="rounded mx-auto mb-3 d-blok" alt="..." width="200" height="250">
						</picture>
					<?php } ?>

					<input type="file" class="orm-control form-control-user" ig="image" name="image">
				</div>
					<div class="form-group">
						<input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
						<input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
					</div>
			</form> 
			<?php } ?>
		</div>
	</div>
	</div>