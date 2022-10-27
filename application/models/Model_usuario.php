<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/La_Paz');

class Model_usuario extends CI_Model
{
    public $idusuario;
    public $nivel;
    public $nombre;
    public $tipo_documento;
    public $num_documento;
    public $direccion;
    public $telefono;
    public $email;
    public $password;
    public $estado;
    //public $ruta;
    //public $ci;


    public function loginUsuarios()
    {
        # code...
        $this->nombre = $_POST['txtnombre'];
        $this->password = $_POST['txtpassword'];
        $this->db->select('*');
        $array = array('ci' => $this->ci, 'password' => $this->password);
        $this->db->where($array);
        $query = $this->db->get('alumnos');
        return $query->custom_row_object(0,'Model_usuario');

    }

    public function guardar_usuario()
    {
        # code...
        $estado_code = array();
        /*$registro = new DateTime("now", new DateTimeZone('America/La_Paz'));
		$registro = $registro->format('Y-m-d');*/
        if(isset($_POST["txtnombre"]))
        {
            $p=$_POST["txtnivel"];
            $this->nivel = (int)$p;
            $this->nombre = $_POST["txtnombre"];
            $this->tipo_documento = $_POST["txttipo_documento"];
            $this->num_documento = $_POST["txtnum_documento"];
            $this->direccion = $_POST["txtdireccion"];
            $this->telefono = $_POST["txttelefono"];
            $this->email = $_POST["txtemail"];
            $this->password = $_POST["txtpassword"];
            $this->estado = 'activo';
            //para guardar
            $insertado = $this->db->insert('usuario', $this);
            $estado_code = array("http"=>http_response_code(201),"estado"=>"ok");
			//return $this->db->save_queries;
            return $estado_code;
        }
        else
        {
            return $estado_code = array("http"=>http_response_code(500),"estado"=>"mall");
        }
        
    }
    public function listar_usuario()
    {
        # code...
        $this->db->select('idusuario, nombre,direccion,telefono, email');
        $query = $this->db->get('usuario');
        return $query->result();
    } 
    public function update_usuario()
    {
        # code...
        if(isset($_POST["txtidusuario"]))
        {
            $this->idusuario = $_POST["txtidusuario"];
            $this->nombre = $_POST["txtnombre"];
            //$this->db->update('usuario', array('nombre' => $_POST['txtnombre']), array('idusuario' => $_POST['txtidusuario']));
            $this->db->where('idusuario',);
            $this->db->update('usuario', array('nombre' => $_POST['txtnombre']), array('idusuario' => $_POST['txtidusuario']));
             $estado_code = array("http"=>http_response_code(201),"estado"=>"ok","nombre"=>"nombre");
            return $estado_code;
        }
        else
        {
            return $estado_code = array("http"=>http_response_code(500),"estado"=>"NO se edito el nombre");
        }
    }   
}


?>