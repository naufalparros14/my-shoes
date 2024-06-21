<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6 justify-content-x">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    </div>

    <table class="table table-stripped">
        <tr>
            <th style="text-align:center">No</th>
            <th style="text-align:center" nowrap>Photo</th>
            <th style="text-align:center" nowrap>Nama</th>
            <th style="text-align:center" nowrap>Email</th>
            <th style="text-align:center" nowrap>Status</th>
        </tr>
        <?php
        $i = 1;
        foreach ($anggota as $a) { ?>

            <tr>
                <td style="text-align:center"><?= $i++; ?></td>
                <td style="text-align:center"><img src="<?= base_url('assets/img/profile/') . $a->image; ?>" class="rounded" alt="..." width="50px" height="65px"></td>
                <td style="text-align:center"><?= $a->nama; ?></td>
                <td style="text-align:center"><?= $a->email; ?></td>
                <?php if ($a->is_active == 1) {
                    $status = "Aktif";
                } else {
                    $status = "Tidak Aktif";
                } ?>
                    <td style="text-align:center"><?= $status; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->