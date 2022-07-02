<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_dokter extends CI_Controller
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
        $data['title'] = 'Data Dokter';
        $this->load->view('template_admin/header', $data);
        $data['data'] = $this->M_dokter->dokter();
        $this->load->view('admin/data_dokter', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_data_dokter()
    {
        $data['title'] = 'Tambah Data Dokter';
        $this->load->view('template_admin/header', $data);
         $this->load->view('admin/tambah_data_dokter');
        $this->load->view('template_admin/footer');
    }

    public function tambah_data_dokter_proses()
    {
			
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100000';
        $config['max_width']  = '10240';
        $config['max_height']  = '7680';

        if($_FILES["foto"]['name']=="")
        {
            $new_name ='';
        }
        else
        {
            $new_name = time().$_FILES["foto"]['name'];
        }


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
        
        
            
        $input = array(
            'nama_dokter' => $this->input->post('nama_dokter'),
            'no_hp' => $this->input->post('no_hp'),
            'email' =>  $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'foto' => $datafoto['file_name'],
            );

        $proses=$this->M_dokter->simpanDataDokter($input);	
                    
    
        if($proses)
        {
            $this->session->set_flashdata('data','Data berhasil diTambahkan...');
            redirect('data_dokter');
        }
    }




    public function edit_data_dokter($id_dokter)
    {
        $data['title'] = 'Edit Data Dokter';
        $this->load->view('template_admin/header', $data);
        $data['data'] = $this->M_dokter->edit_dokter($id_dokter);
        $this->load->view('admin/edit_data_dokter', $data);
        $this->load->view('template_admin/footer');
    }





	public function update_data_dokter() 
	{

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '100000';
			$config['max_width']  = '10240';
			$config['max_height']  = '7680';
			$new_name = time().$_FILES["photo"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
			$this->upload->do_upload('foto');
			
			
			
			$datafoto=$this->upload->data();
			
			if($_FILES["foto"]['name']=="")
			{
				$nama_photo=$_POST['hidden_foto'];
			}
			else
			{
				
				$nama_photo=$datafoto['file_name'];

				unlink("./uploads/".$_POST['hidden_foto']);
			}


			if($this->input->post('password')=="")
			{
				$pass=$_POST['hidden_password'];
			}
			else
			{
				$pass=md5($this->input->post('password'));
			}

            

			
			$input = array(
                    'nama_dokter' => $this->input->post('nama_dokter'),
                    'no_hp' => $this->input->post('no_hp'),
                    'email' =>  $this->input->post('email'),
                    'password' =>$pass ,
                    'foto' => $nama_photo,
                    );



			$where=array('id_dokter'=> $this->input->post('id_dokter'));

			$proses=$this->M_dokter->UpdateDataDokter($input, $where);		
	
			if($proses)
			{
				$this->session->set_flashdata('data','Data berhasil diUbah...');
				redirect('data_dokter');
			}

	
	} 



    public function hapus($id_dokter)
    {

        $proses = $this->db->query("delete from dokter  where id_dokter='" . $id_dokter . "'");
        if ($proses) {
            $this->session->set_flashdata('data', 'Data Sudah Dihapus....');
            redirect('data_dokter');
        }
    }


}
