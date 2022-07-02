
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
                                <th>Diagnosa</th>
                                <th>Obat</th>
                                <th>Dokter Periksa</th>
                                <th>Operator Input</th>
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
                                        <td><?= $a['nama_dokter']; ?></td>
                                        <td>
                                        <?php
                                        
                                        if($a['nama_login']=="")
                                        {
                                            echo "dokter";
                                        }
                                        else
                                        {
                                            echo $a['nama_login'];
                                        }
                                        ?>
                                        </td>
                                        <td>
                                            
                                            <a href="<?= base_url() ?>data_riwayat_pengobatan/hapus_diagnosa/<?= $a['id_riwayat']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data ini ?');"><button type=" button" class="btn btn-info">Hapus</button></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</div>