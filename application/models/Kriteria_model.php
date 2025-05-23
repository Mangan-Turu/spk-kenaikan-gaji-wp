<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{
    private $table = 'kriteria';

    public function insert($data)
    {
        $last = $this->db->select('id')->order_by('id', 'DESC')->limit(1)->get($this->table)->row();

        $nextId = $last ? $last->id + 1 : 1;
        $data['kode'] = 'C' . $nextId;

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

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function get_search($search)
    {
        $this->db->like('kode', $search);
        $this->db->or_like('nama', $search);
        $this->db->or_like('bobot', $search);
        return $this->db->get($this->table)->result();
    }
}
