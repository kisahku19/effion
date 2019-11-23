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
    
    public function balas_komentar_event($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        //cek komentar
        $cek = $this->badwords($this->input->post('isi_komentar'));
        if ($cek){
            $this->session->set_flashdata('pesan', 'Dilarang menggunakan kata : '.$cek);
            redirect('front/detail_event/' . $id);
        }else{
            $data = [
                'id_parent_komentar_forum' => $id,
                'id_forum' => $this->input->post('id_forum'),
                'isi_komentar' => $this->input->post('isi_komentar'),
                'nama' => $this->session->userdata('nama_lengkap'),
                'waktu' => date('d/m/y H:i:s')
            ];
            $this->db->insert('komentar_forum', $data);
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
            'waktu' => date('d/m/y H:i:s')
        ];
        $this->db->insert('komentar_project', $data);
        redirect('front/detail_project/' . $this->input->post('id_project'));
    }

    private function badwords($string){
        $badWords = array("suck","tai","anjing","goblok","bangsat","babi","fuck");

        $matches = array();
        $matchFound = preg_match_all(
                        "/(" . implode($badWords,"|") . ")/i", 
                        $string, 
                        $matches
                    );
        $words=array();
        if ($matchFound) {
            $words = array_unique($matches[0]);
            return implode(",",$words);
        }else{
            return false;
        }        
    }
}
