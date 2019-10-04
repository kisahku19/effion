<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class forum extends HSM_Conttroller{

    public function __construct()
    {
        parent::__construct();
        $this->cek_login();
        $this->load->model('forum_model');
    }
    public function index(){
        $data['title'] = 'Management Forum';
        $data['content'] = 'page/forum/list_forum_view';
        $data['list_forum'] = $this->forum_model->get_all_forum();
        $data['page_js'] = 'page/forum/page_js';
        $this->load->view('wrapper', $data);
    }

    public function form_forum($id=null){
        if (!empty($id)) {
            $data['title'] = 'Edit forum';
            $data['detail_forum'] = $this->forum_model->get_forum_by_id($id);
        }else {
            $data['title'] = 'Tambah forum';
            $data['detail_forum'] = '';
        }
        $data['content'] = 'page/forum/form_forum_view';
        $data['page_js'] = 'page/forum/page_js';
        $this->load->view('wrapper', $data);
    }

    public function simpan_forum($id=null){
        $config['upload_path']          = './foto_forum/';
        $config['allowed_types']        = 'gif|jpg|png';
       

        $this->load->library('upload', $config);
        $data_arr = array(
            'nama' => $this->input->post('nama'),
            'judul_forum' => $this->input->post('judul_forum'),
            'tanggal' => $this->input->post('tanggal'),
            'isi_forum' => $this->input->post('isi_forum')
        );
        if (!empty($id)) {
            if ($this->upload->do_upload('gambar')) {
                $data_arr['gambar'] = $this->upload->data('file_name');
                if ($this->forum_model->update_forum($id, $data_arr)) {
                    $this->session->set_flashdata('pesan', 'forum berhasil disimpan');
                    redirect('forum', 'refresh');
                }else {
                   $this->session->set_flashdata('pesan', 'forum gagal disimpan');
                }
            }else{
                if ($this->forum_model->update_forum($id, $data_arr)) {
                    $this->session->set_flashdata('pesan', 'forum berhasil disimpan');
                    redirect('forum', 'refresh');
                }else {
                   $this->session->set_flashdata('pesan', 'forum gagal disimpan');
                }
            }
        }else{
            if ($this->upload->do_upload('gambar')) {
                $data_arr['gambar'] = $this->upload->data('file_name');
                if ($this->forum_model->insert_forum($data_arr)) {
                    $this->session->set_flashdata('pesan', 'forum berhsail di tambahkan');
                    redirect('forum', 'refresh');
                }else {
                    $this->session->set_flashdata('pesan', 'forum gagal di tambahkan');
                    redirect('forum', 'refresh');
                }
            }else{
                if ($this->forum_model->insert_forum($data_arr)) {
                    $this->session->set_flashdata('pesan', 'forum berhsail di tambahkan');
                    redirect('forum', 'refresh');
                }else {
                    $this->session->set_flashdata('pesan', 'forum gagal di tambahkan');
                    redirect('forum', 'refresh');
                }
            }
        }
    }

    public function hapus_forum_ajax($id=null){
        if ($this->forum_model->delete_forum($id)) {
            $data['pesan'] = 'forum berhasil di hapus';
        }else {
            $data['pesan'] = 'forum gagal di hapus';
        }

        echo json_encode($data);
    }

    function komentar($id){
        $data['title'] = 'Komentar Forum';
        $data['content'] = 'page/forum/komentar_view';
        $data['detail_forum'] = $this->db->where('id_forum', $id)->get('forum')->row();
        $data['all_comment'] = $this->db->where('id_forum', $id)->get('komentar_forum')->result();
        $this->load->view('wrapper', $data);
    }

    function buat_komentar($id){
        $data_arr = array(
            'nama' => $_SESSION['username'],
            'id_forum' => $id,
            'isi_komentar' => $this->input->post('komentar'),
            'waktu' => date('d/m/Y -- H:i:s')
        );

        $this->db->insert('komentar_forum', $data_arr);
        redirect('forum/komentar/'.$id, 'refresh');
    }

    public function balas_komentar_forum($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'id_parent_komentar_forum' => $id,
            'id_forum' => $this->input->post('id_forum'),
            'isi_komentar' => $this->input->post('isi_komentar'),
            'nama' => $this->session->userdata('nama_lengkap'),
            'waktu' => date('d/m/y H:i:s')
        ];
        $this->db->insert('komentar_forum', $data);
        redirect('forum/komentar/' . $this->input->post('id_forum'));
    }

    public function balas_komentar_project($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'id_parent_komentar_project' => $id,
            'id_project' => $this->input->post('id_project'),
            'isi_komentar' => $this->input->post('isi_komentar'),
            'nama' => $this->session->userdata('nama_lengkap'),
            'waktu' => date('d/m/y H:i:s')
        ];
        $this->db->insert('komentar_project', $data);
        redirect('forum/komentar/' . $this->input->post('id_project'));
    }
}
