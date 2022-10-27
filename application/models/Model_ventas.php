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

    public function Nro_ventas_por_fecha_rango2()
    {
        $this->db->select('count(d.iddetalle_venta) as Nro');
        $this->db->from('detalle_venta d');
        $this->db->join('venta v', 'd.idventa = v.idventa', 'inner');
        $this->db->where('v.fecha_hora >=', $_GET["txtfecha1"]);
        $this->db->where('v.fecha_hora <=', $_GET["txtfecha2"]);
        $query =$this->db->get();
        return $query->result();
    }
}
