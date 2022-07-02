<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title"><?= $title; ?></h4>
                    </div>
                    <div class="container">
                        <?php foreach ($profil->result_array() as $a) {
                        ?>

                            <?php
                            if ($a['alamat'] == "" || $a['no_hp'] == "") {

                                $this->session->set_flashdata('data', 'Lengkapi Profil Anda ....');
                                redirect('user');
                            } else {
                            ?>

                                <center>
                                    <?php
                                    if ($a['foto'] == "") {
                                    ?>
                                        <img src="<?= base_url() ?>assets/img/default.jpg" width="200">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="<?= base_url() ?>uploads/<?= $a['foto']; ?>" width="200">

                                    <?php
                                    }
                                    ?>
                                </center>



                                <div class="mb-3 row mt-3">
                                    <label for="text" class="col-sm-2 col-form-label">Nama </label>
                                    <div class="col-sm-10">
                                        <?= $a['nama']; ?>
                                        <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
                                    </div>
                                </div>

                                <div class="mb-3 row mt-3">
                                    <label for="text" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <?= $a['alamat']; ?>
                                    </div>
                                </div>

                                <div class="mb-3 row mt-3">
                                    <label for="text" class="col-sm-2 col-form-label">Nomer HP</label>
                                    <div class="col-sm-10">
                                        <?= $a['no_hp']; ?>
                                    </div>
                                </div>


                                <div class="mb-3 row mt-3">
                                    <label for="text" class="col-sm-2 col-form-label">Usia</label>
                                    <div class="col-sm-10">
                                        <?= $a['usia']; ?>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>