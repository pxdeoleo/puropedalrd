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

}

/* End of file Controllername.php */
