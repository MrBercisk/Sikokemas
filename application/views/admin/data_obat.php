
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
            <div align="right"><a href="<?= base_url() ?>data_obat/tambah_data_obat"><button type=" button" class="btn btn-warning btn-sm">Tambah</button></a></div>

        <?php
        }
        ?>




                <table class="table table-hover table-striped">
                    <thead>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Kategori Obat</th>
                       
                        <th>Opsi</th>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach ($data->result_array() as $a) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $a['nama_obat']; ?></td>
                                <td><?= $a['kategori']; ?></td>
                               
                                <td>


                                <?php
                                if($this->session->userdata('id_puskesmas')=="")
                                {
                                ?>
                                    <a href="<?= base_url() ?>data_obat/edit_data_obat/<?= $a['id_obat']; ?>"><button type=" button" class="btn btn-info btn-sm">Edit</button></a>
                                    <a href="<?= base_url() ?>data_obat/hapus/<?= $a['id_obat']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data ini ?');"><button type=" button" class="btn btn-danger btn-sm">Hapus</button></a>

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