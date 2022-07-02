
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
              
                    <form method="POST" action="<?= base_url('user_manajemen/tambah_user_manajemen_proses') ?>" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama User</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_login" value="" >
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Puskesmas</label>
                            <div class="col-sm-10">
                            <select name="id_puskesmas" >
                                    <option value="">Pilih Dokter</option>
                                    <?php foreach ($data->result_array() as $a) {
                                    ?>
                                        <option value="<?= $a['id_puskesmas']; ?>"><?= $a['nama_puskesmas']; ?></option>
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

                

            </div>
        </div>
    </div>
</div>