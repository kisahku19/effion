<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training extends HSM_Conttroller{

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->model('training_model');
    }
    public function index(){
        $data['title'] = 'Manajemen Pelatihan';
        $data['content'] = 'page/training/list_training_view';
        $data['list_training'] = $this->training_model->get_all_training();
        $data['page_js'] = 'page/training/page_js';
        $this->load->view('wrapper', $data);
    }

    public function form_training($id=null){
        if (!empty($id)) {
            $data['title'] = 'Sunting Pelatihan';
            $data['detail_training'] = $this->training_model->get_training_by_id($id);
        }else {
            $data['title'] = 'Tambah Pelatihan';
            $data['detail_training'] = '';
        }
        $data['content'] = 'page/training/form_training_view';
        $data['page_js'] = 'page/training/page_js';
        $this->load->view('wrapper', $data);
    }

    public function simpan_training($id=null){
        $config['upload_path']          = './foto_training/';
        $config['allowed_types']        = 'gif|jpg|png';
       

        $this->load->library('upload', $config);
        $data_arr = array(
            'id_admin' => $_SESSION['id_admin'],
            'nama_training' => $this->input->post('nama_training'),
            'tanggal' => date("Y-m-d", strtotime($this->input->post('tanggal'))),
            'isi_training' => $this->input->post('isi_training')
        );
        if (!empty($id)) {
            if ($this->upload->do_upload('gambar')) {
                $data_arr['gambar'] = $this->upload->data('file_name');
                if ($this->training_model->update_training($id, $data_arr)) {
                    $this->session->set_flashdata('pesan', 'training berhasil disimpan');
                    redirect('training', 'refresh');
                }else {
                   $this->session->set_flashdata('pesan', 'training gagal disimpan');
                }
            }else{
                if ($this->training_model->update_training($id, $data_arr)) {
                    $this->session->set_flashdata('pesan', 'training berhasil disimpan');
                    redirect('training', 'refresh');
                }else {
                   $this->session->set_flashdata('pesan', 'training gagal disimpan');
                }
            }
        }else{
            if ($this->upload->do_upload('gambar')) {
                $data_arr['gambar'] = $this->upload->data('file_name');
                if ($this->training_model->insert_training($data_arr)) {
                    $this->session->set_flashdata('pesan', 'training berhasil di tambahkan');
                    redirect('training', 'refresh');
                }else {
                    $this->session->set_flashdata('pesan', 'training gagal di tambahkan');
                    redirect('training', 'refresh');
                }
            }else{
                if ($this->training_model->insert_training($data_arr)) {
                    $this->session->set_flashdata('pesan', 'training berhasil di tambahkan');
                    redirect('training', 'refresh');
                }else {
                    $this->session->set_flashdata('pesan', 'training gagal di tambahkan');
                    redirect('training', 'refresh');
                }
            }
        }
    }

    public function hapus_training_ajax($id=null){
        if ($this->training_model->delete_training($id)) {
            $data['pesan'] = 'Pelatihan berhasil di hapus';
        }else {
            $data['pesan'] = 'Pelatihan gagal di hapus';
        }

        echo json_encode($data);
    }

    public function download_training()
    {
        $this->load->library('pdf');
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "data-training.pdf";

        $data['title'] = 'Daftar Pelatihan';
        $data['content'] = 'page/training/list_training_download';
        $data['list_training'] = $this->training_model->get_all_training();
        $data['page_js'] = 'page/training/page_js';

        $this->pdf->load_view('wrapper', $data);
    }
}
