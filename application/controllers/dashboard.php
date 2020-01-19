<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends HSM_Conttroller
{

    function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->model('dashboard_model');
    }

    function index()
    {
       
        $data['title'] = 'Beranda';
        //$hasil = $this->dashboard_model->get_all_forum();
        //$data['graph'] = json_encode($hasil);
       $data['page_js'] = 'page/dashboard/page_js';
       $data['total_anggota'] = $this->dashboard_model->jumlah_anggota();
       $data['total_event'] = $this->dashboard_model->jumlah_event();
       $data['total_project'] = $this->dashboard_model->jumlah_project();
       $data['total_training'] = $this->dashboard_model->jumlah_training();
       $data['total_karya'] = $this->dashboard_model->jumlah_karya();
       //$data['total_forum'] = $this->dashboard_model->jumlah_forum();
        $data['content'] = 'page/dashboard/dashboard_view';
        
        $this->load->view('wrapper', $data);
    }

    // function dashboard_wali()
    // {
    //     $data['title'] = 'Dashboard Wali Murid';
    //     $data['content'] = 'page/dashboard/dashboard_wali_view';
    //     $data['info_wali'] = $this->wali->get_wali_by_kd_wali($this->session->userdata('username'));
    //     $data['info_siswa'] = $this->siswa->get_siswa_by_kd_wali($this->session->userdata('username'));
        
    //     $this->load->view('wrapper', $data);
    // }

    // function dashboard_siswa()
    // {
    //     $data['title'] = 'Dashboard';
    //     $data['content'] = 'page/dashboard/dashboard_view';
    //     $this->load->view('wrapper', $data);
    // }
}
