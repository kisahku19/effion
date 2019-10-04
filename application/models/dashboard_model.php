<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model{


       function jumlah_anggota(){
                $hasil = $this->db->count_all('anggota');
                return $hasil;
       }

       function jumlah_event(){
        $hasil = $this->db->count_all('event');
        return $hasil;
       }

       function jumlah_project(){
        $hasil = $this->db->count_all('project');
        return $hasil;
       }
    
       function jumlah_training(){
        $hasil = $this->db->count_all('training');
        return $hasil;
       }

       function jumlah_karya(){
        $hasil = $this->db->count_all('unggah_karya');
        return $hasil;
       }

       function jumlah_forum(){
        $hasil = $this->db->count_all('forum');
        return $hasil;
       }

       function get_all_forum(){
        $this->db->select('MONTHNAME(tanggal) as tanggal, DATE_FORMAT(tanggal, "%M - %Y") as tanggal_asli, COUNT(id_forum) as total');
        $this->db->group_by('MONTH(tanggal)');
        
        $hasil = $this->db->get('forum')->result();
        return $hasil;
       }
}