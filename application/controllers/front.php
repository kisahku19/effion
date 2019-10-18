<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('training_model');
        $this->load->model('forum_model');
        $this->load->model('project_model');
        $this->load->model('unggah_karya_model');
    }

    function index()
    {
        $data['title'] = 'Effion';
        $data['all_event'] = $this->event_model->get_all_event();
        $data['content'] = 'page/front/index_view';
        $this->load->view('page/front/component/wrapper', $data);
    }

    function register()
    {
        $data['title'] = 'Registrasi Anggota';
        $data['content'] = 'page/front/register_view';
        $this->load->view('page/front/component/wrapper', $data);
    }

    function login()
    {
        $this->session->sess_destroy();
        $data['title'] = 'Login Anggota';
        $data['content'] = 'page/front/login_anggota_view';
        $this->load->view('page/front/component/wrapper', $data);
    }

    function tentang_kami()
    {
        $data['title'] = 'Tentang Kami';
        $data['content'] = 'page/front/tentang_kami_view';
        $this->load->view('page/front/component/wrapper', $data);
    }

    function event()
    {
        $data['title'] = 'Event';
        $all_event = $this->event_model->get_all_event();
        $all_event = json_decode(json_encode($all_event), true);
        foreach ($all_event as $element) {
            $data['all_event'][$element['nama_kategori']][] = $element;
        }
        $data['content'] = 'page/front/event_view';
        $this->load->view('page/front/component/wrapper', $data);
    }

    function training()
    {
        if (isset($_SESSION['username_anggota'])) {
            $data['title'] = 'Training';
            $data['all_training'] = $this->training_model->get_all_training();
            $data['content'] = 'page/front/training_view';
            $this->load->view('page/front/component/wrapper', $data);
        } else {
            $data['title'] = 'Login Anggota';
            $data['content'] = 'page/front/login_anggota_view';
            $this->load->view('page/front/component/wrapper', $data);
        }
    }

    function forum()
    {
        if (isset($_SESSION['username_anggota'])) {
            $data['title'] = 'Forum';
            $data['all_forum'] = $this->forum_model->get_all_forum();
            $data['content'] = 'page/front/list_forum_and_create';

            $this->load->view('page/front/component/wrapper', $data);
        } else {
            $data['title'] = 'Login Anggota';
            $data['content'] = 'page/front/login_anggota_view';
            $this->load->view('page/front/component/wrapper', $data);
        }
    }

    function project()
    {
        $data['title'] = 'Project';
        $data['all_project'] = $this->project_model->get_all_project();
        $data['content'] = 'page/front/project_view';
        $this->load->view('page/front/component/wrapper', $data);
    }

    function unggah_karya()
    {
        if (isset($_SESSION['username_anggota'])) {
            $data['title'] = 'Unggah Karya';
            $data['all_karya'] = $this->unggah_karya_model->get_karya_by_id_anggota($_SESSION['id_anggota']);
            $data['content'] = 'page/front/unggah_karya_upload_list_view';

            $this->load->view('page/front/component/wrapper', $data);
        } else {
            $data['title'] = 'Login Anggota';
            $data['content'] = 'page/front/login_anggota_view';
            $this->load->view('page/front/component/wrapper', $data);
        }
        //$data['title'] = 'Unggah Karya';
        //$data['all_karya'] = $this->unggah_karya_model->get_all_unggah_karya();
        //$data['content'] = 'page/front/unggah_karya_view';
        //$this->load->view('page/front/component/wrapper', $data);
    }

    function aksi_login()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $hasil = $this->db->where('username', $user)->where('password', md5($pass))->get('anggota');
        $jml_baris = $hasil->num_rows();

        if ($jml_baris > 0) {
            $this->db->where('username', $user);
            $baris = $this->db->get('anggota')->row();
            $data_session = array(
                'id_anggota' => $baris->id_anggota,
                'nama_lengkap' => $baris->nama_lengkap,
                'email' => $baris->email,
                'no_hp' => $baris->no_hp,
                'domisili' => $baris->domisili,
                'username_anggota' => $baris->username,
                'password' => $baris->password
            );

            $this->session->set_userdata($data_session);
            $this->session->set_flashdata('pesan', 'Anda berhasil login');
            redirect('front', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'Username / Password Salah !!!');
            redirect('front/login', 'refresh');
        }
    }

    function aksi_register()
    {
        $config['upload_path']          = './foto_anggota/';
        $config['allowed_types']        = 'gif|jpg|png';
        
        //cek confirm password
        if ($this->input->post('password')<>$this->input->post('confirm_password')) {
            $this->session->set_flashdata('pesan', 'PENDAFTARAN GAGAL || Email Sudah Terdaftar');
            redirect('front/register', 'refresh');
        }
        
        //cek email
        $email = $this->db->where('email', $this->input->post('email'))->get('anggota')->row();


        //cek no hp
        $phone = $this->db->where('no_hp', $this->input->post('phone'))->get('anggota')->row();

        
        if (empty($email->email)) {
        }else{
            $this->session->set_flashdata('pesan', 'PENDAFTARAN GAGAL || Email Sudah Terdaftar');
            redirect('front/register', 'refresh');
        }
        if (empty($phone->no_hp)) {

        }else{
            $this->session->set_flashdata('pesan', 'No Handphone Sudah Terdaftar');
            redirect('front/register', 'refresh');
        }
        
        $this->load->library('upload', $config);
        $data_arr = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email' => $this->input->post('email'),
            'no_hp' => $this->input->post('phone'),
            'domisili' => $this->input->post('domisili'),
            'username' => $this->input->post('username'),
            'password' =>  md5($this->input->post('password'))
        );
        
        if ($this->upload->do_upload('file')) {
            $data_arr['gambar'] = $this->upload->data('file_name');
            $this->db->insert('anggota', $data_arr);
            $this->session->set_userdata($data_arr);
            $this->session->set_flashdata('pesan', 'pendaftaran berhasil');
            redirect('front', 'refresh');
        }
    }

    function detail_event($id)
    {
        $hasil = $this->event_model->get_event_by_id($id);
        $data['detail_event'] = $hasil;
        $data['rating'] = $this->event_model->get_rating_by_id($id);
        $data['total_rating'] = count($data['rating']);

        if ($data['total_rating'] > 0) {
            $sum_rating = 0;
            foreach ($data['rating'] as $key => $value) {
                $sum_rating += $value->rating;
            }

            $data['avg_rating'] = $sum_rating / $data['total_rating'];
        } else {
            $data['avg_rating'] = 0;
        }
        $data['detail_forum'] = $this->forum_model->get_forum_by_id($hasil->id_forum);
        $data['jumlah_comment'] = $this->db->where(['id_forum' => $hasil->id_forum, 'id_parent_komentar_forum' => 0])->get('komentar_forum')->num_rows();
        $data['list_comment'] = $this->db->where(['id_forum' => $hasil->id_forum, 'id_parent_komentar_forum' => 0])->order_by('waktu','desc')->get('komentar_forum')->result();
        $data['title'] = 'Detail Event';
        $data['content'] = 'page/front/detail_event_view';
        $this->load->view('page/front/component/wrapper', $data);
    }

    function detail_training($id)
    {
        $hasil = $this->training_model->get_training_by_id($id);
        $data['detail_training'] = $hasil;
        $data['rating'] = $this->training_model->get_rating_by_id($id);
        $data['total_rating'] = count($data['rating']);

        if ($data['total_rating'] > 0) {
            $sum_rating = 0;
            foreach ($data['rating'] as $key => $value) {
                $sum_rating += $value->rating;
            }

            $data['avg_rating'] = $sum_rating / $data['total_rating'];
        } else {
            $data['avg_rating'] = 0;
        }
        $data['title'] = 'Detail Training';
        $data['content'] = 'page/front/detail_training_view';
        $this->load->view('page/front/component/wrapper', $data);
    }

    function detail_forum($id)
    {
        $hasil = $this->forum_model->get_forum_by_id($id);
        $data['detail_forum'] = $hasil;

        $data['rating'] = $this->forum_model->get_rating_by_id($id);
        $data['total_rating'] = count($data['rating']);
        if ($data['total_rating'] > 0) {
            $sum_rating = 0;
            foreach ($data['rating'] as $key => $value) {
                $sum_rating += $value->rating;
            }

            $data['avg_rating'] = $sum_rating / $data['total_rating'];
        } else {
            $data['avg_rating'] = 0;
        }
        $data['jumlah_comment'] = $this->db->where(['id_forum' => $hasil->id_forum, 'id_parent_komentar_forum' => 0])->get('komentar_forum')->num_rows();
        $data['list_comment'] = $this->db->where('id_forum', $hasil->id_forum)->get('komentar_forum')->result();
        $data['title'] = 'Detail Forum';
        $data['content'] = 'page/front/detail_forum_view';
        $this->load->view('page/front/component/wrapper', $data);
    }

    function detail_project($id)
    {
        $hasil = $this->project_model->get_project_by_id($id);
        $data['detail_project'] = $hasil;
        $data['rating'] = $this->project_model->get_rating_by_id($id);
        $data['total_rating'] = count($data['rating']);

        if ($data['total_rating'] > 0) {
            $sum_rating = 0;
            foreach ($data['rating'] as $key => $value) {
                $sum_rating += $value->rating;
            }

            $data['avg_rating'] = $sum_rating / $data['total_rating'];
        } else {
            $data['avg_rating'] = 0;
        }
        $data['jumlah_comment'] = $this->db->where(['id_project' => $hasil->id_project, 'id_parent_komentar_project' => 0])->get('komentar_project')->num_rows();
        $data['list_comment'] = $this->db->where(['id_project' => $hasil->id_project, 'id_parent_komentar_project' => 0])->get('komentar_project')->result();
        $data['title'] = 'Detail Project';
        $data['content'] = 'page/front/detail_project_view';
        $this->load->view('page/front/component/wrapper', $data);
    }

    function detail_unggah_karya($id)
    {
        $hasil = $this->unggah_karya_model->get_unggah_karya_by_id($id);
        $data['detail_unggah_karya'] = $hasil;
        $data['title'] = 'Detail Unggah Karya';
        $data['content'] = 'page/front/detail_unggah_karya_view';
        $this->load->view('page/front/component/wrapper', $data);
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('front', 'refresh');
    }

    function buat_komentar_forum()
    {
        if (isset($_SESSION['nama_lengkap'])) {
            date_default_timezone_set('Asia/Jakarta');
            $data_komentar = array(
                'nama' => $this->session->userdata('nama_lengkap'),
                'id_forum' => $this->input->post('id_forum'),
                'isi_komentar' => $this->input->post('isi_komentar'),
                'waktu' => date('d/m/Y H:i:s')
            );

            $this->db->insert('komentar_forum', $data_komentar);
            redirect('front/detail_forum/' . $data_komentar['id_forum'], 'refresh');
        } else {
            redirect('front/login', 'refresh');
        }
    }

    function buat_komentar_event($id)
    {
        if (isset($_SESSION['nama_lengkap'])) {
            date_default_timezone_set('Asia/Jakarta');
            $data_komentar = array(
                'nama' => $this->session->userdata('nama_lengkap'),
                'id_forum' => $this->input->post('id_forum'),
                'isi_komentar' => $this->input->post('isi_komentar'),
                'waktu' => date('d/m/Y H:i:s')
            );

            $this->db->insert('komentar_forum', $data_komentar);
            redirect('front/detail_event/' . $id, 'refresh');
        } else {
            redirect('front/login', 'refresh');
        }
    }

    function buat_komentar_project()
    {
        if (isset($_SESSION['nama_lengkap'])) {
            date_default_timezone_set('Asia/Jakarta');
            $data_komentar = array(
                'nama' => $this->session->userdata('nama_lengkap'),
                'id_project' => $this->input->post('id_project'),
                'isi_komentar' => $this->input->post('isi_komentar'),
                'waktu' => date('d/m/Y -- H:i:s')
            );

            $this->db->insert('komentar_project', $data_komentar);
            redirect('front/detail_project/' . $data_komentar['id_project'], 'refresh');
        } else {
            redirect('front/login', 'refresh');
        }
    }

    function tambah_rating_event()
    {
        if ($this->input->post('rating') != '') {
            $rating = $this->input->post('rating');
            $id_event = $this->input->post('id');
            $id_anggota = $_SESSION['id_anggota'];
            $sql = "insert into rating_event (id_event,id_anggota,rating) 
            value ($id_event,$id_anggota,$rating)
            on duplicate key update rating=$rating";
            $query = $this->db->query($sql);
        }
    }

    function tambah_rating_training()
    {
        if ($this->input->post('rating') != '') {
            $rating = $this->input->post('rating');
            $id_training = $this->input->post('id');
            $id_anggota = $_SESSION['id_anggota'];
            $sql = "insert into rating_training (id_training,id_anggota,rating) 
            value ($id_training,$id_anggota,$rating)
            on duplicate key update rating=$rating";
            $query = $this->db->query($sql);
        }
    }

    function tambah_rating_forum()
    {
        if ($this->input->post('rating') != '') {
            $rating = $this->input->post('rating');
            $id_forum = $this->input->post('id');
            $id_anggota = $_SESSION['id_anggota'];
            $sql = "insert into rating_forum (id_forum,id_anggota,rating) 
            value ($id_forum,$id_anggota,$rating)
            on duplicate key update rating=$rating";
            $query = $this->db->query($sql);
        }
    }

    function tambah_rating_project()
    {
        if ($this->input->post('rating') != '') {
            $rating = $this->input->post('rating');
            $id_project = $this->input->post('id');
            $id_anggota = $_SESSION['id_anggota'];
            $sql = "insert into rating_project (id_project,id_anggota,rating) 
            value ($id_project,$id_anggota,$rating)
            on duplicate key update rating=$rating";
            $query = $this->db->query($sql);
        }
    }

    function aksi_unggah_karya()
    {
        $data_arr_karya = array(
            'id_anggota' => $_SESSION['id_anggota'],
            'nama_channel' =>  $this->input->post('nama_channel'),
            'tanggal' => $this->input->post('tanggal'),
            'isi_karya' => $this->input->post('isi_karya'),
            'video' => $this->input->post('video')
        );

        $this->db->insert('unggah_karya', $data_arr_karya);
        $this->session->set_flashdata('pesan', 'Karya berhasil dibuat');
        redirect('front/unggah_karya', 'refresh');
    }

    function aksi_buat_forum()
    {
        $config['upload_path']          = './foto_forum/';
        $config['allowed_types']        = 'gif|jpg|png';


        $this->load->library('upload', $config);
        $data_arr_forum = array(
            'nama' => $_SESSION['nama_lengkap'],
            'judul_forum' => $this->input->post('judul_forum'),
            'tanggal' => $this->input->post('tanggal'),
            'isi_forum' => $this->input->post('isi_forum')
        );

        if ($this->upload->do_upload('file')) {
            $data_arr_forum['gambar'] = $this->upload->data('file_name');
            $this->db->insert('forum', $data_arr_forum);
            $this->session->set_flashdata('pesan', 'Forum berhasil dibuat');
            redirect('front/forum', 'refresh');
        }
    }

    function member_area($user)
    {
        $data['title'] = 'Page ' . $user;
        $data['content'] = 'page/front/member_area_view';
        $data['detail_info'] = $this->db->where('username', $user)->get('anggota')->row();
        $data['all_karya'] = $this->db->where('id_anggota', $data['detail_info']->id_anggota)->get('unggah_karya')->result();
        $this->load->view('page/front/component/wrapper', $data);
    }

    function form_edit_karya($id)
    {
        $data['title'] = 'Edit Karya';
        $data['content'] = 'page/front/form_edit_karya_view';
        $data['record'] = $this->db->where('id_karya', $id)->get('unggah_karya')->row();
        $this->load->view('page/front/component/wrapper', $data);
    }

    function simpan_unggah_karya_front()
    {
        $data_karya = array(
            'id_anggota' => $_SESSION['id_anggota'],
            'nama_channel' => $this->input->post('nama_channel'),
            'tanggal' => $this->input->post('tanggal'),
            'isi_karya' => $this->input->post('isi_karya'),
            'video' => $this->input->post('video')
        );

        $this->db->where('id_karya', $this->input->post('id_karya'));
        $this->db->update('unggah_karya', $data_karya);

        $this->session->set_flashdata('pesan', 'Data karya berhasil di update');
        redirect('front/member_area/' . $_SESSION['nama_lengkap'], 'refresh');
    }

    function hapus_karya($id)
    {
        $this->db->where('id_karya', $id);
        $this->db->delete('unggah_karya');
        $this->session->set_flashdata('pesan', 'Data karya berhasil di hapus');
        redirect('front/member_area/' . $_SESSION['nama_lengkap'], 'refresh');
    }
}
