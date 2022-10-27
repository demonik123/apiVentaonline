<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Persona extends REST_Controller
{
    function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('Model_persona');
    }
    
    public function list_get()
    {
        # code...
        $dato= $this->Model_persona->listar_persona();
        $this->response($dato);
    } 

    public function guardar_post()
    {
        # code...
        $dato = $this->Model_persona->guardar_persona();
        $this->response($dato);

    }

    public function actualizar_put()
    {
        # code...
        $dato = $this->Model_persona->update_usuario();
        $this->response($dato);
    }
}



?>