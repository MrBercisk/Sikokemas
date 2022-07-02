<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

     
	function __construct()
	{
	parent::__construct();

	if(!$this->session->userdata('id_login'))
	{
	redirect('auth');
	} 

    $this->load->model('M_dokter');

	}


    public function index()
    {
        $data['title'] = 'Sikokemas Admin';
        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template_admin/footer');
    }

    public function profiladm()
    {
        $data['title'] = 'Profile';
        $this->load->view('template_admin/header', $data);
        $this->load->view('admin/profiladm', $data);
        $this->load->view('template_admin/footer');
    }
}
