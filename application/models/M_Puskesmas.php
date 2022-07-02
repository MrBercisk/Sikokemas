<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_puskesmas extends CI_Model
{
    public function puskesmas()
    {

        if($this->session->userdata('id_puskesmas')=="")
        {
            return $this->db->query("select * from puskesmas ");
        }
        else
        {
            return $this->db->query("select * from puskesmas  where id_puskesmas='".$this->session->userdata('id_puskesmas')."'");

        }



    }

    public function edit_puskesmas($id_puskesmas)
    {
        return $this->db->query("select * from puskesmas where id_puskesmas='$id_puskesmas' ");
    }
   



	public function simpanDatapuskesmas($data=null)
	{
		return $this->db->insert('puskesmas',$data);
	}



    public function UpdateDatapuskesmas($data = null, $where = null)
    {

        return $this->db->update('puskesmas', $data, $where);
    }
}
