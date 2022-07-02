<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_obat extends CI_Model
{
    public function obat()
    {
        return $this->db->query("select * from obat ");
    }

    public function edit_obat($id_obat)
    {
        return $this->db->query("select * from obat where id_obat='$id_obat' ");
    }
   



	public function simpanDataobat($data=null)
	{
		return $this->db->insert('obat',$data);
	}



    public function UpdateDataobat($data = null, $where = null)
    {

        return $this->db->update('obat', $data, $where);
    }
}
