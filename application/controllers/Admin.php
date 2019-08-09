<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $this->load->model('admin_model');
        $this->load->view('loginAdmin');
    }

    public function mensajes(){
        $this->load->model('mensajes_model');

        $this->load->view('mensajes');
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

    public function agregar_evento(){
        $this->load->model('eventos_model');
        
        $this->load->view('agregar_evento');
        $this->load->view('admin');
        
    }

    public function add_grupo()
    {
        $this->load->view('add_grupo');
    }
    
    public function editar_grupo($id=0)
    {
        $this->load->view('editar_grupo', ['id_grupo' =>$id]);
    }

    public function borrar_grupo($id=0)
    {
        Grupo_model::borrar_grupo($id);
        redirect('grupo/index');
    }

    public function ver_grupos()
    {
        $this->load->view('show_grupo');
        
    }

    public function verEventos()
    {
        $this->load->model('eventos_model');
        $data = array(
            'eventos' => $this->eventos_model->getEventos()
        );
        $this->load->view('eventos', $data);
    }

    public function verEvento($id){
        $this->load->model('eventos_model');
        
        $data= array(
            'evento' => $this->eventos_model->getEvento($id)
        );

        $this->load->view('ver_evento', $data);
        $this->load->view('plantilla/comentarios');

    }

    public function editar_evento()
    {
        $this->load->model('eventos_model');
        $this->load->view('eventos');

        // $this->load->view('editar_evento',['id_evento',$id_evento]);
        // $this->load->view('plantilla/comentarios');
    }

}

/* End of file Controllername.php */
