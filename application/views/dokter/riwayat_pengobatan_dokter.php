<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title"><?= $title; ?></h4>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No Antrian</th>
                                <th>Nama Pasien</th>
                                <th>Diagnosa</th>
                                <th>Obat</th>
                                <th>Opsi</th>
                            </thead>
                            <tbody>
                                <?php foreach ($riwayat->result_array() as $a) {
                                ?>
                                    <tr>

                                        <td><?= $a['no_antrian']; ?></td>
                                        <td><?= $a['nama']; ?></td>
                                        <td><?= $a['diagnosa']; ?></td>
                                        <td><?= $a['nama_obat']; ?></td>
                                        <td>
                                            <a href="<?= base_url() ?>riwayat_pengobatan_dokter/edit_diagnosa/<?= $a['id_riwayat']; ?>"><button type=" button" class="btn btn-info">Edit</button></a>
                                            <a href="<?= base_url() ?>riwayat_pengobatan_dokter/hapus_diagnosa/<?= $a['id_riwayat']; ?>"><button type=" button" class="btn btn-info">Hapus</button></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>