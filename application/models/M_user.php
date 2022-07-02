<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function profil()
    {
        return $this->db->query("select * from user where id_user = '" . $this->session->userdata('id_user') . "' ");
    }

    public function puskesmas()
    {
        return $this->db->query("select * from puskesmas ");
    }
    public function inputAntrian($data = null)
    {
        $this->db->insert('data_antrian', $data);
    }


	public function update_user($data=null,$where=null)
	{
		
		return $this->db->update('user',$data,$where);

		
	}

}
