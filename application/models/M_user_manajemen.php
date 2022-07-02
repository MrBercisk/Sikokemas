<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user_manajemen extends CI_Model
{
    public function user_manajemen()
    {


        if($this->session->userdata('id_puskesmas')=="")
        {
            return $this->db->query("select a.*, b.nama_puskesmas from login a
            left join puskesmas b on a.id_puskesmas=b.id_puskesmas
            ");
    
        }
        else
        {
            return $this->db->query("select a.*, b.nama_puskesmas from login a
            left join puskesmas b on a.id_puskesmas=b.id_puskesmas

            where a.id_puskesmas='".$this->session->userdata('id_puskesmas')."'
            ");
    
        }


    }

    public function edit_user_manajemen($id_login)
    {
        return $this->db->query("select * from login where id_login='$id_login' ");
    }
   



	public function simpanDatauser_manajemen($data=null)
	{
		return $this->db->insert('login',$data);
	}



    public function UpdateDatauser_manajemen($data = null, $where = null)
    {

        return $this->db->update('login', $data, $where);
    }
}
