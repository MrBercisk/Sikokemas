<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title"><?= $title; ?></h4>
                    </div>



                    <p></p>
                    <?php if ($this->session->flashdata('data')) { ?>
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <?php echo $this->session->flashdata('data'); ?>
                        </div>
                    <?php } ?>




                    <?php foreach ($profil->result_array() as $a) {
                    ?>

                        <?php
                        if ($a['alamat'] == "" || $a['no_hp'] == "") {

                        ?>


                            <div class="container">



                                <form class="user" method="post" action="<?= base_url('user/update_user'); ?>" enctype="multipart/form-data">


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
                                        <p></p>
                                        <input type="file" name="foto">

                                        <input type="text" name="hidden_foto" value="<?= $a['foto']; ?>">
                                    </center>




                                    <div class="mb-3 row mt-3">
                                        <label for="text" class="col-sm-2 col-form-label">Nama </label>
                                        <div class="col-sm-10">
                                            <?= $a['nama']; ?>

                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-3">
                                        <label for="text" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">

                                            <input type="text" name="alamat" value="<?= $a['alamat']; ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-3 row mt-3">
                                        <label for="text" class="col-sm-2 col-form-label">Nomer HP</label>
                                        <div class="col-sm-10">

                                            <input type="text" name="no_hp" value="<?= $a['no_hp']; ?>" class="form-control">

                                        </div>
                                    </div>


                                    <div class="mb-3 row mt-3">
                                        <label for="text" class="col-sm-2 col-form-label">Usia</label>
                                        <div class="col-sm-10">

                                            <input type="text" name="usia" value="<?= $a['usia']; ?>" class="form-control">
                                        </div>
                                    </div>



                                    <div class="mb-3 row mt-3" align="right">
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Submit form</button>
                                        </div>
                                    </div>
                                </form>


                            </div>

                        <?php


                        } else {

                            echo '
                                
                                <div class="card-header ">Selamat Datang Sikokemas <p></p>                      </div>
                                ';
                        }
                        ?>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>