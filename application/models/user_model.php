<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

    function get_all_user_json(){

    }

    function get_all_user(){

    }

    function get_user_by_id($id){
            $hasil = $this->db->where('id_admin', $id)->get('admin')->row();
            return $hasil;
    }

    function get_user_by_pass($pass){
        $hasil = $this->db->where('password', $pass)->get('admin')->row();
        return $hasil;
    }

    function get_user_by_user_and_pass($user, $pass){
        $this->db->where('username', $user);
        $hasil = $this->db->where('password', $pass)->get('admin')->row();

        return $hasil;
    }
}