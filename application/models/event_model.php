<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model{

    function get_all_event(){
        $this->db->select('event.id_event, event.id_admin, admin.nama_admin, event.nama_event,event.tanggal as tanggal, event.isi_event, event.gambar,kategori.nama_kategori,event.id_kategori,(select count(*) from komentar_event kf where kf.id_event = event.id_event) as komen');
        $this->db->from('event');
        $this->db->join('admin', 'event.id_admin = admin.id_admin');
        $this->db->join('kategori', 'event.id_kategori = kategori.id_kategori','left');
        //$this->db->order_by('id_event', 'DESC');
        $this->db->order_by('id_kategori');
        $hasil = $this->db->get()->result();
        //echo $this->db->last_query();exit;
        return $hasil;
    }

    function get_event_by_id($id){
        $this->db->select('event.id_event,event.id_forum, event.id_admin, admin.nama_admin, event.nama_event,event.tanggal, event.isi_event, event.gambar, event.rating,kategori.nama_kategori,event.id_kategori');
        $this->db->from('event');
        $this->db->join('admin', 'event.id_admin = admin.id_admin');
        $this->db->join('kategori', 'event.id_kategori = kategori.id_kategori','left');
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
        $this->db->query('SET foreign_key_checks = 0');
        $this->db->where('id_event', $id);
        if ($this->db->delete('event')) {
            return true;
        }else {
            return false;
        }
    }

    function delete_komentar($id){
        $this->db->query('SET foreign_key_checks = 0');
        $this->db->where('id_komentar_event', $id);
        if ($this->db->delete('komentar_event')) {
            return true;
        }else {
            return false;
        }
    }
   
}
