<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/La_Paz');

class Model_rol extends CI_Model
{
    public $idrol;
    public $nombre;
    public $descripcion;
    public $estado;


    /*CREATE TABLE `rol` (
        `idrol` int(11) NOT NULL,
        `nombre` varchar(30) NOT NULL,
        `descripcion` varchar(100) DEFAULT NULL,
        `estado` bit(1) DEFAULT b'1'
      )*/

    public function guardar_rol()
    {
        # code...
        $estado_code = array();
       
        if(isset($_POST["txtnombre"]))
        {   
            //$this->idrol=(int)$_POST["txtidrol"];
            $this->nombre = $_POST["txtnombre"];
            $this->descripcion = $_POST["txtdescripcion"];
            $this->estado = 1;
            //para guardar
            $insertado = $this->db->insert('rol', $this);
            $estado_code = array("http"=>http_response_code(201),"estado"=>"ok");
			//return $this->db->save_queries;
            return $estado_code;
        }
        else
        {
            return $estado_code = array("http"=>http_response_code(500),"estado"=>"NO SE INSERTO");
        }
        
    }
    public function listar_rol()
    {
        # code...
        $this->db->select('idrol,nombre, descripcion, estado');
        $query = $this->db->get('rol');
        return $query->result();
    } 
    public function update_rol()
    {
            $this->idrol = (int)$_GET["txtidrol"];
            $this->nombre = $_GET["txtnombre"];
            $this->descripcion = $_GET["txtdescripcion"];
            $this->estado = (int)$_GET["txtestado"];

            $this->db->update('rol',//paramtro nombre de tabla

            array('nombre' => $_GET["txtnombre"],
            'descripcion' => $_GET["txtdescripcion"],
            'estado' => (int)$_GET["txtestado"]
            )//parametro atributos de la tabla
            , array('idrol' => (int)$_GET["txtidrol"]));//parametro condicion
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
