<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

    function cek_login($username, $password){
        $hasil = $this->db->where('username', $username)->where('password', md5($password))->get('admin');

        if ($hasil->num_rows() > 0) {
            return true;
        }else {
            return false;
        }
    }
}