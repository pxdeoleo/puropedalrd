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
        ->order_by('fecha', 'ASC')
        ->where('fecha >= now()')
        ->get('eventos')
        ->result_array();

        return $eventos;
    }

    public function getEventos(){
        
        $CI =& get_instance();
        $eventos = $CI->
        db->get('eventos')
        ->result();

        return $eventos;
    }

    public function getEvento($id){
        $CI =& get_instance();
        $evento = $CI->db
        ->where('id_evento', $id)
        ->get('eventos')
        ->result_array();

        return $evento;
    }

    public function newEvento($evento, $foto){
        
    }

}

/* End of file Eventos_model.php */
