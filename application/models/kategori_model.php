<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Kategori_model extends CI_Model{

    function get_all_kategori(){
        $hasil = $this->db->get('kategori')->result();
        return $hasil;
    }

    function get_kategori_by_id($id){
        $hasil = $this->db->where('id_kategori', $id)->get('kategori')->row();
        return $hasil;
    }

    function insert_kategori($data){
        if ($this->db->insert('kategori', $data)) {
            return true;
        }else {
            return false;
        }
    }

    function update_kategori($id, $data){
        $this->db->where('id_kategori', $id);

        if ($this->db->update('kategori', $data)) {
            return true;
        }else {
            return false;
        }
    }

    function delete_kategori($id){
        $this->db->where('id_kategori', $id);
        if ($this->db->delete('kategori')) {
            return true;
        }else {
            return false;
        }
    }
}