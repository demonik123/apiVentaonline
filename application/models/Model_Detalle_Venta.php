<?php
defined('BASEPATH') OR exit('No direct script access allowed');

date_default_timezone_set('America/La_Paz');

class Model_Detalle_Venta extends CI_Model
{
    public $iddetalle_venta;
    public $idventa;
    public $idproducto;
    public $cantidad;
    public $precio;
    public $descuento;
    
    public function menor_venta(){
        $this->db->select('iddetalle_venta, MIN(cantidad)as minimo');
        $this->db->from('detalle_venta');
        $query = $this->db->get();
        return $query->result();
    }
}


?>
