<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Ventas extends REST_Controller
{
    function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('Model_ventas');
    }

    public function NroRango2_get()
    {
        # code...
      $dato = $this->Model_ventas->Nro_ventas_por_fecha_rango2();
      $this->response($dato);
    }
    
}
?>