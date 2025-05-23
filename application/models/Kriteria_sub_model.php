<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_sub_model extends CI_Model
{
    private $table = 'kriteria_sub';

    protected $user_id;

    public function __construct()
    {
        parent::__construct();
        $this->user_id = $this->session->userdata('user_id');
    }

    public function insert($data)
    {
        $data['created_by'] = $this->user_id;
        $data['updated_by'] = $this->user_id;
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $data['updated_by'] = $this->user_id;
        return $this->db->update($this->table, $data, [
            'id'         => $id,
            'created_by' => $this->user_id
        ]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, [
            'id' => $id,
            'created_by' => $this->user_id
        ]);
    }

    public function get_all()
    {
        $this->db->select('
            kriteria_sub.id,
            kriteria.id AS kriteria_id,
            kriteria.kode,
            kriteria.nama,
            kriteria_sub.nilai,
            kriteria_sub.deskripsi,
            kriteria_sub.created_at,
            kriteria_sub.updated_at,
            kriteria_sub.created_by,
            kriteria_sub.updated_by
        ');
        $this->db->from('kriteria_sub');
        $this->db->join('kriteria', 'kriteria.id = kriteria_sub.kriteria_id');
        $this->db->where('kriteria_sub.created_by', $this->user_id);
        $this->db->order_by('kriteria.id', 'ASC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_by_id($id)
    {
        return $this->db
            ->where('id', $id)
            ->where('created_by', $this->user_id)
            ->get($this->table)
            ->row();
    }

    public function get_by_kriteria($kriteria_id)
    {
        return $this->db
            ->where('kriteria_id', $kriteria_id)
            ->where('created_by', $this->user_id)
            ->get($this->table)
            ->result_array();
    }
}
