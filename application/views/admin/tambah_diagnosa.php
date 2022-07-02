
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
                            <form class="user" method="post" action="<?= base_url('data_riwayat_pengobatan/tambah_diagnosa_proses'); ?>">
                                <div class="mb-3 row mt-3">
                                    <label for="text" class="col-sm-2 col-form-label">Nomer Antrian</label>
                                    <div class="col-sm-10"><?= $a['no_antrian']; ?>
                                        <input type="hidden" name='no_antrian' class="form-control" value="<?= $a['no_antrian']; ?>">
                                        <input type="hidden" name="id_user" class="form-control" value="<?= $a['id_user']; ?>">
                                        <input type="hidden" name="id_login" class="form-control" value="<?= $this->session->userdata('id_login'); ?>">
                                    </div>
                                </div>

                                <div class="mb-3 row mt-3">
                                    <label for="text" class="col-sm-2 col-form-label">Diagnosa</label>
                                    <div class="col-sm-10">
                                        <textarea name="diagnosa" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row mt-3">
                                    <label for="text" class="col-sm-2 col-form-label">Obat</label>
                                    <div class="col-sm-10">
                                        <select name="id_obat" class="form-control">
                                            <option value="">PILIH</option>
                                            <?php foreach ($obat->result_array() as $b) { ?>
                                                <option value="<?= $b['id_obat']; ?>"><?= $b['nama_obat']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                    </div>
                                </div>
                            </form>

                        <?php } ?>
                
            </div>
        </div>
    </div>
</div>