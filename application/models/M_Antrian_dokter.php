<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Antrian_dokter extends CI_Model
{
    public function antrian()
    {
        return $this->db->query("select a.*, b.nama, c.nama_puskesmas from data_antrian a
        left join user b on a.id_user = b.id_user
        left join puskesmas c on a.id_puskesmas = c.id_puskesmas
        
        where id_dokter='" . $this->session->userdata('id_dokter') . "'
        and NOT EXISTS  (select * from riwayat_pengobatan where id_user= a.id_user)
        
        ");
    }
    public function cek_antrian($no_antrian)
    {
        return $this->db->query("select a.*, b.nama, c.nama_puskesmas from data_antrian a
        left join user b on a.id_user = b.id_user
        left join puskesmas c on a.id_puskesmas = c.id_puskesmas
        where no_antrian = '$no_antrian'");
    }
    public function obat()
    {
        return $this->db->query("select * from obat");
    }
}
