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
                            if($a['alamat']=="" || $a['no_hp']=="")
                            {
                           
                                $this->session->set_flashdata('data','Lengkapi Profil Anda ....');
                                redirect('user');	

                            }
                            else
                            {
                            ?>


                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>No Antrian</th>
                                <th>Nama Pasien</th>
                                <th>Diagnosa</th>
                                <th>Obat</th>
                               
                            </thead>
                            <tbody>
                                <?php foreach ($riwayat->result_array() as $a) {
                                ?>
                                    <tr>
                                        <td><?= $a['no_antrian']; ?></td>
                                        <td><?= $a['nama']; ?></td>
                                        <td><?= $a['diagnosa']; ?></td>
                                        <td><?= $a['nama_obat']; ?></td>
                                      
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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