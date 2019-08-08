<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cuenta_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function cuenta_x_id($id){
        
        $CI =& get_instance();
    
        $usuario = $CI->db
        ->where('id_usuario', $id)
        ->get('usuarios')
        ->result();
        
        return $usuario;
        
    }

}

/* End of file Noticias_model.php */




?>