<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_admin extends CI_Controller
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
        $data['title'] = 'Antrian Admin';
        $this->load->view('template_admin/header', $data);
        $data['antrian'] = $this->M_Antrian_admin->antrian();
        $this->load->view('admin/antrian', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_dokter($no_antrian)
    {
        $data['title'] = 'Tambah Dokter';
        $this->load->view('template_admin/header', $data);
        $data['cek_antrian'] = $this->M_Antrian_admin->cek_antrian($no_antrian);
        $data['dokter'] = $this->M_Antrian_admin->dokter();
        $this->load->view('admin/tambah_dokter', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_dokter_proses()
    {
        $data = array(
            'id_dokter' => $this->input->post('id_dokter'),
        );
        $where = array(
            'no_antrian' => $this->input->post('no_antrian'),
        );
        $proses = $this->M_Antrian_admin->UpdateDokter($data, $where);
        redirect("Antrian_admin");
    }
}
