<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

class Ingreso extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_ingreso');
    }

    public function index_get()
    {
        $id = $this->input->get('id');

        if(!empty($id)) {

            $data = $this->Model_ingreso->obtenerId($id)->result();

            if($data) {
                $res['error'] = false;
                $res['message'] = 'datos obtenidos por el id correctamente';
                $res['data'] = $data;

            } else {
                $res['error'] = true;
                $res['message'] = 'error';
            }

        }else {

            $data = $this->Model_ingreso->listar_ingreso()->result();

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
        $idusuario = $this->input->post('idusuario');
        $idpersona = $this->input->post('idpersona');
        $tipo_comprobante = $this->input->post('tipo_comprobante');
        $serie_comprobante = $this->input->post('serie_comprobante');
        $num_comprobante = $this->input->post('num_comprobante');
        $fecha = $this->input->post('fecha');
        $impuesto = $this->input->post('impuesto');
        $total = $this->input->post('total');
        $estado = $this->input->post('estado');

        $data = array(
            'idusuario' => $idusuario,
            'idpersona' => $idpersona,
            'tipo_comprobante' => $tipo_comprobante,
            'serie_comprobante' => $serie_comprobante,
            'num_comprobante' => $num_comprobante,
            'fecha' => $fecha,
            'impuesto' => $impuesto,
            'total' => $total,
            'estado' => $estado
        );

        $insert = $this->Model_ingreso->guardarIngreso($data);

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

        $idusuario = $this->put('idusuario');
        $idpersona = $this->put('idpersona');
        $tipo_comprobante = $this->put('tipo_comprobante');
        $serie_comprobante = $this->put('serie_comprobante');
        $num_comprobante = $this->put('num_comprobante');
        $fecha = $this->put('fecha');
        $impuesto = $this->put('impuesto');
        $total = $this->put('total');
        $estado = $this->put('estado');

        $data = array(
            'idusuario' => $idusuario,
            'idpersona' => $idpersona,
            'tipo_comprobante' => $tipo_comprobante,
            'serie_comprobante' => $serie_comprobante,
            'num_comprobante' => $num_comprobante,
            'fecha' => $fecha,
            'impuesto' => $impuesto,
            'total' => $total,
            'estado' => $estado
        );

        if(!empty($id)) {
           $update = $this->Model_ingreso->editarIngreso($id, $data);

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

            $delete = $this->Model_ingreso->eliminarIngreso($id);

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