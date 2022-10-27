<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/La_Paz');

class Model_persona extends CI_Model
{
    public $idpersona;
    public $tipo_persona;
    public $nombre;
    public $tipo_documento;
    public $num_documento;
    public $direccion;
    public $telefono;
    public $email;


    public function guardar_persona()
    {
        # code...
        $estado_code = array();
        /*$registro = new DateTime("now", new DateTimeZone('America/La_Paz'));
		$registro = $registro->format('Y-m-d');*/
        if(isset($_POST["txtnombre"]))
        {
            $this->idpersona = (int)$_POST["txtidpersona"];
            $this->tipo_persona = $_POST["txttipo_peronsa"];
            $this->nombre = $_POST["txtnombre"];
            $this->tipo_documento = $_POST["txttipo_documento"];
            $this->num_documento = $_POST["txtnum_documento"];
            $this->direccion = $_POST["txtdireccion"];
            $this->telefono = $_POST["txttelefono"];
            $this->email = $_POST["txtemail"];
            //para guardar
            $insertado = $this->db->insert('persona', $this);
            $estado_code = array("http"=>http_response_code(201),"estado"=>"ok");
			//return $this->db->save_queries;
            return $estado_code;
        }
        else
        {
            return $estado_code = array("http"=>http_response_code(500),"estado"=>"mall");
        }
        
    }
    public function listar_persona()
    {
        # code...
        $this->db->select('idpersona,tipo_persona,nombre,tipo_documento,num_documento,direccion,telefono,email');
        $query = $this->db->get('persona');
        return $query->result();
    } 
    public function buscar_persona($id)
    {
        $respuestaTotalEstudiante = array();
        $this->db->select('idpersona,tipo_persona,nombre,tipo_documento,num_documento,direccion,telefono,email');
        $array = array('idproducto' => $id);
        $query = $this->db->where($array);
        $query = $this->db->get('persona');
        $respuesta = $query->result();
        foreach ($respuesta as $respuestas) {
            $respuestaTotalEstudiante [] =  array('nombre' => $respuestas->nombre,
                                        'estado' => $respuestas->estado);
        }
        return $respuestaTotalEstudiante;

    } 
    
    public function update_persona()
    {
		//este actualiza persona
            $this->idpersona = (int)$_GET["txtidpersona"];
            $this->tipo_persona = $_GET["txttipo_persona"];
            $this->nombre = $_GET["txtnombre"];
            $this->tipo_documento = $_GET["txttipo_documento"];
            $this->num_documento = $_GET["txtnum_documento"];
            $this->direccion = $_GET["txtdireccion"];
            $this->telefono = $_GET["txttelefono"];
            $this->email =$_GET["txtemail"];
            $this->db->update('persona',//paramtro nombre de tabla

            array('idpersona' =>  $this->idpersona,
            'tipo_persona' =>$this->tipo_persona,
            'nombre' =>  $this->nombre,
            'tipo_documento' =>  $this->tipo_documento,
            'num_documento' => $this->num_documento,
            'direccion' => $this->direccion ,
            'telefono' => $this->telefono,
            'email' =>  $this->email
            )//parametro atributos de la tabla
            , array('idpersona' => $_GET["txtidpersona"]));//parametro condicion
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