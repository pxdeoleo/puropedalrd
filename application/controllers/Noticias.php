<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {

    public function index()
    {
        $this->load->model('noticias_model');
        $this->load->view('noticias');
    }

    public function articulo($id_noticia)
    {
        $this->load->model('noticias_model');
        $this->load->view('articulo',['id_noticia',$id_noticia]);
        $this->load->view('plantilla/comentarios');

    }

}

/* End of file Controllername.php */

?>