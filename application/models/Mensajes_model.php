<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mensajes_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function ver_todos(){
        
        $CI =& get_instance();
        $contacto =$CI->db->get('contacto')->result_array();

        return $contacto;
    }
    

}

/* End of file ModelName.php */


?>