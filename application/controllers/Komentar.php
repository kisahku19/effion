<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
{

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
        redirect('front/detail_forum/' . $this->input->post('id_forum'));
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
        redirect('front/detail_project/' . $this->input->post('id_project'));
    }
}
