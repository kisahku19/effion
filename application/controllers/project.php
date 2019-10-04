<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project extends HSM_Conttroller
{

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->model('project_model');
    }
    public function index()
    {
        $data['title'] = 'Management Project';
        $data['content'] = 'page/project/list_project_view';
        $data['list_project'] = $this->project_model->get_all_project();
        $data['page_js'] = 'page/project/page_js';
        $this->load->view('wrapper', $data);
    }

    public function form_project($id = null)
    {
        if (!empty($id)) {
            $data['title'] = 'Edit Project';
            $data['detail_project'] = $this->project_model->get_project_by_id($id);
        } else {
            $data['title'] = 'Tambah Project';
            $data['detail_project'] = '';
        }
        $data['content'] = 'page/project/form_project_view';
        $data['page_js'] = 'page/project/page_js';
        $this->load->view('wrapper', $data);
    }

    public function simpan_project($id = null)
    {

        $data_arr = array(
            'id_admin' => $_SESSION['id_admin'],
            'nama_channel' => $this->input->post('nama_channel'),
            'tanggal' => $this->input->post('tanggal'),
            'isi_project' => $this->input->post('isi_project'),
            'video' => $this->input->post('video')
        );
        if (!empty($id)) {
            if ($this->project_model->update_project($id, $data_arr)) {
                $this->session->set_flashdata('pesan', 'Project berhasil disimpan');
                redirect('project', 'refresh');
            } else {
                $this->session->set_flashdata('pesan', 'Project gagal disimpan');
            }
        } else {
            if ($this->project_model->insert_project($data_arr)) {
                $this->session->set_flashdata('pesan', 'Project berhasil disimpan');
                redirect('project', 'refresh');
            } else {
                $this->session->set_flashdata('pesan', 'Project gagal disimpan');
            }
        }
    }

    public function hapus_project_ajax($id = null)
    {
        if ($this->project_model->delete_project($id)) {
            $data['pesan'] = 'Project berhasil di hapus';
        } else {
            $data['pesan'] = 'Project gagal di hapus';
        }

        echo json_encode($data);
    }
}
