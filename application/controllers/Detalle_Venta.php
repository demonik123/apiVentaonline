<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Detalle_Venta extends REST_Controller
{
    function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('Model_Detalle_Venta');
    }
    
    public function list_get()
    {
        # code...
        $dato= $this->Model_Detalle_Venta->menor_venta();
        $this->response($dato);
    } 
}
?>