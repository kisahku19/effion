<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends HSM_Conttroller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model', 'login');
        $this->load->model('user_model', 'user');
    }


    function aksi_login()
    {
        $username = $this->input->post('username');
        $pass = $this->input->post('password');

        if ($this->login->cek_login($username, $pass)) {
            $hasil = $this->user->get_user_by_user_and_pass($username, md5($pass));

            $data_arr = array();
            $data_arr['id_admin'] = $hasil->id_admin;
            $data_arr['username'] = $hasil->username;
            $data_arr['password'] = $hasil->pass;
            $data_arr['grup'] = $hasil->grup;
            $data_arr['nama_lengkap'] = $hasil->nama_admin;

            $this->session->set_userdata($data_arr);
            if ($this->session->userdata('grup') == 'admin') {
                redirect('dashboard');
            } elseif ($this->session->userdata('grup') == 'wali_murid') {
                redirect('dashboard/dashboard_wali');
            } else {
                redirect('dashboard/dashboard_siswa');
            }
        } else {
            redirect('login');
        }
    }

    function index()
    {
        $this->session->sess_destroy();
        if (!$this->session->userdata('grup')) {
            $this->load->view('login_view');
        } else {
            redirect('dashboard');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();

        redirect('login');
    }
}
