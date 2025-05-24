<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
    private $table = 'penilaian';
    private $table_kriteria = 'kriteria';
    private $table_karyawan = 'karyawan';

    public function get_all()
    {
        $this->db->select('
            penilaian.id,
            penilaian.karyawan_id,
            karyawan.nik,
            karyawan.nama_lengkap,
            karyawan.departemen,
            karyawan.jenis_kelamin,
            penilaian.id AS penilaian_id,
            penilaian.kriteria_id,
            kriteria.kode,
            kriteria.nama AS nama_kriteria,
            kriteria.bobot,
            penilaian.kriteria_sub_id,
            kriteria_sub.nilai AS nilai_sub,
            kriteria_sub.deskripsi AS deskripsi_sub,
            penilaian.created_at,
            penilaian.updated_at,
            penilaian.created_by,
            penilaian.updated_by
        ');
        $this->db->from($this->table);
        $this->db->join('karyawan', 'karyawan.id = penilaian.karyawan_id');
        $this->db->join('kriteria', 'kriteria.id = penilaian.kriteria_id');
        $this->db->join('kriteria_sub', 'kriteria_sub.id = penilaian.kriteria_sub_id', 'left');
        $this->db->where('penilaian.created_by', $this->session->userdata('user_id'));
        $this->db->order_by('penilaian.karyawan_id ASC, penilaian.kriteria_id ASC');

        $flat = $this->db->get()->result_array();

        // Transform to nested
        $grouped = [];
        foreach ($flat as $row) {
            $karyawanId = $row['karyawan_id'];

            if (!isset($grouped[$karyawanId])) {
                $grouped[$karyawanId] = [
                    'id'            => $row['id'],
                    'karyawan_id'   => $row['karyawan_id'],
                    'nik'           => $row['nik'],
                    'nama_lengkap'  => $row['nama_lengkap'],
                    'departemen'    => $row['departemen'],
                    'jenis_kelamin' => $row['jenis_kelamin'],
                    'created_at'    => $row['created_at'],
                    'updated_at'    => $row['updated_at'],
                    'created_by'    => $row['created_by'],
                    'updated_by'    => $row['updated_by'],
                    'kriterias'     => []
                ];
            }

            $grouped[$karyawanId]['kriterias'][] = [
                'penilaian_id'     => $row['penilaian_id'],
                'kriteria_id'      => $row['kriteria_id'],
                'kode'             => $row['kode'],
                'nama_kriteria'    => $row['nama_kriteria'],
                'bobot'            => $row['bobot'],
                'kriteria_sub_id'  => $row['kriteria_sub_id'],
            ];
        }

        return array_values($grouped);
    }

    public function update_bulk($data)
    {
        if (empty($data)) return false;

        $updateData = [];
        foreach ($data as $id => $kriteria_sub_id) {
            $updateData[] = [
                'id' => $id,
                'kriteria_sub_id' => intval($kriteria_sub_id),
                'updated_by' => $this->session->userdata('user_id'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        return $this->db->update_batch($this->table, $updateData, 'id');
    }

    public function kosongkan_penilaian()
    {
        $this->db->set('kriteria_sub_id', null);
        $this->db->where('created_by', $this->session->userdata('user_id'));
        return $this->db->update($this->table);
    }

    public function get_nilai_by_karyawan($karyawan_id)
    {
        $this->db->select('
            penilaian.id,
            penilaian.karyawan_id,
            karyawan.nik,
            karyawan.nama_lengkap,
            karyawan.departemen,
            karyawan.jenis_kelamin,
            penilaian.id AS penilaian_id,
            penilaian.kriteria_id,
            kriteria.kode,
            kriteria.nama AS nama_kriteria,
            kriteria.bobot,
            ROUND(kriteria.bobot / 100, 2) AS nilai_normalisasi,
            penilaian.kriteria_sub_id,
            (kriteria_sub.nilai * 10) AS nilai_sub,
            kriteria_sub.deskripsi AS deskripsi_sub
        ');
        $this->db->from($this->table);
        $this->db->join('karyawan', 'karyawan.id = penilaian.karyawan_id');
        $this->db->join('kriteria', 'kriteria.id = penilaian.kriteria_id');
        $this->db->join('kriteria_sub', 'kriteria_sub.id = penilaian.kriteria_sub_id', 'left');
        $this->db->where('penilaian.karyawan_id', $karyawan_id);
        return $this->db->get()->result_array();
    }
}
