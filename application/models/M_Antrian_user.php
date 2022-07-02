<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Antrian_user extends CI_Model
{
    public function antrian()
    {
        return $this->db->query("select a.*, b.nama_dokter, c.nama_puskesmas, d.id_dokter   from data_antrian a
        left join dokter b on a.id_dokter = b.id_dokter
        left join puskesmas c on a.id_puskesmas = c.id_puskesmas
        left join riwayat_pengobatan d on a.no_antrian = d.no_antrian
        where a.id_user = '" . $this->session->userdata('id_user') . "'
        
        ");
    }
    
}
