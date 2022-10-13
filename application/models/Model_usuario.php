<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/La_Paz');

class Model_usuario extends CI_Model
{
    public $idusuario;
    public $idrol;
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
       
        if(isset($_POST["txtnombre"]))
        {   $this->idusuario = (int)$_POST["txtidusuario"]; 
            $this->idrol=(int)$_POST["txtidrol"];
            $this->nombre = $_POST["txtnombre"];
            $this->tipo_documento = $_POST["txttipo_documento"];
            $this->num_documento = $_POST["txtnum_documento"];
            $this->direccion = $_POST["txtdireccion"];
            $this->telefono = $_POST["txttelefono"];
            $this->email = $_POST["txtemail"];
            $this->password = $_POST["txtpassword"];
            $this->estado = 1;
            //para guardar
            $insertado = $this->db->insert('usuario', $this);
            $estado_code = array("http"=>http_response_code(201),"estado"=>"ok");
			//return $this->db->save_queries;
            return $estado_code;
        }
        else
        {
            return $estado_code = array("http"=>http_response_code(500),"estado"=>"NO SE INSERTO");
        }
        
    }
    public function listar_usuario()
    {
        # code...
        $this->db->select('idusuario, nombre,direccion,telefono, email,estado');
        $query = $this->db->get('usuario');
        return $query->result();
    } 
    public function update_usuario()
    {
            $this->idusuario = $_GET["txtidusuario"];
            $this->idrol = (int)$_GET["txtidrol"];
            $this->nombre = $_GET["txtnombre"];
            $this->tipo_documento = $_GET["txttipo_documento"];
            $this->num_documento = $_GET["txtnum_documento"];
            $this->direccion = $_GET["txtdireccion"];
            $this->telefono = $_GET["txttelefono"];
            $this->email = $_GET["txtemail"];
            $this->password = $_GET["txtpassword"];
            $this->estado = (int)$_GET["txtestado"];

            $this->db->update('usuario',//paramtro nombre de tabla

            array('idrol' => $_GET["txtidrol"],
            'nombre' => $_GET["txtnombre"],
            'tipo_documento' => $_GET["txttipo_documento"],
            'num_documento' => $_GET["txtnum_documento"],
            'direccion' => $_GET["txtdireccion"],
            'telefono' => $_GET["txttelefono"],
            'email' => $_GET["txtemail"],
            'password' => $_GET["txtpassword"],
            'estado' => (int)$_GET["txtestado"]
            )//parametro atributos de la tabla
            , array('idusuario' => $_GET["txtidusuario"]));//parametro condicion
            if($this->db->affected_rows())
            {
                $estado_code = array("http"=>http_response_code(201),"estado"=>"ok");
                return $estado_code;
            } 
            else 
            {
                return $estado_code = array("http"=>http_response_code(500),"estado"=>"no se cargo en la bd");
            }
           
    }   
}


?>
