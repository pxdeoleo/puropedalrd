<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {

    public function index()
    {
        $this->load->model('eventos_model');
        $data = array(
            'eventos' => $this->eventos_model->getEventos()
        );
        $this->load->view('eventos', $data);
    }

    public function ver($id){
        $this->load->model('eventos_model');
        
        $data= array(
            'evento' => $this->eventos_model->getEvento($id)
        );

        $this->load->view('ver_evento', $data);
        $this->load->view('plantilla/comentarios');

    }
    

}

/* End of file Controllername.php */
