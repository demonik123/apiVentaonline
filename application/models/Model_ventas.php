<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('America/La_Paz');

class Model_ventas extends CI_Model
{
    // public $idventa;
    // public $idusuario;
    // public $idproducto;
    // public $idpersona;
    // public $tipo_comprobante;
    // public $serie_comprobante;
    // public $num_comprobante;
    // public $fecha_hora;
    // public $impuesto;
    // public $total;
    // public $estado;

    // public function guardar_ventas()
    // {
    //     # code...
    //     $estado_code = array();

    //     if (isset($_POST["txttipo_comprobante"])) {
    //         $this->idusuario = (int)$_POST["txtidusuario"];
    //         $this->idproducto = (int)$_POST["txtidproducto"];
    //         $this->idpersona = (int)$_POST["txtidpersona"];
    //         $this->tipo_comprobante = $_POST["txttipo_comprobante"];
    //         $this->serie_comprobante = $_POST["txtserie_comprobante"];
    //         $this->num_comprobante = $_POST["txtnum_comprobante"];
    //         $this->fecha_hora = $_POST["txtfecha_hora"];
    //         $this->impuesto = (float)$_POST["txtimpuesto"];
    //         $this->total = (float)$_POST["txttotal"];
    //         $this->estado = 1;
    //         //para guardar
    //         $insertado = $this->db->insert('venta', $this);
    //         $estado_code = array("http" => http_response_code(201), "estado" => "ok");
    //         return $estado_code;
    //     } else {
    //         return $estado_code = array("http" => http_response_code(500), "estado" => "NO SE INSERTO LA VENTA");
    //     }
    // }
    // public function listar_venta()
    // {
    //     # code...
    //     $this->db->select('tipo_comprobante, serie_comprobante, num_comprobante, fecha_hora, impuesto, total');
    //     $query = $this->db->get('venta');
    //     return $query->result();
    // }
    // public function update_venta()
    // {
    //     //$this->idventa= (int)$_POST["txtidventa"]; 
    //     $this->idusuario = (int)$_GET["txtidusuario"];
    //     $this->idproducto = (int)$_GET["txtidproducto"];
    //     $this->idpersona = (int)$_GET["txtidpersona"];
    //     $this->tipo_comprobante = $_GET["txttipo_comprobante"];
    //     $this->serie_comprobante = $_GET["txtserie_comprobante"];
    //     $this->num_comprobante = $_GET["txtnum_comprobante"];
    //     $this->fecha_hora = $_GET["txtfecha_hora"];
    //     $this->impuesto = (float)$_GET["txtimpuesto"];
    //     $this->total = (float)$_GET["txttotal"];
    //     $this->estado = 1;

    //     $this->db->update(
    //         'venta', //paramtro nombre de tabla

    //         array(
    //             'idusuario' => (int)$_GET["txtidusuario"],
    //             'idproducto' => (int)$_GET["txtidproducto"],
    //             'idpersona' => (int)$_GET["txtidpersona"],
    //             'tipo_comprobante' => $_GET["txttipo_comprobante"],
    //             'serie_comprobante' => $_GET["txtserie_comprobante"],
    //             'num_comprobante' => $_GET["txtnum_comprobante"],
    //             'fecha_hora' => $_GET["txtfecha_hora"],
    //             'impuesto' => (float)$_GET["txtimpuesto"],
    //             'total' => (float)$_GET["txttotal"],
    //             'estado' => (int)$_GET["txtestado"]
    //         ) //parametro atributos de la tabla
    //         ,
    //         array('idventa' => (int)$_GET["txtidventa"])
    //     ); //parametro condicion
    //     if ($this->db->affected_rows()) {
    //         $estado_code = array("http" => http_response_code(201), "estado" => "ok");
    //         return $estado_code;
    //     } else {
    //         return $estado_code = array("http" => http_response_code(500), "estado" => "no se cargo en la bd");
    //     }
    // }
    // public function buscar_por_fecha()
    // {
    //     $this->db->select('v.idventa, p.nombre, v.fecha_hora, Sum(d.cantidad) as cantidad');
    //     $this->db->from('producto p');
    //     $this->db->join('venta v', 'p.idproducto  = v.idproducto', 'inner');
    //     $this->db->join('detalle_venta d', 'd.idventa= v.idventa', 'inner');
    //     $this->db->where('v.fecha_hora', $_GET["txtfecha"]);

    //     $this->db->where('v.fecha_hora', $_GET["txtfecha"]);
    //     $this->db->join('detalle_venta d', 'd.idventa= v.idventa', 'inner');
    //     $this->db->group_by('p.nombre');
    //     $this->db->order_by('d.cantidad', 'desc');
    //     $query = $this->db->get();

    //     return $query->result();
    // }

    // public function buscar_por_fecha_rango()
    // {
    //     $this->db->select('v.idventa, p.nombre, v.fecha_hora, Sum(d.cantidad) as cantidad');
    //     $this->db->from('producto p');
    //     $this->db->join('venta v', 'p.idproducto  = v.idproducto', 'inner');
    //     $this->db->join('detalle_venta d', 'd.idventa= v.idventa', 'inner');
    //     $this->db->where('v.fecha_hora >=', $_GET["txtfecha1"]);
    //     $this->db->where('v.fecha_hora <=', $_GET["txtfecha2"]);
    //     $this->db->group_by('p.nombre');
    //     $this->db->order_by('d.cantidad', 'desc');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    // public function Nro_ventas_por_fecha_rango()
    // {
    //     $this->db->select('count(d.iddetalle_venta) as Nro');
    //     $this->db->from('detalle_venta d');
    //     $this->db->join('venta v', 'd.idventa = v.idventa', 'inner');
    //     $this->db->where('v.fecha_hora >=', $_GET["txtfecha1"]);
    //     $this->db->where('v.fecha_hora <=', $_GET["txtfecha2"]);
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    // public function buscar_por_fechaRango()
    // {
    //     $this->db->select('sum(v.idventa)');
    //     //$this->db->select('v.idventa, p.nombre, v.fecha_hora, Sum(v.idventa) as cantidad');
    //     $this->db->from('venta v');
    //     $this->db->from('detalle_venta d');
    //     $this->db->where('v.fecha_hora >', $_GET["txtfechainicial"]);
    //     $this->db->where('v.fecha_hora <', $_GET["txtfechafinal"]);
    //     //$this->db->group_by('p.nombre');
    //     $query = $this->db->get();

    //     return $query->result();
    // }

    public function cantidadRangoFechas()
    {
        $this->db->select('count(d.iddetalle_venta) as Nro');
        $this->db->from('detalle_venta d');
        $this->db->join('venta v', 'd.idventa = v.idventa', 'inner');
        $this->db->where('v.fecha_hora >=', $_GET["txtfecha1"]);
        $this->db->where('v.fecha_hora <=', $_GET["txtfecha2"]);
        $query = $this->db->get();
        return $query->result();
    }
}
