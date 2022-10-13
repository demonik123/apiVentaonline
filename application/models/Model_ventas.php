<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/La_Paz');

class Model_ventas extends CI_Model
{
    public $idventa;
    public $idusuario;
    public $idproducto;
    public $idpersona;
    public $tipo_comprobante;
    public $serie_comprobante;
    public $num_comprobante;
    public $fecha_hora;
    public $impuesto;
    public $total;
    public $estado;

    /*`idventa` int(11) NOT NULL AUTO_INCREMENT PRIMARY key,
    `idusuario` int(11) NOT NULL,
    `idproducto` int(11) NOT NULL,
    `idpersona` int(11) NOT NULL,
    `tipo_comprobante` varchar(20) NOT NULL,
    `serie_comprobante` varchar(7) DEFAULT NULL,
    `num_comprobante` varchar(10) NOT NULL,
    `fecha_hora` datetime NOT NULL,
    `impuesto` decimal(4,2) NOT NULL,
    `total` decimal(11,2) NOT NULL,*/

    public function guardar_ventas()
    {
        # code...
        $estado_code = array();
       
        if(isset($_POST["txttipo_comprobante"]))
        {   //$this->idventa= (int)$_POST["txtidventa"]; 
            $this->idusuario=(int)$_POST["txtidusuario"];
            $this->idproducto = (int)$_POST["txtidproducto"];
            $this->idpersona = (int)$_POST["txtidpersona"];
            $this->tipo_comprobante = $_POST["txttipo_comprobante"];
            $this->serie_comprobante = $_POST["txtserie_comprobante"];
            $this->num_comprobante = $_POST["txtnum_comprobante"];
            $this->fecha_hora = $_POST["txtfecha_hora"];
            $this->impuesto = (double)$_POST["txtimpuesto"];
            $this->total = (double)$_POST["txttotal"];
            $this->estado = 1;
            //para guardar
            $insertado = $this->db->insert('venta', $this);
            $estado_code = array("http"=>http_response_code(201),"estado"=>"ok");
			//return $this->db->save_queries;
            return $estado_code;
        }
        else
        {
            return $estado_code = array("http"=>http_response_code(500),"estado"=>"NO SE INSERTO LA VENTA");
        }
        
    }
    public function listar_venta()
    {
        # code...
        $this->db->select('tipo_comprobante, serie_comprobante, num_comprobante, fecha_hora, impuesto, total');
        $query = $this->db->get('venta');
        return $query->result();
    } 
    public function update_venta()
    {
        //$this->idventa= (int)$_POST["txtidventa"]; 
        $this->idusuario=(int)$_GET["txtidusuario"];
        $this->idproducto = (int)$_GET["txtidproducto"];
        $this->idpersona = (int)$_GET["txtidpersona"];
        $this->tipo_comprobante = $_GET["txttipo_comprobante"];
        $this->serie_comprobante = $_GET["txtserie_comprobante"];
        $this->num_comprobante = $_GET["txtnum_comprobante"];
        $this->fecha_hora = $_GET["txtfecha_hora"];
        $this->impuesto = (double)$_GET["txtimpuesto"];
        $this->total = (double)$_GET["txttotal"];
        $this->estado = 1;

        $this->db->update('venta',//paramtro nombre de tabla

        array(
        'idusuario' => (int)$_GET["txtidusuario"],
        'idproducto' => (int)$_GET["txtidproducto"],
        'idpersona' => (int)$_GET["txtidpersona"],
        'tipo_comprobante' => $_GET["txttipo_comprobante"],
        'serie_comprobante' => $_GET["txtserie_comprobante"],
        'num_comprobante' => $_GET["txtnum_comprobante"],
        'fecha_hora' => $_GET["txtfecha_hora"],
        'impuesto' => (double)$_GET["txtimpuesto"],
        'total' => (double)$_GET["txttotal"],
        'estado' => (int)$_GET["txtestado"]
        )//parametro atributos de la tabla
        , array('idventa' => (int)$_GET["txtidventa"]));//parametro condicion
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