<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() ==  false) {

            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasinya sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');


        $user = $this->db->get_where('login', ['email' => $email])->row_array();



        $session_data['nama_login'] = $user['nama_login'];
        $session_data['id_login'] = $user['id_login'];


        $cek = $this->db->query("select * from puskesmas where id_puskesmas='".$user['id_puskesmas']."' ");


        foreach ($cek->result_array() as $a) {

            $session_data['nama_puskesmas'] = $a['nama_puskesmas'];
            $session_data['id_puskesmas'] = $a['id_puskesmas'];
                      
        }




        $this->session->set_userdata($session_data);






        //jika usernya ada
        if ($user) {

            echo "sukses";
            //jika ussernya aktif
            if ($user['is_active'] ==  1) {
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Email has not been activated !
            </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered !
        </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nama_login');
        $this->session->unset_userdata('id_login');
        $this->session->unset_userdata('nama_puskesmas');
        $this->session->unset_userdata('id_puskesmas');
        $this->session->set_flashdata('message', '<div class="alert alert-success"role="alert"You have been logged out!</div>');
        redirect('auth');
    }
}
