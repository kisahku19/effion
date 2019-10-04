<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model{

    public function get_all_project(){
        $this->db->select('project.id_project, project.id_admin, admin.nama_admin, project.nama_channel, DATE_FORMAT(project.tanggal, "%d %M %Y") as tanggal, project.isi_project, project.video, project.rating');
        $this->db->from('project');
        $this->db->join('admin', 'project.id_admin = admin.id_admin');
        $this->db->order_by('id_project', 'DESC');
        $hasil = $this->db->get()->result();
        return $hasil;
    }

    function get_project_by_id($id){
        $this->db->select('project.id_project, project.id_admin, admin.nama_admin, project.nama_channel, DATE_FORMAT(project.tanggal, "%d %M %Y") as tanggal, project.isi_project, project.video, project.rating');
        $this->db->from('project');
        $this->db->join('admin', 'project.id_admin = admin.id_admin');
        $this->db->where('id_project', $id);
        $hasil = $this->db->get()->row();
        return $hasil;
    }

    function get_rating_by_id($id)
    {
        $this->db->from('rating_project');
        $this->db->where('id_project', $id);
        $hasil = $this->db->get()->result();
        return $hasil;
    }

    function insert_project($data){
        if ($this->db->insert('project', $data)) {
            return true;
        }else {
            return false;
        }
     }
 
     function update_project($id, $data){
         $this->db->where('id_project', $id);
         if ($this->db->update('project', $data)) {
             return true;
         }else {
             return false;
         }
     }
     
     function delete_project($id){
         $this->db->where('id_project', $id);
         if ($this->db->delete('project')) {
             return true;
         }else {
             return false;
         }
     }
}