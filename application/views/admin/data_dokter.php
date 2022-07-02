
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


        <?php
        if($this->session->userdata('id_puskesmas')=="")
        {
        ?>
            <div align="right"><a href="<?= base_url() ?>data_dokter/tambah_data_dokter"><button type=" button" class="btn btn-warning btn-sm">Tambah</button></a></div>

        <?php
        }
        ?>





                <table class="table table-hover table-striped">
                    <thead>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>No Hp</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Opsi</th>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach ($data->result_array() as $a) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $a['nama_dokter']; ?></td>
                                <td><?= $a['no_hp']; ?></td>
                                <td><?= $a['email']; ?></td>
                                <td>  
                                    <?php
                                        if ($a['foto'] == "") {
                                        ?>
                                            <img src="<?= base_url() ?>assets/img/default.jpg" width="100">
                                        <?php
                                        } else {
                                        ?>

                                            <img src="<?= base_url() ?>uploads/<?= $a['foto']; ?>" width="100">
                                        <?php
                                        }
                                        ?>
                                    
                                
                                </td>
                                <td>

                                <?php
                                if($this->session->userdata('id_puskesmas')=="")
                                {
                                ?>
                                    <a href="<?= base_url() ?>data_dokter/edit_data_dokter/<?= $a['id_dokter']; ?>"><button type=" button" class="btn btn-info btn-sm">Edit</button></a>
                                    <a href="<?= base_url() ?>data_dokter/hapus/<?= $a['id_dokter']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data ini ?');"><button type=" button" class="btn btn-danger btn-sm">Hapus</button></a>

                                <?php
                                }
                                else
                                {
                                    echo "Tidak Ada Opsi";
                                }
                                ?>


                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>