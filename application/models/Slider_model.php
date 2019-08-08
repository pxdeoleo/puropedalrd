<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function getSlides(){
        
        $CI =& get_instance();
        $slides = $CI->db
        ->get('slider')->result_array();
        return $slides;
    }

    public function guardarSlides($slides){
        
        $CI =& get_instance();
        $CI->db
        ->insert('slider', $slides);
    }
    

}

/* End of file Noticias_model.php */




?>