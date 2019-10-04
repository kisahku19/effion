<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends HSM_Conttroller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $data['title'] = 'Profil Pengguna';
        $data['content'] = 'page/profile/profile_page_view';
        $data['detail_user'] = $this->db->where('username', $_SESSION['username'])->get('tbl_user')->row();
        $this->load->view('wrapper', $data);
    }

    function simpan_profile(){
        $data_profile = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username')
        );

        if (!empty($this->input->post('password'))) {
            $data_profile['pass'] = md5($this->input->post('password'));
        }
        // $config['upload_path']          = './foto_admin/';
        // $config['allowed_types']        = 'gif|jpg|png';
        // $this->load->library('upload', $config);
       
        if ($this->upload->do_upload('foto')) {
            $data_profile['foto'] = $this->upload->data('file_name');
            $this->db->where('user_id', $this->input->post('user_id'));
            $_SESSION['username'] = $this->input->post('username');
            $this->db->update('tbl_user', $data_profile);
            redirect('profile', 'refresh');
        }else{
            $this->db->where('user_id', $this->input->post('user_id'));
            $this->db->update('tbl_user', $data_profile);
            redirect('dashboard', 'refresh');
        }
    }
}