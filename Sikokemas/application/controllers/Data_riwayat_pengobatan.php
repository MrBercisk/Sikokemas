<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_riwayat_pengobatan extends CI_Controller
{

    function __construct()
	{
	parent::__construct();

	if(!$this->session->userdata('id_login'))
	{
	redirect('home/login');
	} 
    
    $this->load->model('M_data_riwayat_pengobatan');
    }

    public function index()
    {
       
        $data['title'] = 'Riwayat Pasien';
        $this->load->view('template_admin/header', $data);
        $data['riwayat'] = $this->M_data_riwayat_pengobatan->riwayat_pengobatan();
        $this->load->view('admin/data_riwayat_pengobatan', $data);
        $this->load->view('template_admin/footer');

    }
    public function tambah_diagnosa($no_antrian)
    {
       /*  $data['title'] = 'Tambah Riwayat Diagnosa';
        $this->load->view('template_dokter/header', $data);
        $data['cek_antrian'] = $this->M_Antrian_dokter->cek_antrian($no_antrian);
        $data['obat'] = $this->M_Antrian_dokter->obat();
        $this->load->view('dokter/tambah_diagnosa', $data);
        $this->load->view('template_dokter/footer'); */

        $data['title'] = 'Tambah Riwayat Diagnosa';
        $this->load->view('template_admin/header', $data);
        $data['cek_antrian'] = $this->M_data_riwayat_pengobatan->cek_antrian($no_antrian);
        $data['obat'] = $this->M_data_riwayat_pengobatan->obat();
        $this->load->view('admin/tambah_diagnosa', $data);
        $this->load->view('template_admin/footer');



    }
    public function tambah_diagnosa_proses()
    {
        $data = array(
            'no_antrian' => $this->input->post('no_antrian'),
            'id_user' => $this->input->post('id_user'),
            'id_login' => $this->input->post('id_login'),
            'diagnosa' => $this->input->post('diagnosa'),
            'id_obat' => $this->input->post('id_obat')

        );
        $proses = $this->M_data_riwayat_pengobatan->simpanDatadiagnosa($data);
        redirect("data_riwayat_pengobatan/index");
    }
    public function edit_diagnosa()
    {
        $data['title'] = 'Edit Diagnosa';
        $this->load->view('template_dokter/header', $data);
        $data['obat'] = $this->M_Antrian_dokter->obat();
        $data['edit_diagnosa'] = $this->db->query("select a.*, b.nama from riwayat_pengobatan a
        left join user b on a.id_user = b.id_user where a.id_riwayat='" . $this->uri->segment(3) . " '");
        $this->load->view('dokter/v_edit_diagnosa', $data);
        $this->load->view('template_dokter/footer');
    }
    public function hapus_diagnosa()
    {
        $data = ['id_riwayat' => $this->uri->segment(3)];
        $this->M_Riwayat_pengobatan_dokter->hapus_data_diagnosa($data);
        redirect('data_riwayat_pengobatan/index/');
    }
    public function updateDatadiagnosa()
    {
        $id_riwayat = $this->input->post('id_riwayat');
        $diagnosa = $this->input->post('diagnosa');
        $id_obat = $this->input->post('id_obat');

        $data = array(
            'diagnosa' => $diagnosa,
            'id_obat' => $id_obat
        );

        $where = array(
            'id_riwayat' => $id_riwayat,

        );

        $this->M_Riwayat_pengobatan_dokter->updateDatadiagnosa($data, $where);
        redirect('riwayat_pengobatan_dokter');
    }
}
