<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Venta extends REST_Controller
{
    function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('Model_ventas');
    }
    public function list_get()
    {
        # code...
        $dato= $this->Model_ventas->listar_venta();
        $this->response($dato);
    } 

    public function guardar_post()
    {
        # code...
        $dato = $this->Model_ventas->guardar_ventas();
        $this->response($dato);

    }
    public function actualizar_post()
    {
        # code...
        $dato = $this->Model_ventas->update_venta();
        $this->response($dato);
    }
    
    public function buscar_get()
    {
        # code...
        $dato = $this->Model_ventas->buscar_por_fecha();
        $this->response($dato);
    }
    public function buscarRangoFecha_get()
    {
        # code...
        $dato = $this->Model_ventas->buscar_por_fechaRango();
        $this->response($dato);
    }
}
?>