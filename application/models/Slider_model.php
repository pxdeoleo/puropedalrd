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
        $texto = $slides['texto'];
        $slides = $slides['slides'];

        $cont = 1;
        
        $CI =& get_instance();
        $CI->db->truncate('slider');
        for ($i=0; $i < count($slides['name']); $i++) { 
            $foto=array(
                'tmp_name'=>$slides['tmp_name'][$i],
                'type'=>$slides['type'][$i]
            );
            $foto = guardarFoto($foto, $cont, 'slider');

            $reg = array(
                'id_slide'=>$cont,
                'texto'=>$texto[$i],
                'foto'=>$foto
            );

            $CI =& get_instance();
            $CI->db
            ->replace('slider', $reg);
            $cont++;

        }
    }
    
}

/* End of file Noticias_model.php */

?>