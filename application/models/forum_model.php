<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum_model extends CI_Model
{

    function get_all_forum()
    {
        $this->db->select('forum.id_forum, forum.nama,  forum.judul_forum, DATE_FORMAT(forum.tanggal, "%d %M %Y") as tanggal, forum.isi_forum, forum.gambar, forum.rating');
        $this->db->from('forum');
        $this->db->order_by('id_forum', 'DESC');
        $hasil = $this->db->get()->result();
        return $hasil;
    }

    function get_forum_by_id($id)
    {
        $this->db->select('forum.id_forum, forum.nama,  forum.judul_forum, DATE_FORMAT(forum.tanggal, "%d %M %Y") as tanggal, forum.isi_forum, forum.gambar, forum.rating');
        $this->db->from('forum');
        $this->db->where('id_forum', $id);
        $hasil = $this->db->get()->row();
        return $hasil;
    }

    function get_rating_by_id($id)
    {
        $this->db->from('rating_forum');
        $this->db->where('id_forum', $id);
        $hasil = $this->db->get()->result();
        return $hasil;
    }
    function insert_forum($data)
    {
        if ($this->db->insert('forum', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function update_forum($id, $data)
    {
        $this->db->where('id_forum', $id);
        if ($this->db->update('forum', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete_forum($id)
    {
        $this->db->where('id_forum', $id);
        if ($this->db->delete('forum')) {
            return true;
        } else {
            return false;
        }
    }

    function get_forum_by_nama($nama)
    {
        $this->db->where('nama', $nama);
        $hasil = $this->db->get('forum')->result();
        return $hasil;
    }
}
