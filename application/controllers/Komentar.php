<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
{

    public function index()
    {

        $data['title'] = 'Komentar Event';
        $data['content'] = 'page/event/list_komentar_view';
        $data['all_comment'] = $this->db->order_by('waktu','desc')->get('komentar_event')->result();
        $data['unapprove'] = $this->db->where('status_komentar', 0)->order_by('waktu','desc')->get('komentar_event')->result();
        $data['approve'] = $this->db->where('status_komentar', 1)->order_by('waktu','desc')->get('komentar_event')->result();
        $data['page_js'] = 'page/event/page_js';
        $this->load->view('wrapper', $data);
    }
    public function balas_komentar_forum($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'id_parent_komentar_event' => $id,
            'id_forum' => $this->input->post('id_forum'),
            'isi_komentar' => $this->input->post('isi_komentar'),
            'nama' => $this->session->userdata('nama_lengkap'),
            'waktu' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('komentar_forum', $data);
        redirect('front/detail_forum/' . $this->input->post('id_forum'));
    }

    public function balas_komentar_event($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        //cek komentar
        //$cek = $this->badwords($this->input->post('isi_komentar'));
        $cek = false;
        if ($cek) {
            $this->session->set_flashdata('pesan', 'Dilarang menggunakan kata : ' . $cek);
            redirect('front/detail_event/' . $id);
        } else {
            $data = [
                'id_parent_komentar_event' => $this->input->post('id_parent_komentar_event' ),
                'id_event' => $this->input->post('id_event'),
                'isi_komentar' => $this->input->post('isi_komentar'),
                'nama' => $this->session->userdata('nama_lengkap'),
                'waktu' => date('Y-m-d H:i:s'),
                'status_komentar' => 0,
            ];
            $this->db->insert('komentar_event', $data);
            $this->session->set_flashdata('pesan', 'Komentar anda akan ditampilkan setelah di setujui oleh admin');
            redirect('front/detail_event/' . $id);
        }
    }

    public function balas_komentar_project($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'id_parent_komentar_project' => $id,
            'id_project' => $this->input->post('id_project'),
            'isi_komentar' => $this->input->post('isi_komentar'),
            'nama' => $this->session->userdata('nama_lengkap'),
            'waktu' => date('Y-m-d H:i:s'),
            'status_komentar'=>0,
        ];
        $this->db->insert('komentar_project', $data);
        $this->session->set_flashdata('pesan', 'Komentar anda akan ditampilkan setelah di setujui oleh admin');
        redirect('front/detail_project/' . $this->input->post('id_project'));
    }

    public function update_status($id, $status)
    {
        $this->db->set('status_komentar', $status);
        $this->db->where('id_komentar_event', $id);
        $this->db->update('komentar_event');
        redirect('komentar');
    }

    public function hapus_komentar_ajax($id)
    {
        $this->load->model('event_model');
        if ($this->event_model->delete_komentar($id)) {
            $data['pesan'] = 'komentar berhasil di hapus';
        } else {
            $data['pesan'] = 'komentar gagal di hapus';
        }

        echo json_encode($data);
    }

    private function badwords($string)
    {
        $badWords = array("suck", "tai", "anjing", "goblok", "bangsat", "babi", "fuck");

        $matches = array();
        $matchFound = preg_match_all(
            "/(" . implode($badWords, "|") . ")/i",
            $string,
            $matches
        );
        $words = array();
        if ($matchFound) {
            $words = array_unique($matches[0]);
            return implode(",", $words);
        } else {
            return false;
        }
    }
}
