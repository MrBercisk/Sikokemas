<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['title'] = 'Halaman Utama';
        $this->load->view('template_user/header', $data);
        $data['profil'] = $this->M_user->profil();
        $this->load->view('user/home_user', $data);
        $this->load->view('template_user/footer');
    }
    public function profile_user()
    {
        $data['title'] = 'Profile';
        $this->load->view('template_user/header', $data);
        $data['profil'] = $this->M_user->profil();
        $this->load->view('user/profile_user', $data);
        $this->load->view('template_user/footer');
    }





	public function update_user() 
	{

        $this->load->model('m_user'); 

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '100000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';
			$new_name = time().$_FILES["foto"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			
			$datafoto=$this->upload->data();
					
			//GD
			$this->load->library('image_lib');
			$configer =  array(
				'image_library'   => 'gd2',
				'source_image'    =>  $datafoto['full_path'],
				'maintain_ratio'  =>  TRUE,
				'width'           =>  250,
				'height'          =>  250,
			);
			$this->image_lib->clear();
			$this->image_lib->initialize($configer);
			$this->image_lib->resize();
			
			

			if($_FILES["foto"]['name']=="")
			{
				$nama_photo=$_POST['hidden_foto'];
			}
			else
			{
				
				$nama_photo=$datafoto['file_name'];

				unlink("./uploads/".$_POST['hidden_foto']);
			}



				
			$input = array(
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('no_hp'),
				'usia' =>  $this->input->post('usia'),
				'foto' => $nama_photo,
				);

				$where=array('id_user'=> $this->session->userdata('id_user'));

				$proses=$this->m_user->update_user($input, $where);		
	
			if($proses)
			{
				$this->session->set_flashdata('data','Data berhasil diUbah...');
				redirect('user');
			}

					


	} 










}
