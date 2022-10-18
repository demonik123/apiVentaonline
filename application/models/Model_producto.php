<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/La_Paz');

class Model_producto extends CI_Model
{
    public $idproducto;
    public $idcategoria;
    public $codigo;
    public $nombre;
    public $precio_venta;
    public $stock;
    public $descripcion;
    public $estado;

    public function guardar_producto()
    {
        # code...
        $estado_code = array();
       
        if(isset($_POST["txtnombre"]))
        {   //$this->idproducto = (int)$_POST["txtidproducto"]; 
            $this->idcategoria=(int)$_POST["txtidcategoria"];
            $this->codigo = $_POST["txtcodigo"];
            $this->nombre = $_POST["txtnombre"];
            $this->precio_venta = (double)$_POST["txtprecio_venta"];
            $this->stock = (int)$_POST["txtstock"];
            $this->descripcion = $_POST["txtdescripcion"];
            $this->estado = 1;
            //para guardar
            $insertado = $this->db->insert('producto', $this);
            $estado_code = array("http"=>http_response_code(201),"estado"=>"ok");
			//return $this->db->save_queries;
            return $estado_code;
        }
        else
        {
            return $estado_code = array("http"=>http_response_code(500),"estado"=>"NO SE INSERTO");
        }
        
    }
    public function listar_producto()
    {
        # code...
        $this->db->select('idproducto, idcategoria,codigo,nombre, precio_venta,descripcion,estado');
        $query = $this->db->get('producto');
        return $query->result();
    } 
    public function update_producto()
    {
            //$this->idproducto = (int)$_GET["txtidproducto"]; 

            $this->idcategoria= (int)$_GET["txtidcategoria"];
            $this->codigo = $_GET["txtcodigo"];
            $this->nombre = $_GET["txtnombre"];
            $this->precio_venta = (double)$_GET["txtprecio_venta"];
            $this->stock = (int)$_GET["txtstock"];
            $this->descripcion = $_GET["txtdescripcion"];
            $this->estado = (int)$_GET["txtestado"];

            $this->db->update('producto',//paramtro nombre de tabla

            array('idcategoria' => (int)$_GET["txtidcategoria"],
            'codigo' => $_GET["txtcodigo"],
            'nombre' => $_GET["txtnombre"],
            'precio_venta' =>(double)$_GET["txtprecio_venta"],
            'stock' => (int)$_GET["txtstock"],
            'descripcion' => $_GET["txtdescripcion"],
            'estado' => (int)$_GET["txtestado"]
            )//parametro atributos de la tabla
            , array('idproducto' =>(int)$_GET["txtidproducto"]));//parametro condicion
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
