<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Riwayat_pengobatan_user extends CI_Model
{
    public function simpanDatadiagnosa($data = null)
    {
        $this->db->insert('riwayat_pengobatan', $data);
    }
    public function riwayat_pengobatan_dokter()
    {
        return $this->db->query("select a.*, b.nama, c.nama_obat from riwayat_pengobatan a
        left join user b on a.id_user = b.id_user 
        left join obat c on a.id_obat = c.id_obat
        
        where a.id_user = '" . $this->session->userdata('id_user') . "'
        
        
        ");
    }
}
