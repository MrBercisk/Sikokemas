<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Antrian_admin extends CI_Model
{
    public function antrian()
    {

        if($this->session->userdata('id_puskesmas')=="")
        {
            return $this->db->query("select a.*, b.nama, c.nama_puskesmas, d.nama_dokter from data_antrian a
            left join user b on a.id_user = b.id_user
            left join puskesmas c on a.id_puskesmas = c.id_puskesmas
            left join dokter d on a.id_dokter = d.id_dokter
            where NOT EXISTS  (select * from riwayat_pengobatan where id_user= a.id_user)
            ");
        }
        else
        {
            return $this->db->query("select a.*, b.nama, c.nama_puskesmas, d.nama_dokter from data_antrian a
            left join user b on a.id_user = b.id_user
            left join puskesmas c on a.id_puskesmas = c.id_puskesmas
            left join dokter d on a.id_dokter = d.id_dokter
            where NOT EXISTS  (select * from riwayat_pengobatan where id_user= a.id_user) and a.id_puskesmas='".$this->session->userdata('id_puskesmas')."'
            ");
        }


    }
    public function cek_antrian($no_antrian)
    {
        return $this->db->query("select a.*, b.nama, c.nama_puskesmas from data_antrian a
        left join user b on a.id_user = b.id_user
        left join puskesmas c on a.id_puskesmas = c.id_puskesmas
        where no_antrian = '$no_antrian'");
    }
    public function dokter()
    {
        return $this->db->query("select * from dokter");
    }

    public function UpdateDokter($data = null, $where = null)
    {

        return $this->db->update('data_antrian', $data, $where);
    }
}
