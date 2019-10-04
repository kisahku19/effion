<?php

class Menu {

    protected $CI;

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->library('session');
    }

    function build_menu($sess_user) {

        $html_menu = '';


        $list_menu = $this->CI->db->query('SELECT * FROM tbl_menu WHERE grup = '."'$sess_user'".'')->result();
        foreach ($list_menu as $menu) {
            if ($menu->parent == 0) {
                $hasil = $this->CI->db->where('parent', $menu->id_menu)->get('tbl_menu')->num_rows();
                if ($hasil > 0) {
                    $html_menu .= '<li>
                    <a href="' . base_url() . $menu->link . '">
                                        <i class="' . $menu->icon . '"></i><span>' . $menu->label . '</span></a>
                                        <ul>';
                    $sub_menu = $this->CI->db->query('SELECT * FROM tbl_menu WHERE parent = '."'$menu->id_menu'".'')->result();

                    foreach ($sub_menu as $single) {
                        $html_menu .= '<li>
                        <a href="' . base_url() . $single->link . '"><i class="'.$single->icon.'"></i>' . $single->label . '</a>
                                               </li>';
                    }
                    $html_menu .= '</ul>
                    </li>';
                } else {
                    $html_menu .= ' <li><a href="' . base_url() . $menu->link . '"><i class="' . $menu->icon . '"></i><span>' . $menu->label . '</span></a></li>';
                }
            }
        }

        return $html_menu;
    }

}
