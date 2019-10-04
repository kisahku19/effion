<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Anggota extends HSM_Conttroller{

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->model('anggota_model');
    }

    public function index(){
        $data['title'] = 'Management Anggota';
        $data['content'] = 'page/anggota/list_anggota_view';
        $data['list_anggota'] = $this->anggota_model->get_all_anggota();
        $data['page_js'] = 'page/anggota/page_js';
        $this->load->view('wrapper', $data);
    }

    public function detail_anggota($id){
        $data['title'] = 'Detail Anggota';
        $data['content'] = 'page/anggota/detail_anggota_view';
        $data['d_anggota'] = $this->anggota_model->get_anggota_by_id($id);
        $data['page_js'] = 'page/anggota/page_js';
        $this->load->view('wrapper', $data);
    }

    public function hapus_anggota_ajax($id){
        if ($this->anggota_model->delete_anggota($id)) {
            $data['pesan'] = 'Anggota berhasil di hapus';
        }else {
            $data['pesan'] = 'Anggota gagal di hapus';
        }

        echo json_encode($data);
    }
}