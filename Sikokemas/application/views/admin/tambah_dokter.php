
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
                <?php foreach ($cek_antrian->result_array() as $a) {
                ?>
                    <form method="POST" action="<?= base_url('Antrian_admin/tambah_dokter_proses') ?>">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">No Antrian</label>
                            <div class="col-sm-10">
                                <?= $a['no_antrian'];  ?>
                                <input type="hidden" name="no_antrian" value="<?= $a['no_antrian']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Pasien</label>
                            <div class="col-sm-10">
                                <?= $a['nama'];  ?>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Puskesmas</label>
                            <div class="col-sm-10">
                                <?= $a['nama_puskesmas'];  ?>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Pilih Dokter</label>
                            <div class="col-sm-5">
                                <select name="id_dokter" class="form-control form-control-user">
                                    <option value="">Pilih Dokter</option>
                                    <?php foreach ($dokter->result_array() as $a) {
                                    ?>
                                        <option value="<?= $a['id_dokter']; ?>"><?= $a['nama_dokter']; ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-sm-2">
                                <button class="btn btn-primary btn-user btn-block mt-2" type="submit">Tambah</button>
                            </div>
                        </div>

                    </form>

                <?php } ?>

            </div>
        </div>
    </div>
</div>