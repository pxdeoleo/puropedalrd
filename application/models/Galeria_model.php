<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Galeria_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    public function fotos_visitas(){
        $CI =& get_instance();

        $populares = $CI->db
        ->limit(3)
        ->order_by('visitas', 'DESC')
        ->get('fotos_galerias')
        ->result_array();
        
        // var_dump($populares);
        
        $fotos = array();
        for ($i=0; $i < count($populares); $i++) { 
            $galeria = $CI->db
            ->query('SELECT nombre, descripcion FROM galerias WHERE id_galeria = '.$populares[$i]['id_galeria'])
            ->result_array();

            $fotos[$i]['id_galeria']=$populares[$i]['id_galeria'];
            $fotos[$i]['foto']=$populares[$i]['foto'];
            $fotos[$i]['nombre']=$galeria[0]['nombre'];
            $fotos[$i]['descripcion']=$galeria[0]['descripcion'];
        }
        return $fotos;
    }

    public function getGalerias(){
        $CI =& get_instance();

        $galerias = $CI->db
        ->order_by('id_galeria', 'DESC')
        ->get('galerias')
        ->result_array();
        
        $galeria = array();
        for ($i=0; $i < count($galerias); $i++) { 
            # code...
            $foto = $CI->db
            ->limit(1)
            ->query('SELECT foto FROM fotos_galerias WHERE id_galeria = '.$galerias[$i]['id_galeria'])
            ->result_array();

            $galeria[$i]['foto']=$foto[0]['foto'];
            $galeria[$i]['id_galeria']=$galerias[$i]['id_galeria'];
            $galeria[$i]['nombre']=$galerias[$i]['nombre'];
            $galeria[$i]['descripcion']=$galerias[$i]['descripcion'];
        }

        return $galeria;
    }

    public function getFotos($id){
        
        $CI =& get_instance();

        $fotos = $CI->db
        ->query('SELECT foto FROM fotos_galerias WHERE id_galeria = '.$id)
        ->result_array();

        $nombre = $CI->db
        ->query('SELECT nombre FROM galerias WHERE id_galeria = '.$id)
        ->result_array();

        $galeria = array(
            'nombre'=>$nombre[0]['nombre'],
            'fotos'=>$fotos
        );

        return $galeria;
    }

}

/* End of file Galeria_model.php */



?>