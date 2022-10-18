<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Usuario extends REST_Controller
{
    function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('Model_categoria');
    }
    
    public function list_get()
    {
        # code...
        $dato= $this->Model_Categoria->listar_categoria();
        $this->response($dato);
    } 

    public function guardar_post()
    {
        # code...
        $dato = $this->Model_Categoria->guardar_categoria();
        $this->response($dato);

    }

    public function actualizar_put()
    {
        # code...
      $dato = $this->Model_Categoria->update_categoria();
      $this->response($dato);
    }
    
    public function eliminar_delete()
    {
        # code...
      $dato = $this->Model_Categoria->delete_categoria();
      $this->response($dato);
    }
}



?>