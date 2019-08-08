<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    public function ultEventos(){
        
        $CI =& get_instance();
        $eventos = $CI->db
        ->limit(3)
        ->order_by('fecha', 'DESC')
        ->where('fecha >= now()')
        ->get('eventos')
        ->result_array();

        return $eventos;
    }

}

/* End of file Eventos_model.php */
