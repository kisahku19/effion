<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HSM_Conttroller extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function cek_login(){
        if (!empty($this->session->userdata('username'))) {
            return true;
        }else {
            redirect('login', 'refresh');
        }
    }

    
}