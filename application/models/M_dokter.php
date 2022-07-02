<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dokter extends CI_Model
{
    public function dokter()
    {
        return $this->db->query("select * from dokter ");
    }

    public function edit_dokter($id_dokter)
    {
        return $this->db->query("select * from dokter where id_dokter='$id_dokter' ");
    }
   



	public function simpanDataDokter($data=null)
	{
		return $this->db->insert('dokter',$data);
	}



    public function UpdateDataDokter($data = null, $where = null)
    {

        return $this->db->update('dokter', $data, $where);
    }
}
