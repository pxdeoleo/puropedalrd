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

    static function guardar($usuario){ 
        $CI =& get_instance();
        
        if(isset($usuario['id_usuario']) && $usuario['id_usuario'] > 0){
            $CI->db->where('id_usuario',$usuario['id_usuario']);
            $CI->db->update('usuarios',$usuario);
            
        }else{ 
            $CI->db->insert('usuarios',$usuario);
            
        }
    }

    static function guardar_contacto($contacto){ 
        $CI =& get_instance();

        $fecha = ('Y-m-d'); //fecha
        $contacto['fecha'] = $fecha;

        if(isset($contacto['id_contacto']) && $contacto['id_contacto'] > 0){
            $CI->db->where('id_contacto',$contacto['id_contacto']);
            $CI->db->update('contacto',$contacto);
            
        }else{ 
            $CI->db->insert('contacto',$contacto);
            
        }
    }

    static function inicio_sesion($usr, $psw){
        $CI =& get_instance();
        $rs = $CI->db
        ->where(array(
            'user'=>$usr,
            'pass'=>$psw))
        ->get('usuarios')
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