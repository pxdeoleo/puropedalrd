<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    static function inicio_sesion($usr, $psw){
        $CI =& get_instance();
        $rs = $CI->db
        ->where(array(
            'user'=>$usr,
            'pass'=>$psw))
        ->get('administradores')
        ->result_array();
        var_dump($rs);
        if(count($rs)>0){
            return true;
        } else {
            return false;
        }
    }

}

/* End of file Noticias_model.php */




?>