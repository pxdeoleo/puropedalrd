<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos extends CI_Controller {

    public function index()
    {
        $this->load->model('cuenta_model');
        // cedula, correo, nombre, apellido, fecha de nacimiento y grupo ciclístico a que pertenece
        $this->load->view('cuenta', $data);
    }


}

/* End of file Controllername.php */
