<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cmenu extends HSM_Conttroller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        $this->cek_login();
    }

    public function index(){
        $data['title'] = 'Management Menu';
        $data['parent_menu'] = $this->menu_model->get_all_parent_menu();
        $data['content'] = 'page/menu/menu_view';
        $data['page_js'] = 'page/menu/menu_js';
        $this->load->view('wrapper', $data);
    }

    public function get_all_menu_ajax(){
        header('Content-type: application/json');
        echo $this->menu_model->get_all_menu_json();
    }

    function simpan_menu($id=null){
        $data_arr = array(
            'label' => $this->input->post('label'),
            'link' => $this->input->post('link'),
            'icon' => $this->input->post('icon'),
            'grup' => $this->input->post('group'),
            'parent' => $this->input->post('parent'),
            'sort' => $this->input->post('sort')
        );
        if (!empty($id)) {
            if ($this->menu_model->update_menu($id, $data_arr)) {
                $data['pesan'] = 'Menu Berhasil Di Update';
            }else {
                $data['pesan'] = 'Data gagal disimpan';
            }
        }else {
            if ($this->menu_model->insert_menu($data_arr)) {
               $data['pesan'] = 'Menu Berhasil Di Simpan';
            }else {
                $data['pesan'] = 'Menu Gagal Disimpan';
            }
        }

        echo json_encode($data);
    }

    function get_menu_by_id_ajax($id){
        $hasil = $this->menu_model->get_by_id($id)->row();
        $data_arr = array(
            'id_menu' => $hasil->id_menu,
            'label' => $hasil->label,
            'link' => $hasil->link,
            'icon' => $hasil->icon,
            'grup' => $hasil->grup,
            'parent' => $hasil->parent,
            'sort' => $hasil->sort
        );

        echo json_encode($data_arr);
    }

    function hapus_menu($id){
        if ($this->menu_model->delete_menu($id)) {
            $data['pesan'] = 'Menu Berhasil Di Hapus';
        }else {
            $data['pesan'] = 'Menu Gagal dihapus';
        }

        echo json_encode($data);
    }
}