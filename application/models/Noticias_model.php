<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function noticias(){
        $CI =& get_instance();

        $noticia = $CI->db
        ->order_by('fecha', 'DESC')
        ->get('noticias')
        ->result_array();
        
        return $noticia;
    }

    public function noticias_x_id($id){
        $CI =& get_instance();

        $noticia = $CI->db
        ->where('id_noticia',$id)
        ->get('noticias')
        ->result_array();
        
        return $noticia;
    }

    public function ultNoticias(){
        $CI =& get_instance();

        $noticia = $CI->db
        ->limit(3)
        ->order_by('fecha', 'DESC')
        ->get('noticias')
        ->result_array();
        
        return $noticia;
    }

    public function guardarNoticia($noticia, $foto){
        // if($_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png"){
        date_default_timezone_set ('America/Santo_Domingo');
        if(!is_string($foto)){
            $CI =& get_instance();
            $maxid = $CI->db->query('SELECT MAX(id_noticia) FROM noticias')->result_array()[0]['MAX(id_noticia)'];
            
            $ruta="fotos/noticias/";//ruta carpeta donde queremos copiar las imágenes
            $uploadfile_temporal=$foto['tmp_name'];
                
    
            if($foto["type"]=="image/jpeg") 
            {
                $uploadfile_nombre = ($maxid+1).'.jpg';
    
            }
            else if($foto["type"]=="image/pjpeg")
            {
                $uploadfile_nombre = ($maxid+1).'.jpeg';       
           
            }
            else if($foto["type"]=="image/gif")
            {
                $uploadfile_nombre = ($maxid+1).'.gif';       
    
            }
            else if($foto["type"]=="image/png"){
                $uploadfile_nombre = ($maxid+1).'.png';       
    
            }
    
        
            move_uploaded_file($uploadfile_temporal, $ruta.$uploadfile_nombre);
        }else{
            $uploadfile_nombre = $foto;
        }
        
        
        $CI =& get_instance();

        if(isset($noticia['id_noticia'])){
            $CI->db->replace('noticias', array(
                'id_noticia'=>$noticia['id_noticia'],
                'asunto'=>$noticia['asunto'],
                'contenido'=>$noticia['contenido'],
                'foto'=>$uploadfile_nombre,
                'fecha'=>date('Y-m-d')
            ));
        }else{
            $CI->db->replace('noticias', array(
                'asunto'=>$noticia['asunto'],
                'contenido'=>$noticia['contenido'],
                'foto'=>$uploadfile_nombre,
                'fecha'=>date('Y-m-d')
            ));
        }

        
        
    }

    public function borrar_noticia($id_noticia){
        
        $CI =& get_instance();
        $CI->db
        ->delete('noticias', array('id_noticia' => $id_noticia));
    }
    

}

/* End of file Noticias_model.php */




?>