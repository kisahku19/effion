<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Anggota_model extends CI_Model{

    function get_all_anggota(){
        $hasil = $this->db->get('anggota')->result();
        return $hasil;
    }

    function get_anggota_by_id($id){
        $hasil = $this->db->where('id_anggota', $id)->get('anggota')->row();
        return $hasil;
    }

    function insert_anggota($data){
        if ($this->db->insert('anggota', $data)) {
            return true;
        }else {
            return false;
        }
    }

    function update_anggota($id, $data){
        $this->db->where('id_anggota', $id);

        if ($this->db->update('anggota', $data)) {
            return true;
        }else {
            return false;
        }
    }

    function delete_anggota($id){
        $this->db->query('SET foreign_key_checks = 0');
        $this->db->where('id_anggota', $id);
        if ($this->db->delete('anggota')) {
            return true;
        }else {
            return false;
        }
    }
}