<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model{

    //dapatkan semua menu format json
    public function get_all_menu_json(){
        $this->datatables->select('id_menu, label, link, icon, grup, parent, sort');
        $this->datatables->from('tbl_menu');
        $this->datatables->add_column('aksi', '
        <div class="btn-group btn-group-xs">
        <button class="btn btn-primary edit-menu" id="$1"><i class="icon icon-pencil"></i></button>
        <button class="btn btn-danger hapus-menu" id="$1"><i class="icon icon-trash"></i></button>
        </div>
        ', 'id_menu');
        return $this->datatables->generate();
    }

    function get_all_parent_menu(){
        $this->db->where('parent', '0');
        $hasil = $this->db->get('tbl_menu')->result();
        return $hasil;
    }

    public function insert_menu($data){
        if($this->db->insert('tbl_menu', $data)){
            return true;
        }else{
            return false;
        }
    }

    public function update_menu($id, $data){
        $this->db->where('id_menu', $id);
        if ($this->db->update('tbl_menu', $data)) {
            return true;
        }else {
            return false;
        }
    }

    public function delete_menu($id){
        $this->db->where('id_menu', $id);
        if ($this->db->delete('tbl_menu')) {
            return true;
        }else {
            return false;
        }
    }

    function get_by_id($id){
        $this->db->where('id_menu', $id);
        $hasil = $this->db->get('tbl_menu');
        return $hasil;
    }
}