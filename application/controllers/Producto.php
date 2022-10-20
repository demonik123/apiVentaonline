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

    public function guardar_post()
    {
        # code...
        $dato = $this->Model_producto->guardar_producto();
        $this->response($dato);

    }

    public function actualizar_put()
    {
        # code...
        $dato = $this->Model_usuario->update_usuario();
        $this->response($dato);
    }
}



?>