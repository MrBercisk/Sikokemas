<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    
    
     
	function __construct()
	{
	parent::__construct();

	if(!$this->session->userdata('id_dokter'))
	{
	redirect('home/login');
	} 


	}

    public function index()
    {
        $data['title'] = 'Halaman Utama';
        $this->load->view('template_dokter/header', $data);
        $this->load->view('dokter/home_dokter');
        $this->load->view('template_dokter/footer');
    }
    public function profile_dokter()
    {
        $data['title'] = 'Profile';
        $this->load->view('template_dokter/header', $data);
        $data['profil'] = $this->db->query("select * from dokter where id_dokter = '" . $this->session->userdata('id_dokter') . "' ");
        $this->load->view('dokter/profile_dokter', $data);
        $this->load->view('template_dokter/footer');
    }
}
