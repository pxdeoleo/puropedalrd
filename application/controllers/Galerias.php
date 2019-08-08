<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Galerias extends CI_Controller {

    public function index()
    {
        $this->load->model('galeria_model');
        
        $this->load->view('galerias');
    }

    public function ver($id){
        $this->load->model('galeria_model');
        $this->galeria_model->visita($id);
        $data = array(
            'id_galeria'=>$id
        );
        $this->load->view('ver_galeria', $data);
        
    }

    

}

/* End of file Controllername.php */
