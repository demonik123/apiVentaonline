<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Producto extends REST_Controller
{
    function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('Model_producto');
    }
    
    public function list_get()
    {
        # code...
        $dato= $this->Model_producto->listar_producto();
        $this->response($dato);
    } 
    public function listid_get()
    {
        $dato= $this->Model_producto->buscar_producto();
        $this->response($dato);
    } 

    public function guardar_post()
    {
        $this->cargarArchivo_post();
    }

    public function actualizar_put()
    {
        $dato = $this->Model_producto->update_producto();
        $this->response($dato);
    }

    public function eliminar_get(){
        $dato = $this->Model_producto->eliminar_producto();
        $this->response($dato);
    }

    public function formulario_get(){
        $this->load->view('formulario');
    }

    function cargarArchivo_post() {
        $mi_archivo = 'txtimg';
        $config['upload_path'] = "uploads/";
        $config['file_name'] = "foto";
        $config['allowed_types'] = "jpg|png";
        $config['max_size'] = "5000";//kb
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";
        $dato = $this->Model_producto->guardar_producto();
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            $error = array('error' => $this->upload->display_errors());
            $this->response($error);
            //$this->load->view('upload_form', $error);
        }
        $data = array('upload_data' => $this->upload->data());
        $this->response($dato);
        
    }

}
?>