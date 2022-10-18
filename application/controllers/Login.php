<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Login extends REST_Controller
{
    function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->model('Model_login');
    }
    
    public function list_get()
    {
        # code...
        $dato= $this->Model_usuario->listar_usuario();
        $this->response($dato);
    } 

    public function guardar_post()
    {
        # code...
        $dato = $this->Model_usuario->guardar_usuario();
        $this->response($dato);

    }

    public function loginUsuario_post()
    {
        # code...
        $data = $this->Model_usuario->loginUsuarios();
                if($data){
                    $respuesta = array(
                        'err' => false,
                        'desc' => "Inicio de sección correcto.",
                        'usuario' => $data
                    );
                }else{
                    $respuesta = array(
                        'err' => true,
                        'desc' => "El usuario o código son incorrectos.",
                        'usuario' => null
                    );
                }
                $this->response($respuesta);
    }
    public function actualizar_put()
    {
        # code...
      $dato = $this->Model_usuario->update_usuario();
      $this->response($dato);
    }
   
}



?>