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
public $img;
public $estado;


    public function guardar_producto()
    {
        $estado_code = array();
        /*$registro = new DateTime("now", new DateTimeZone('America/La_Paz'));
        $registro = $registro->format('Y-m-d');*/

        if(isset($_POST["txtnombre"]))
        {
            $this->idproducto = (int)$_POST["txtidprod"];
            $this->idcategoria = (int)$_POST["txtidcat"];
            $this->codigo = $_POST["txtcodigo"];
            $this->nombre = $_POST["txtnombre"];
            $this->precio_venta = $_POST["txtpre"];
            $this->stock = (int)$_POST["txtstock"];
            $this->descripcion = $_POST["txtdesc"];
            $this->estado =(int)$_POST["txtestado"];
            $this->img = 'http://192.168.0.150/apiVentaonline/uploads/'.$this->codigo.'.jpg';
            //para guardar
            $insertado = $this->db->insert('producto', $this);
            $estado_code = array("http"=>http_response_code(201),"estado"=>"ok");
            //return $this->db->save_queries;
            return $estado_code;
        }
        else
        {
            return $estado_code = array("http"=>http_response_code(500),"estado"=>"mall");
        }
        
    }
    

    public function listar_producto()
    {
        # code...
        $this->db->select('idproducto,idcategoria,codigo,nombre,precio_venta,stock,descripcion,estado');
        $array = array('estado' => 1);
        $query = $this->db->where($array);
        $query = $this->db->get('producto');
        return $query->result();
    } 

    public function buscar_producto()
    {
        //$respuestaTotalEstudiante = array();
        $this->db->select('idproducto,idcategoria,codigo,nombre,precio_venta,stock,descripcion,estado');
        $array = array('idproducto' => (int)$_GET["txtidprod"]);
        $query = $this->db->where($array);
        $query = $this->db->get('producto');
        $respuesta = $query->result();
        //foreach ($respuesta as $respuestas) {
        //    $respuestaTotalEstudiante [] =  array('nombre' => $respuestas->nombre,'estado' => $respuestas->estado);
        //}
        return $respuesta;
    } 

    public function eliminar_producto()
    {
        $this->idproducto = (int)$_GET["txtidprod"];
        $this->estado = 0;
        
        $this->db->update('producto',//paramtro nombre de tabla
            array('idproducto' =>  $this->idproducto,
            'estado' =>  $this->estado
            )//parametro atributos de la tabla
            , array('idproducto' => $_GET["txtidprod"]));//parametro condicion
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

    public function update_producto()
    {
        //este actualiza producto
            $this->idproducto = (int)$_GET["txtidprod"];
            $this->idcategoria = (int)$_GET["txtidcat"];
            $this->codigo = $_GET["txtcodigo"];
            $this->nombre = $_GET["txtnombre"];
            $this->precio_venta = $_GET["txtpre"];
            $this->stock = (int)$_GET["txtstock"];
            $this->descripcion = $_GET["txtdesc"];
            $this->estado =(int) $_GET["txtestado"];

            $this->db->update('producto',//paramtro nombre de tabla

            array('idproducto' =>  $this->idproducto,
            'idcategoria' =>$this->idcategoria,
            'codigo' =>  $this->codigo,
            'nombre' =>  $this->nombre,
            'precio_venta' => $this->precio_venta,
            'stock' => $this->stock ,
            'descripcion' => $this->descripcion,
            'estado' =>  $this->estado
            )//parametro atributos de la tabla
            , array('idproducto' => $_GET["txtidprod"]));//parametro condicion
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