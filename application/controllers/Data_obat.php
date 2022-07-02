<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_obat extends CI_Controller
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
        $data['title'] = 'Data Obat';
        $this->load->view('template_admin/header', $data);
        $data['data'] = $this->M_obat->obat();
        $this->load->view('admin/data_obat', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_data_obat()
    {
        $data['title'] = 'Tambah Data Obat';
        $this->load->view('template_admin/header', $data);
         $this->load->view('admin/tambah_data_obat');
        $this->load->view('template_admin/footer');
    }

    public function tambah_data_obat_proses()
    {
		
                    
        $input = array(
            'nama_obat' => $this->input->post('nama_obat'),
            'kategori' => $this->input->post('kategori'),
            'id_login' =>  $this->session->userdata('id_login'),
            );

        $proses=$this->M_obat->simpanDataObat($input);	
                    
    
        if($proses)
        {
            $this->session->set_flashdata('data','Data berhasil diTambahkan...');
            redirect('data_obat');
        }
    }




    public function edit_data_obat($id_obat)
    {
        $data['title'] = 'Edit Data obat';
        $this->load->view('template_admin/header', $data);
        $data['data'] = $this->M_obat->edit_obat($id_obat);
        $this->load->view('admin/edit_data_obat', $data);
        $this->load->view('template_admin/footer');
    }





	public function update_data_obat() 
	{

        $input = array(
            'nama_obat' => $this->input->post('nama_obat'),
            'kategori' => $this->input->post('kategori'),
            );



			$where=array('id_obat'=> $this->input->post('id_obat'));

			$proses=$this->M_obat->UpdateDataobat($input, $where);		
	
			if($proses)
			{
				$this->session->set_flashdata('data','Data berhasil diUbah...');
				redirect('data_obat');
			}

	
	} 



    public function hapus($id_obat)
    {

        $proses = $this->db->query("delete from obat  where id_obat='" . $id_obat . "'");
        if ($proses) {
            $this->session->set_flashdata('data', 'Data Sudah Dihapus....');
            redirect('data_obat');
        }
    }


}
