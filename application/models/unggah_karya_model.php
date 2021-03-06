<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unggah_karya_model extends CI_Model{

    public function get_all_unggah_karya($filter=false){
        $this->db->select('unggah_karya.id_karya, unggah_karya.id_anggota, anggota.nama_lengkap, unggah_karya.nama_channel, DATE_FORMAT(unggah_karya.tanggal, "%d %M %Y") as tanggal, unggah_karya.isi_karya, unggah_karya.video');
        $this->db->from('unggah_karya');
        $this->db->join('anggota', 'unggah_karya.id_anggota = anggota.id_anggota');
        if ($filter){
            switch ($filter){
                case 1 : $this->db->where('date(tanggal)=date(now())');
                break;
                case 2 : $this->db->where('YEARWEEK(tanggal)=YEARWEEK(now())');
                break;
                case 3 : $this->db->where('MONTH(tanggal)=MONTH(now()) and year(tanggal)=year(now())');
                break;
                case 4 : $this->db->where('YEAR(tanggal)=YEAR(now())');
                break;
            }
        }
        $this->db->order_by('id_karya', 'DESC');
        $hasil = $this->db->get()->result();
        return $hasil;
    }

    function get_unggah_karya_by_id($id){
        $this->db->select('unggah_karya.id_karya, unggah_karya.id_anggota, anggota.nama_lengkap, unggah_karya.nama_channel, DATE_FORMAT(unggah_karya.tanggal, "%d %M %Y") as tanggal, unggah_karya.isi_karya, unggah_karya.video');
        $this->db->from('unggah_karya');
        $this->db->join('anggota', 'unggah_karya.id_anggota = anggota.id_anggota');
        $this->db->where('id_karya', $id);
        $hasil = $this->db->get()->row();
        return $hasil;
    }

    function insert_unggah_karya($data){
        if ($this->db->insert('unggah_karya', $data)) {
            return true;
        }else {
            return false;
        }
     }
 
     function update_unggah_karya($id, $data){
         $this->db->where('id_karya', $id);
         if ($this->db->update('unggah_karya', $data)) {
             return true;
         }else {
             return false;
         }
     }
     
     function delete_unggah_karya($id){
        $this->db->query('SET foreign_key_checks = 0');
         $this->db->where('id_karya', $id);
         if ($this->db->delete('unggah_karya')) {
             return true;
         }else {
             return false;
         }
     }

     function get_karya_by_id_anggota($id){
        // $this->db->select('unggah_karya.id_karya, unggah_karya.id_anggota, anggota.nama_lengkap, unggah_karya.nama_channel, DATE_FORMAT(unggah_karya.tanggal, "%d %M %Y") as tanggal, unggah_karya.isi_karya, unggah_karya.video');
        // $this->db->from('unggah_karya');
        // $this->db->join('anggota', 'unggah_karya.id_anggota = anggota.id_anggota');
        $this->db->where('id_anggota', $id);
        $hasil = $this->db->get('unggah_karya')->result();
        return $hasil;
     }
}
