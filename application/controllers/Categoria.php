<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Categoria extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_categoria');
    }

    public function index_get()
    {
        $id = $this->input->get('id');

        if(!empty($id)) {

            $data = $this->Model_categoria->obtenerId($id)->result();

            if($data) {
                $res['error'] = false;
                $res['message'] = 'datos obtenidos por el id correctamente';
                $res['data'] = $data;

            } else {
                $res['error'] = true;
                $res['message'] = 'error';
            }

        }else {

            $data = $this->Model_categoria->listar_categoria()->result();

            if($data) {
                $res['error'] = false;
                $res['message'] = 'datos obtenidos correctamente';
                $res['data'] = $data;

            } else {
                $res['error'] = true;
                $res['message'] = 'error';
            }

        }

        $this->response($res, 200);

        
    }

    public function index_post()
    {
        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $estado = $this->input->post('estado');

        $data = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'estado' => $estado
        );

        $insert = $this->Model_categoria->guardarCategoria($data);

        if($insert) {
            $res['error'] = false;
            $res['message'] = 'insertado con exito';
            $res['data'] = $data;
        } else {
            $res['error'] = true;
            $res['message'] = 'error';
            $res['data'] = null;
        }

        $this->response($res, 200);
        
    }

    public function index_put()
    {
        $id = $this->input->get('id');

        $nombre = $this->put('nombre');
        $descripcion = $this->put('descripcion');
        $estado = $this->put('estado');

        $data = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'estado' => $estado
        );

        if(!empty($id)) {
           $update = $this->Model_categoria->editarCategoria($id, $data);

           if($update) {
                $res['error'] = false;
                $res['message'] = 'actualizado con exito';
                $res['data'] = $data;
           } else {
                $res['error'] = true;
                $res['message'] = 'error';
                $res['data'] = null;
           }
        } else {
            $res['error'] = true;
            $res['message'] = 'error';
            $res['data'] = null;
        }

        $this->response($res, 200);
        
    }

    public function index_delete()
    {
        $id = $this->input->get('id');

        if(!empty($id)) {

            $delete = $this->Model_categoria->eliminarCategoria($id);

            if($delete) {
                $res['error'] = false;
                $res['message'] = 'eliminado con exito';
                
           } else {
                $res['error'] = true;
                $res['message'] = 'error';
                
           }
        } else {
            $res['error'] = true;
            $res['message'] = 'error';
        }

        $this->response($res, 200);
        
    }

}