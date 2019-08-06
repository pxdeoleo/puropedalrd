<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function ultNoticias(){
        $CI =& get_instance();

        $noticia = $CI->db
        ->limit(3)
        ->get('noticias')
        ->result_array();
        
        return $noticia;
    }

}

/* End of file Noticias_model.php */




?>