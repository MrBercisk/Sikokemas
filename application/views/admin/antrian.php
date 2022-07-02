
<!--**********************************
Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <h4><?= $title ?></h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)"><?= $title ?></a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>No Antrian</th>
                        <th>Nama Pasien</th>
                        <th>Puskesmas</th>
                        <th>Dokter</th>
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
                                <td>

                                    <?php
                                    if ($a['nama_dokter'] == "") {
                                        echo "Belum Tersedia";
                                    } else {
                                        echo  $a['nama_dokter'];
                                    }

                                    ?>
                                </td>
                                <td><?= $a['keluhan']; ?></td>
                                <td>
                                    
                                <a href="<?= base_url() ?>Antrian_admin/tambah_dokter/<?= $a['no_antrian']; ?>"><button type=" button" class="btn btn-info">Tambah Dokter</button></a>
                                <a href="<?= base_url() ?>data_riwayat_pengobatan/tambah_diagnosa/<?= $a['no_antrian']; ?>"><button type=" button" class="btn btn-info">Tambah Diagnosa</button></a>
                            
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>