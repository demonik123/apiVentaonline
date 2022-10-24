<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ingreso extends CI_Model {

    public function listar_ingreso()
    {
        
        $consulta = $this->db->get('ingreso');
        
        return $consulta;
    }

    public function obtenerId($id)
    {
        $consulta = $this->db->get_where("ingreso", ['idingreso' => $id]);
        return $consulta;
    }

    public function guardarIngreso($data)
    {
        return $this->db->insert('ingreso', $data);
    }

    public function editarIngreso($id, $data)
    {
        $this->db->where('idingreso', $id);
        return $this->db->update('ingreso', $data); 
    }

    public function eliminarIngreso($id)
    {
        $this->db->where('idingreso', $id);
        
       return $this->db->delete('ingreso');
    }

}