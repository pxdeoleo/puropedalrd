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
        $this->load->view('admin');
    }

    public function lista_noticias(){
        $this->load->model('noticias_model');
        $data = array(
            'admin'=>true
        );
        $this->load->view('noticias', $data);
        $this->load->view('admin');
    }

    public function sliders(){
        $this->load->model('slider_model');

        $this->load->view('agregar_sliders');
        $this->load->view('admin');

    }

    public function editar_noticia($id){
        $this->load->model('noticias_model');
        $data = array(
            'id_noticia'=>$id
        );
        $this->load->view('agregar_noticia', $data);
        $this->load->view('admin');
    }

    public function borrar_noticia($id){
        $this->load->model('noticias_model');
        $this->noticias_model->borrar_noticia($id);
        
        redirect(base_url('admin/lista_noticias'));
    }

    public function agregar_galeria(){
        $this->load->model('galeria_model');

        $this->load->view('agregar_galeria');
        $this->load->view('admin');

    }

    public function gestionar_galerias(){
        $this->load->model('galeria_model');
        
        $this->load->view('gestionar_galerias');
        $this->load->view('admin');
    }

    public function borrar_galeria($id){
        $this->load->model('galeria_model');

        redirect();
    }



}

/* End of file Controllername.php */
