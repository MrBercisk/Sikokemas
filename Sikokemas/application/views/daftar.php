<style>
    .card-body {
        background-color: aqua;
        box-shadow: black;
    }
</style>
<!-- ======= Departments Section ======= -->
<section id="departments" class="departments">
    <div class="container bg-transparent">

        <div class="section-title mt-4">
            <h2><?= $title; ?> </h2>
        </div>
        <div class="container-login">
            <div class="card o-hidden border-0 shadow-lg my-2">
                <div class="card-body p-0" id="card">
                    <div class=" row mb-3 mt-3">
                        <?php if (isset($_GET['proses'])) { ?>
                            <div class="alert alert-success">

                                <?= $_GET['proses']; ?>
                            </div>
                        <?php } ?>

                        <form class="user" action="<?php echo base_url(); ?>home/proses_daftar" method="POST">
                            <input name="<?= $this->security->get_csrf_token_name(); ?>" type="hidden" value="<?= $this->security->get_csrf_hash(); ?>" />

                            <div class="form-group mt-3">
                                <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama Lengkap" required>
                            </div>

                            <div class="form-group mt-3">
                                <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                            </div>


                            <button class="btn btn-primary btn-user btn-block col-md-3 mt-3 mb-3" type="submit">Daftar</button>


                        </form>

                    </div>

                </div>
            </div>
        </div>
</section><!-- End Departments Section -->