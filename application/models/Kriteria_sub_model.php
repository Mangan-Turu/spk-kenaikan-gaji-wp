<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_sub_model extends CI_Model
{
    private $table = 'kriteria_sub';

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }
}
