<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_manajemen extends CI_Controller
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
        $data['title'] = 'User Manajemen';
        $this->load->view('template_admin/header', $data);
        $data['data'] = $this->M_user_manajemen->user_manajemen();
        $this->load->view('admin/user_manajemen', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_user_manajemen()
    {
        $data['title'] = 'Tambah User';
        $this->load->view('template_admin/header', $data);
        $data['data'] = $this->M_puskesmas->puskesmas();
        $this->load->view('admin/tambah_user_manajemen', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_user_manajemen_proses()
    {
		
                    
        $input = array(
            'nama_login' => $this->input->post('nama_login'),
            'email' => $this->input->post('email'),
            'password' =>  md5($this->session->userdata('password')),
            'id_puskesmas' => $this->input->post('id_puskesmas'),
            'is_active' => 1,
            );

        $proses=$this->M_user_manajemen->simpanDatauser_manajemen($input);	
                    
    
        if($proses)
        {
            $this->session->set_flashdata('data','Data berhasil diTambahkan...');
            redirect('user_manajemen');
        }
    }




    public function edit_user_manajemen($id_login)
    {
        $data['title'] = 'Edit user manajemen';
        $this->load->view('template_admin/header', $data);
        $data['data'] = $this->M_user_manajemen->edit_user_manajemen($id_login);
        $data['puskesmas'] = $this->M_puskesmas->puskesmas();
        $this->load->view('admin/edit_user_manajemen', $data);
        $this->load->view('template_admin/footer');
    }





	public function update_user_manajemen() 
	{




        if($this->input->post('password')=="")
        {
            $pass=$this->input->post('hidden_password');
        }
        else
        {
            $pass=md5($this->input->post('password'));
        }



        $input = array(
            'nama_login' => $this->input->post('nama_login'),
            'email' => $this->input->post('email'),
            'password' =>  $pass,
            'id_puskesmas' => $this->input->post('id_puskesmas'),
            
            );



			$where=array('id_login'=> $this->input->post('id_login'));

			$proses=$this->M_user_manajemen->UpdateDatauser_manajemen($input, $where);		
	
			if($proses)
			{
				$this->session->set_flashdata('data','Data berhasil diUbah...');
				redirect('user_manajemen');
			}

	
	} 



    public function hapus($id_login)
    {

        $proses = $this->db->query("delete from login  where id_login='".$id_login."'");
        if ($proses) {
            $this->session->set_flashdata('data', 'Data Sudah Dihapus....');
            redirect('user_manajemen');
        }
    }


}
