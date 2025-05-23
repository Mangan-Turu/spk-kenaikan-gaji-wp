<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('karyawan')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('karyawan', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('karyawan', $data);
    }

    public function update($id, $data)
    {
        return $this->db->update('karyawan', $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('karyawan', ['id' => $id]);
    }

}
