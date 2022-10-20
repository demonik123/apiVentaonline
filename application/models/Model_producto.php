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
        /*$registro = new DateTime("now", new DateTimeZone('America/La_Paz'));
		$registro = $registro->format('Y-m-d');*/
        if(isset($_POST["txtcodigo"]))
        {
            $this->idproducto = (int)$_POST["txtidprod"];
            $this->idcategoria =(int) $_POST["txtidcat"];
            $this->codigo = $_POST["txtcodigo"];
            $this->nombre = $_POST["txtnombre"];
            $this->precio_venta = $_POST["txtpre"];
            $this->stock = (int)$_POST["txtstock"];
            $this->descripcion = $_POST["txtdesc"];
            $this->estado = (int)$_POST["txtestado"];
            //para guardar
            $insertado = $this->db->insert('producto', $this);
            $estado_code = array("http"=>http_response_code(201),"estado"=>"todo blue");
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
        $query = $this->db->get('producto');
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
            $this->db->where('idusuario', $this->idusuario);
            $this->db->update('usuario', array('nombre' => $_POST['txtnombre']), array('idusuario' => $_POST['txtidusuario']));
            $estado_code = array("http"=>http_response_code(201),"estado"=>"ok","nombre"=>"nombre");
            return $estado_code;
        }
        else
        {
            return $estado_code = array("http"=>http_response_code(500),"estado"=>"NO se edito el nombre");
        }

    }   
    
    public function actualizar($persona, $id_persona) {
        $this->db->where('id', $id_persona);
        $this->db->update('personas', $persona);
    }//end actualizar
}


?>