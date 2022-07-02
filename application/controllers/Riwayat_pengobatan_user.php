<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_pengobatan_user extends CI_Controller
{

    function __construct()
	{
	parent::__construct();

	if(!$this->session->userdata('id_user'))
	{
	redirect('home/login');
	} 
    }
    
    public function index()
    {
        $data['title'] = 'Riwayat Pasien';
        $this->load->view('template_user/header', $data);
        $data['riwayat'] = $this->M_Riwayat_pengobatan_user->riwayat_pengobatan_dokter();
        $data['profil'] = $this->M_user->profil();
        $this->load->view('user/riwayat_pengobatan_user', $data);
        $this->load->view('template_user/footer');
    }
   
}
