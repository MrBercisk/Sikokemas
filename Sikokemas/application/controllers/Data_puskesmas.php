<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_puskesmas extends CI_Controller
{


    
	function __construct()
	{
	parent::__construct();

	if(!$this->session->userdata('id_login'))
	{
	redirect('auth');
	} 


	}

    public function index()
    {
        $data['title'] = 'Data Puskesmas';
        $this->load->view('template_admin/header', $data);
        $data['data'] = $this->M_puskesmas->puskesmas();
        $this->load->view('admin/data_puskesmas', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_data_puskesmas()
    {
        $data['title'] = 'Tambah Data Puskesmas';
        $this->load->view('template_admin/header', $data);
         $this->load->view('admin/tambah_data_puskesmas');
        $this->load->view('template_admin/footer');
    }

    public function tambah_data_puskesmas_proses()
    {
		
                    
        $input = array(
            'nama_puskesmas' => $this->input->post('nama_puskesmas'),
            'alamat' => $this->input->post('alamat'),
            'id_login' =>  $this->session->userdata('id_login'),
            );

        $proses=$this->M_puskesmas->simpanDatapuskesmas($input);	
                    
    
        if($proses)
        {
            $this->session->set_flashdata('data','Data berhasil diTambahkan...');
            redirect('data_puskesmas');
        }
    }




    public function edit_data_puskesmas($id_puskesmas)
    {
        $data['title'] = 'Edit Data Puskesmas';
        $this->load->view('template_admin/header', $data);
        $data['data'] = $this->M_puskesmas->edit_puskesmas($id_puskesmas);
        $this->load->view('admin/edit_data_puskesmas', $data);
        $this->load->view('template_admin/footer');
    }





	public function update_data_puskesmas() 
	{

        $input = array(
            'nama_puskesmas' => $this->input->post('nama_puskesmas'),
            'alamat' => $this->input->post('alamat'),
            );



			$where=array('id_puskesmas'=> $this->input->post('id_puskesmas'));

			$proses=$this->M_puskesmas->UpdateDatapuskesmas($input, $where);		
	
			if($proses)
			{
				$this->session->set_flashdata('data','Data berhasil diUbah...');
				redirect('data_puskesmas');
			}

	
	} 



    public function hapus($id_puskesmas)
    {

        $proses = $this->db->query("delete from puskesmas  where id_puskesmas='" . $id_puskesmas . "'");
        if ($proses) {
            $this->session->set_flashdata('data', 'Data Sudah Dihapus....');
            redirect('data_puskesmas');
        }
    }


}
