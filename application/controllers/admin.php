<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends HSM_Conttroller{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        redirect('login');
    }
    
}