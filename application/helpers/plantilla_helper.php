<?php

class plantilla{

    public static $intancia;

    public static function aplicar(){

        self::$intancia = new plantilla();
    }

    public function __construct()
    {
        $CI =& get_instance();
        $CI->load->view('plantilla/encabezado');       
    }
    
}
?>