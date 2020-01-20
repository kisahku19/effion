<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kategori extends HSM_Conttroller{

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->model('kategori_model');
    }

    public function index(){
        $data['title'] = 'Manajemen Kategori';
        $data['content'] = 'page/kategori/list_kategori_view';
        $data['list_kategori'] = $this->kategori_model->get_all_kategori();
        $data['page_js'] = 'page/kategori/page_js';
        $this->load->view('wrapper', $data);
    }

    public function form_kategori($id=null){
        if (!empty($id)) {
            $data['title'] = 'Edit Kategori';
            $data['detail_kategori'] = $this->kategori_model->get_kategori_by_id($id);
        }else {
            $data['title'] = 'Tambah Kategori';
            $data['detail_kategori'] = '';
        }
        $data['content'] = 'page/kategori/form_kategori_view';
        $data['page_js'] = 'page/kategori/page_js';
        $this->load->view('wrapper', $data);
    }

    public function simpan_kategori($id=null){
        $config['upload_path']          = './foto_forum/';
        $config['allowed_types']        = 'gif|jpg|png';
       

        $this->load->library('upload', $config);
        $data_arr = array(
            'nama_kategori' => $this->input->post('nama'),
        );
        if (!empty($id)) {
            //$data_arr['updated_at'] = date('Y-m-d H:i:s');
            if ($this->kategori_model->update_kategori($id, $data_arr)) {
                $this->session->set_flashdata('pesan', 'kategori berhasil update');
                redirect('kategori', 'refresh');
            }else {
               $this->session->set_flashdata('pesan', 'kategori gagal diupdate');
            }
        }else{
            //$data_arr['created_at'] = date('Y-m-d H:i:s');
            if ($this->kategori_model->insert_kategori($data_arr)) {
                $this->session->set_flashdata('pesan', 'kategori berhasil disimpan');
                redirect('kategori', 'refresh');
            }else {
               $this->session->set_flashdata('pesan', 'kategori gagal disimpan');
            }
        }
    }

    public function detail_kategori($id){
        $data['title'] = 'Detail Kategori';
        $data['content'] = 'page/kategori/detail_kategori_view';
        $data['d_kategori'] = $this->kategori_model->get_kategori_by_id($id);
        $data['page_js'] = 'page/anggota/page_js';
        $this->load->view('wrapper', $data);
    }

    public function hapus_kategori_ajax($id){
        if ($this->kategori_model->delete_kategori($id)) {
            $data['pesan'] = 'Kategori berhasil di hapus';
        }else {
            $data['pesan'] = 'Kategori gagal di hapus';
        }

        echo json_encode($data);
    }
}