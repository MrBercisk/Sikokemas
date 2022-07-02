<?php

class Home extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Sikokemas';
        $this->load->view('templates/header', $data);
        $this->load->view('home');
        $this->load->view('templates/footer');
    }


    public function info()
    {
        $data['title'] = 'Info Vaksin';
        $this->load->view('templates/header', $data);
        $this->load->view('info');
        $this->load->view('templates/footer');
    }

    public function login()
    {
        $data['title'] = 'Login';
        $this->load->view('templates/header', $data);
        $this->load->view('login');
        $this->load->view('templates/footer');
    }

    public function tentang()
    {
        $data['title'] = 'Tentang';
        $this->load->view('templates/header', $data);
        $this->load->view('tentang');
        $this->load->view('templates/footer');
    }

    public function artikel()
    {
        $data['title'] = 'Artikel';
        $this->load->view('templates/header', $data);
        $this->load->view('artikel');
        $this->load->view('templates/footer');
    }

    public function konsultasi()
    {
        $data['title'] = 'Konsultasi';
        $this->load->view('templates/header', $data);
        $this->load->view('konsultasi');
        $this->load->view('templates/footer');
    }

    public function daftar()
    {
        $data['title'] = 'Daftar';
        $this->load->view('templates/header', $data);
        $this->load->view('daftar');
        $this->load->view('templates/footer');
    }

    public function proses_daftar()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),


        );
        $proses = $this->m_login->proses_daftar($data);
        $this->session->set_flashdata('data', 'Akun telah terdaftar, silahkan login ....');
        redirect("home/daftar?proses=sukses");
    }




    public function proses_login()
    {



        if ($_POST['pilihan'] == "user") {

            $cek = $this->m_login->proses_login();


            foreach ($cek->result_array() as $a) {

                $session_data['nama'] = $a['nama'];
                $session_data['id_user'] = $a['id_user'];

                $this->session->set_userdata($session_data);
            }




            if ($cek->num_rows() >= 1) {

                redirect('user');
            } else {
?>
                <script language="javascript">
                    alert("Maaf user dan password anda salah klik OK untuk kembali");
                    history.back();
                </script>

            <?php
            }
        } else if ($_POST['pilihan'] == 'dokter') {



            $cek = $this->m_login->proses_login_dokter();


            foreach ($cek->result_array() as $a) {

                $session_data['nama_dokter'] = $a['nama_dokter'];
                $session_data['id_dokter'] = $a['id_dokter'];

                $this->session->set_userdata($session_data);
            }




            if ($cek->num_rows() >= 1) {

                redirect('dokter');
            } else {
            ?>
                <script language="javascript">
                    alert("Maaf user dan password anda salah klik OK untuk kembali");
                    history.back();
                </script>

            <?php
            }
        } else {
            ?>
            <script language="javascript">
                alert("Patikan Pilihan Dokter atau User Terpilih klik ok untuk kembali");
                history.back();
            </script>

<?php
        }
    }



    function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}
