<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Antrian_user extends CI_Controller
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
        $data['title'] = 'Antrian Saya';
        $this->load->view('template_user/header', $data);
        $data['antrian'] = $this->M_Antrian_user->antrian();
        $data['profil'] = $this->M_user->profil();
        $this->load->view('user/antrian', $data);
        $this->load->view('template_user/footer');
    }
    public function tambah_antrian()
    {
        $data['title'] = 'Antrian Pasien';
        $this->load->view('template_user/header', $data);
        $data['profil'] = $this->M_user->profil();
        $data['puskesmas'] = $this->M_user->puskesmas();
        $this->load->view('user/tambah_antrian', $data);
        $this->load->view('template_user/footer');
    }
    public function tambah_antrian_proses()
    {
        // membuat kode no_antrian 
        $potong_thn = substr(date("Y"), 2);
        $tanggalkode = $potong_thn . "" . date("md");
        $kode = $this->input->post('id_puskesmas');
        //date_default_timezone_set('Asia/Jakarta');
        $tanggal_hari_ini = date("Y-m-d"); // pendefinisian tanggal awal
        $cek_antrian = $this->db->query("select max(no_antrian) as no_antrian from data_antrian where tanggal='$tanggal_hari_ini' and id_puskesmas ='" . $_POST['id_puskesmas'] . "'");
        foreach ($cek_antrian->result_array() as $a) {


            $kode_awal = $a['no_antrian']; //hasil cek_antrian

            $potong_karakter = substr($kode_awal, 10); // potong karakter 
            //echo $potong_karakter; // hasil 0001
            //$plus_satu = ltrim($potong_karakter, '0') + 1; // hilangkan 0 nol
            //echo $plus_satu; // hasil 2

            if (isset($a['no_antrian'])) {
                $plus_satu = $potong_karakter + 1;
                //echo $plus_satu; //hasil 2
            }

            $nomer_urut = sprintf('%05d', $plus_satu); //tambah kurang disini

        }

        if ($cek_antrian->num_rows() == "") {
            $no_antrian = $tanggalkode . "" . $kode . "0001";
        } else {
            $no_antrian = $tanggalkode . "" . $kode . "" . $nomer_urut;
        }
        $data = array(
            'no_antrian' => $no_antrian,
            'id_user' => $this->input->post('id_user'),
            'id_puskesmas' => $this->input->post('id_puskesmas'),
            'keluhan' => $this->input->post('keluhan'),
            'tanggal' =>  $tanggal_hari_ini,
        );
        $proses = $this->M_user->inputAntrian($data);
        redirect("Antrian_user/index");
    }




    public function hapus($no_antrian)
    {

        $proses = $this->db->query("delete from data_antrian  where no_antrian='" . $no_antrian . "'");
        if ($proses) {
            $this->session->set_flashdata('data', 'Gambar Sudah Dihapus....');
            redirect('antrian_user');
        }
    }
}
