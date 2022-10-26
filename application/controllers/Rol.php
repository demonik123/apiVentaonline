<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Rol extends REST_Controller
{
    function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('Model_rol');
    }
    
    public function list_get()
    {
        # code...
        $dato= $this->Model_rol->listar_rol();
        $this->response($dato);
    } 
    public function buscar_get()
    {
        # code...
        $dato= $this->Model_rol->buscar_rol();
        $this->response($dato);
    } 

    public function guardar_post()
    {
        # code...
        $dato = $this->Model_rol->guardar_rol();
        $this->response($dato);
    }

    public function actualizar_post()
    {
        # code...
      $dato = $this->Model_rol->update_rol();
      $this->response($dato);
    }
   
}
?>