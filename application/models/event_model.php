<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model{

    function get_all_event(){
        $this->db->select('event.id_event, event.id_admin, admin.nama_admin, event.nama_event,DATE_FORMAT(event.tanggal, "%d %M %Y") as tanggal, event.isi_event, event.gambar');
        $this->db->from('event');
        $this->db->join('admin', 'event.id_admin = admin.id_admin');
        $this->db->order_by('id_event', 'DESC');
        $hasil = $this->db->get()->result();
        return $hasil;
    }

    function get_event_by_id($id){
        $this->db->select('event.id_event, event.id_admin, admin.nama_admin, event.nama_event,DATE_FORMAT(event.tanggal, "%d %M %Y") as tanggal, event.isi_event, event.gambar, event.rating');
        $this->db->from('event');
        $this->db->join('admin', 'event.id_admin = admin.id_admin');
        $this->db->where('id_event', $id);
        $hasil = $this->db->get()->row();
        return $hasil;
    }

    function get_rating_by_id($id)
    {
        $this->db->from('rating_event');
        $this->db->where('id_event', $id);
        $hasil = $this->db->get()->result();
        return $hasil;
    }

    function insert_event($data){
       if ($this->db->insert('event', $data)) {
           return true;
       }else {
           return false;
       }
    }

    function update_event($id, $data){
        $this->db->where('id_event', $id);
        if ($this->db->update('event', $data)) {
            return true;
        }else {
            return false;
        }
    }
    
    function delete_event($id){
        $this->db->where('id_event', $id);
        if ($this->db->delete('event')) {
            return true;
        }else {
            return false;
        }
    }
   
}
