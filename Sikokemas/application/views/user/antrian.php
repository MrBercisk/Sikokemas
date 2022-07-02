<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title"><?= $title; ?></h4>
                    </div>


                        <?php foreach ($profil->result_array() as $a) {
                        ?>
                           
                           <?php
                            if($a['alamat']=="" || $a['no_hp']=="" )
                            {
                           
                                $this->session->set_flashdata('data','Lengkapi Profil Anda ....');
                                redirect('user');	

                            }
                            else
                            {
                            ?>
                    
                                <div class="card-body table-full-width table-responsive">

                            
                                    <div align="right"><a href="<?= base_url() ?>antrian_user/tambah_antrian">Tambah Antrian</a></div>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>No Antrian</th>
                                            <th>Nama Dokter</th>
                                            <th>Puskesmas</th>
                                            <th>Keluhan</th>
                                            <th>Tanggal</th>
                                            <th>Opsi</th>

                                        </thead>
                                        <tbody>
                                            <?php foreach ($antrian->result_array() as $a) {
                                            ?>
                                                <tr>
                                                    <td><?= $a['no_antrian']; ?></td>
                                                    <td>
                                                        
                                                    <?php
                                                    if($a['nama_dokter']=="")
                                                    {
                                                        echo "Belum Tersedia";
                                                    }
                                                    else
                                                    {
                                                    echo  $a['nama_dokter'];
                                                    }
                                                    
                                                    ?>
                                                    
                                                    
                                                    </td>
                                                    <td><?= $a['nama_puskesmas']; ?></td>
                                                    <td><?= $a['keluhan']; ?></td>
                                                    <td><?= $a['tanggal']; ?></td>
                                                    <td>
                                                        
                                                    


                                                    <?php


                                                    if($a['id_dokter']=="")
                                                    {
                                                    ?>
                                                        <a href="<?= base_url() ?>antrian_user/hapus/<?= $a['no_antrian']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Antrian ini ?');"><button type=" button" class="btn btn-info">Batal</button></a>

                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                        Tervalidasi
                                                    <?php
                                                    }
                                                    
                                                    ?>
                                                
                                                
                                                </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>



                                </div>


                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>