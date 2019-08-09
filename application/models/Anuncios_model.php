<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncios_model extends CI_Model {

public function __construct()
{
    parent::__construct();
}

public function anuncios(){
    $CI =& get_instance();

    $anuncio = $CI->db
    ->get('anuncios')
    ->result_array();
    
    return $anuncio;
}

public function anuncios_x_id($id){
    $CI =& get_instance();

    $anuncio = $CI->db
    ->where('id_anuncio',$id)
    ->get('anuncios')
    ->result_array();
    
    return $anuncio;
}

public function ultAnuncios(){
    $CI =& get_instance();

    $anuncio = $CI->db
    ->limit(3)
    ->order_by('fecha', 'DESC')
    ->get('anuncios')
    ->result_array();
    
    return $anuncio;
}
    
public function guardarAnuncio($anuncio, $foto){
    // if($_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png"){
    date_default_timezone_set ('America/Santo_Domingo');
    $CI =& get_instance();
    $maxid = $CI->db->query('SELECT MAX(id_anuncio) FROM anuncios')->result_array()[0]['MAX(id_anuncio)'];
    $ruta="fotos/anuncios/";//ruta carpeta donde queremos copiar las imágenes
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
    
    $CI =& get_instance();
    var_dump($anuncio);
    $CI->db->insert('anuncios', array(
        'provincia'=>$anuncio['provincia'],
        'telefono'=>$anuncio['telefono'],
        'descripcion'=>$anuncio['descripcion'],
        'titulo'=>$anuncio['titulo'],
        'marca'=>$anuncio['marca'],
        'modelo'=>$anuncio['modelo'],
        'accion'=>$anuncio['accion'],
        'precio'=>$anuncio['precio'],
        'fecha'=>date('Y-m-d'),
        'foto'=>$uploadfile_nombre
    ));
    
}

}

/* End of file Anuncios_model.php */

?>