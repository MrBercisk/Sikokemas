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
                                <th>Puskesmas</th>
                                <th>Keluhan</th>
                                <th>Opsi</th>
                            </thead>
                            <tbody>
                                <?php foreach ($antrian->result_array() as $a) {
                                ?>
                                    <tr>
                                        <td><?= $a['no_antrian']; ?></td>
                                        <td><?= $a['nama']; ?></td>
                                        <td><?= $a['nama_puskesmas']; ?></td>
                                        <td><?= $a['keluhan']; ?></td>
                                        <td><a href="<?= base_url() ?>riwayat_pengobatan_dokter/tambah_diagnosa/<?= $a['no_antrian']; ?>"><button type=" button" class="btn btn-info">Pilih</button></a></td>
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