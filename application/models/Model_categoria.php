<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_categoria extends CI_Model {

    public function listar_categoria()
    {
        $consulta = $this->db->get('categoria');
        return $consulta;
    }

    public function obtenerId($id)
    {
        $consulta = $this->db->get_where("categoria", ['idcategoria' => $id]);
        return $consulta;
    }

    public function guardarCategoria($data)
    {
        return $this->db->insert('categoria', $data);
    }

    public function editarCategoria($id, $data)
    {
        $this->db->where('idcategoria', $id);
        return $this->db->update('categoria', $data);
    }

    public function eliminarCategoria($id)
    {
        $this->db->where('idcategoria', $id);
        return $this->db->delete('categoria');
    }
}