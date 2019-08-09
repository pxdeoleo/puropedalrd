<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncios extends CI_Controller {

    public function index()
    {
        $this->load->model('anuncios_model');
        $this->load->view('anuncios');
    }

    public function descripcion()
    {
        $this->load->model('anuncios_model');
        $this->load->view('descripcion');
    }

    public function ver($id){
        $this->load->model('anuncios_model');
        
        $data= array(
            'anuncio' => $this->anuncios_model->anuncios_x_id($id)
        );

        $this->load->view('descripcion', $data);
        $this->load->view('plantilla/comentarios');
    }

}

/* End of file Controllername.php */
