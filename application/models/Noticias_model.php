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

    public function getImagen($id){
        $ruta="../imagenes/";//ruta carpeta donde queremos copiar las imágenes
        $uploadfile_temporal=$_FILES['archivo']['tmp_name'];
        $uploadfile_nombre=$ruta.$_FILES['archivo']['name'];

        if (is_uploaded_file($uploadfile_temporal))
        {
            move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
            return true;
        }
        else
        {
        
        return false;
        }  
    }
    

}

/* End of file Noticias_model.php */




?>