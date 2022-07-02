<!-- ======= Departments Section ======= -->
<section id="departments" class="departments">
    <div class="container bg-transparent">

        <div class="section-title mt-4">
            <h2><?= $title; ?> </h2>
        </div>
        <div class="container-login">
            <form class="user" action="<?php echo base_url(); ?>home/proses_login" method="POST">
                <input name="<?= $this->security->get_csrf_token_name(); ?>" type="hidden" value="<?= $this->security->get_csrf_hash(); ?>" />
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                    </div>
                </div>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Pilih User Login</legend>
                    <div class="col-sm-10">
                        <select name="pilihan" class="form-control form-control-user">
                            <option value="">Pilih..</option>
                            <option value="user">User</option>
                            <option value="dokter">Dokter</option>
                        </select>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
    </div>
</section><!-- End Departments Section -->