<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unggah_karya extends HSM_Conttroller{

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->model('unggah_karya_model');
    }
    public function index(){
        $data['title'] = 'Management Karya';
        $data['content'] = 'page/unggah_karya/list_unggah_karya_view';
        $data['filter'] = $this->input->post('filter_date');
        $data['list_unggah_karya'] = $this->unggah_karya_model->get_all_unggah_karya($data['filter']);
        
        $data['page_js'] = 'page/unggah_karya/page_js';
        $this->load->view('wrapper', $data);
    }

    public function form_unggah_karya($id=null){
        if (!empty($id)) {
            $data['title'] = 'Edit Unggah Karya';
            $data['detail_unggah_karya'] = $this->unggah_karya_model->get_unggah_karya_by_id($id);
        }else {
            $data['title'] = 'Tambah Unggah Karya';
            $data['detail_unggah_karya'] = '';
        }
        $data['content'] = 'page/unggah_karya/form_unggah_karya_view';
        $data['page_js'] = 'page/unggah_karya/page_js';
        $this->load->view('wrapper', $data);
    }

    public function detail_unggah_karya($id){
        $data['title'] = 'Detail Unggah Karya';
        $data['content'] = 'page/unggah_karya/detail_unggah_karya_view';
        $data['d_unggah_karya'] = $this->unggah_karya_model->get_unggah_karya_by_id($id);
        $data['page_js'] = 'page/unggah_karya/page_js';
        $this->load->view('wrapper', $data);
    }

    public function simpan_unggah_karya($id=null){
        $config['upload_path']          = './foto_unggah_karya/';
        $config['allowed_types']        = 'gif|jpg|png';
       

        $this->load->library('upload', $config);
        $data_arr = array(
            'id_admin' => $_SESSION['id_admin'],
            'nama_channel' => $this->input->post('nama_channel'),
            'tanggal' => $this->input->post('tanggal'),
            'isi_karya' => $this->input->post('isi_karya')
        );
        if (!empty($id)) {
            if ($this->upload->do_upload('gambar')) {
                $data_arr['gambar'] = $this->upload->data('file_name');
                if ($this->unggah_karya_model->update_unggah_karya($id, $data_arr)) {
                    $this->session->set_flashdata('pesan', 'unggah_karya berhasil disimpan');
                    redirect('unggah_karya', 'refresh');
                }else {
                   $this->session->set_flashdata('pesan', 'unggah_karya gagal disimpan');
                }
            }else{
                if ($this->unggah_karya_model->update_unggah_karya($id, $data_arr)) {
                    $this->session->set_flashdata('pesan', 'unggah_karya berhasil disimpan');
                    redirect('unggah_karya', 'refresh');
                }else {
                   $this->session->set_flashdata('pesan', 'unggah_karya gagal disimpan');
                }
            }
        }else{
            if ($this->upload->do_upload('gambar')) {
                $data_arr['gambar'] = $this->upload->data('file_name');
                if ($this->unggah_karya_model->insert_unggah_karya($data_arr)) {
                    $this->session->set_flashdata('pesan', 'unggah_karya berhasil di tambahkan');
                    redirect('unggah_karya', 'refresh');
                }else {
                    $this->session->set_flashdata('pesan', 'unggah_karya gagal di tambahkan');
                    redirect('unggah_karya', 'refresh');
                }
            }else{
                if ($this->unggah_karya_model->insert_unggah_karya($data_arr)) {
                    $this->session->set_flashdata('pesan', 'unggah_karya berhasil di tambahkan');
                    redirect('unggah_karya', 'refresh');
                }else {
                    $this->session->set_flashdata('pesan', 'unggah_karya gagal di tambahkan');
                    redirect('unggah_karya', 'refresh');
                }
            }
        }
    }

    public function hapus_unggah_karya_ajax($id=null){
        if ($this->unggah_karya_model->delete_unggah_karya($id)) {
            $data['pesan'] = 'unggah_karya berhasil di hapus';
            redirect('unggah_karya', 'refresh');
        }else {
            $data['pesan'] = 'unggah_karya gagal di hapus';
        }

        echo json_encode($data);
    }
}