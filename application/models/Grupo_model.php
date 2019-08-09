<?php



class Grupo_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    static function guardar($grupo){ 
        $CI =& get_instance();
        
        if(isset($grupo['id_grupo']) && $grupo['id_grupo'] > 0){
            $CI->db->where('id_grupo',$grupo['id_grupo']);
            $CI->db->update('grupos',$grupo);
            
        }else{
            $CI->db->insert('grupos',$grupo);
            
        }
    }

    static function listado_grupos(){
        $CI =& get_instance();

        $rs= $CI->db->get('grupos')->result();
        return $rs;
    }

    static function grupo_x_id($id_grupo){
        $CI =& get_instance();
        $CI->db->where('id_grupo',$id_grupo);
        $rs= $CI->db->get('grupos')->result_array();
        return $rs;
    }


    static function borrar_grupo($id){

        $CI =& get_instance();
        $sql = 'delete from grupos where id_grupo=?';
        $CI->db->query($sql, [$id]);

    } 







}