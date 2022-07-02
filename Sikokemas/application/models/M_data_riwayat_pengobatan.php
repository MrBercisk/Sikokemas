<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data_riwayat_pengobatan extends CI_Model
{
    public function simpanDatadiagnosa($data = null)
    {
        $this->db->insert('riwayat_pengobatan', $data);
    }
    public function riwayat_pengobatan()
    {


        if($this->session->userdata('id_puskesmas')=="")
        {
            return $this->db->query("select a.*, b.nama, c.nama_obat, d.nama_dokter, e.nama_login
        
            from riwayat_pengobatan a
            left join user b on a.id_user = b.id_user 
            left join obat c on a.id_obat = c.id_obat
            left join dokter d on a.id_dokter = d.id_dokter
            left join login e on a.id_login = e.id_login
            ");
        }
        else
        {
            return $this->db->query("select a.*, b.nama, c.nama_obat, d.nama_dokter, e.nama_login
        
            from riwayat_pengobatan a
            left join user b on a.id_user = b.id_user 
            left join obat c on a.id_obat = c.id_obat
            left join dokter d on a.id_dokter = d.id_dokter
            left join login e on a.id_login = e.id_login
            left join data_antrian f on a.no_antrian=f.no_antrian

            where f.id_puskesmas='".$this->session->userdata('id_puskesmas')."'
            
            ");
        }


    }
    public function edit_diagnosa($data)
    {
        return $this->db->get_where('riwayat_pengobatan', $data);
    }
    public function hapus_data_diagnosa($data = null, $where = null)
    {
        $this->db->delete('riwayat_pengobatan', $data, $where);
    }
    public function updateDatadiagnosa($data = null, $where = null)
    {
        $this->db->update('riwayat_pengobatan', $data, $where);
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
