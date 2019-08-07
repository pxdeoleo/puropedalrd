<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $this->load->model('admin_model');
        $this->load->view('admin');
    }

    public function noticias(){
        $this->load->model('noticias_model');
        $this->load->view('agregar_noticia');
    }

}

/* End of file Controllername.php */
