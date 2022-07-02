
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
                <?php foreach ($data->result_array() as $a) {
                ?>
                    <form method="POST" action="<?= base_url('user_manajemen/update_user_manajemen') ?>" enctype="multipart/form-data">
                    <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama User</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_login" value="<?=$a['nama_login'];?>" >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" value="<?=$a['email'];?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" name="password" >
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Puskesmas</label>
                            <div class="col-sm-10">
                            <select name="id_puskesmas" >
                                    <option value="">Pilih Dokter</option>
                                    <?php foreach ($puskesmas->result_array() as $b) {
                                    ?>
                                        <option value="<?= $b['id_puskesmas']; ?>"><?= $b['nama_puskesmas']; ?></option>
                                    <?php } ?>
                            </select>
                                
                            </div>
                        </div>




                        <input type="hidden" name="id_login" value="<?=$a['id_login'];?>">
                        <input type="hidden" name="hidden_password" value="<?=$a['password'];?>">
                        <div class="mb-3 row">
                            <div class="col-sm-2">
                                <button class="btn btn-primary btn-user btn-block mt-2" type="submit">Update</button>
                            </div>
                        </div>


                    </form>

                <?php } ?>

            </div>
        </div>
    </div>
</div>