<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Riwayat_pengobatan_dokter extends CI_Model
{
    public function simpanDatadiagnosa($data = null)
    {
        $this->db->insert('riwayat_pengobatan', $data);
    }
    public function riwayat_pengobatan_dokter()
    {
        return $this->db->query("select a.*, b.nama, c.nama_obat from riwayat_pengobatan a
        left join user b on a.id_user = b.id_user 
        left join obat c on a.id_obat = c.id_obat where id_dokter = '" . $this->session->userdata('id_dokter') . "'");
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
}
