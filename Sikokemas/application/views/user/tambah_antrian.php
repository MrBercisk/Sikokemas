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
                            if($a['alamat']=="" || $a['no_hp']=="")
                            {
                           
                                $this->session->set_flashdata('data','Lengkapi Profil Anda ....');
                                redirect('user');	

                            }
                            else
                            {
                            ?>


                                    <form class="user" method="post" action="<?= base_url('Antrian_user/tambah_antrian_proses'); ?>">


                                        <div class="mb-3 row mt-3">
                                            <label for="text" class="col-sm-2 col-form-label">Nama </label>
                                            <div class="col-sm-10">
                                                <?= $a['nama']; ?>
                                                <input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user') ?>">
                                            </div>
                                        </div>


                                        <div class="mb-3 row mt-3">
                                            <label for="text" class="col-sm-2 col-form-label">Nomer HP</label>
                                            <div class="col-sm-10">
                                                <?= $a['no_hp']; ?>
                                            </div>
                                        </div>


                                        <div class="mb-3 row mt-3">
                                            <label for="text" class="col-sm-2 col-form-label">Diagnosa</label>
                                            <div class="col-sm-10">
                                                <textarea name="keluhan" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3 row mt-3">
                                            <label for="text" class="col-sm-2 col-form-label">Puskesmas</label>
                                            <div class="col-sm-10">
                                                <select name="id_puskesmas" class="form-control">
                                                    <option value="">PILIH </option>
                                                    <?php foreach ($puskesmas->result_array() as $b) { ?>
                                                        <option value="<?= $b['id_puskesmas']; ?>"><?= $b['nama_puskesmas']; ?></option>
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

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>