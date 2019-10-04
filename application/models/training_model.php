<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Training_model extends CI_Model{

    public function get_all_training(){
        $this->db->select('training.id_training, training.id_admin, admin.nama_admin, training.nama_training, DATE_FORMAT(training.tanggal, "%d %M %Y") as tanggal, training.isi_training, training.gambar, training.rating');
        $this->db->from('training');
        $this->db->join('admin', 'training.id_admin = admin.id_admin');
        $this->db->order_by('id_training', 'DESC');
        $hasil = $this->db->get()->result();
        return $hasil;
    }

    function get_training_by_id($id){
        $this->db->select('training.id_training, training.id_admin, admin.nama_admin, training.nama_training, DATE_FORMAT(training.tanggal, "%d %M %Y") as tanggal, training.isi_training, training.gambar, training.rating');
        $this->db->from('training');
        $this->db->join('admin', 'training.id_admin = admin.id_admin');
        $this->db->where('id_training', $id);
        $hasil = $this->db->get()->row();
        return $hasil;
    }

    function get_rating_by_id($id)
    {
        $this->db->from('rating_training');
        $this->db->where('id_training', $id);
        $hasil = $this->db->get()->result();
        return $hasil;
    }

    function insert_training($data){
        if ($this->db->insert('training', $data)) {
            return true;
        }else {
            return false;
        }
     }
 
     function update_training($id, $data){
         $this->db->where('id_training', $id);
         if ($this->db->update('training', $data)) {
             return true;
         }else {
             return false;
         }
     }
     
     function delete_training($id){
         $this->db->where('id_training', $id);
         if ($this->db->delete('training')) {
             return true;
         }else {
             return false;
         }
     }
}