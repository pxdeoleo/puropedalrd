<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index()
    {
        $this->load->model('noticias_model');
        $this->load->model('slider_model');
        $this->load->model('eventos_model');

        $this->load->view('inicio');
        
    }

}

/* End of file Controllername.php */
