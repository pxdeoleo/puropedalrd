<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $this->load->model('admin_model');
        $this->load->view('admin');
    }

}

/* End of file Controllername.php */
