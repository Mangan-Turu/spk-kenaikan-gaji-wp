<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Kriteria_model');
        $this->load->model('Kriteria_sub_model');
    }

    public function index()
    {
        $kriteria_sub = $this->Kriteria_sub_model->get_all();
        $grouped = [];
        foreach ($kriteria_sub as $item) {
            $id = $item['kriteria_id'];
            if (!isset($grouped[$id])) {
                $grouped[$id] = [
                    'kode' => $item['kode'],
                    'nama' => $item['nama'],
                    'nilai' => []
                ];
            }
            $grouped[$id]['nilai'][$item['nilai']] = $item['deskripsi'];
        }

        $data['kriteria_sub'] = $grouped;
        $data['kriteria'] = $this->Kriteria_model->get_all();

        $data['contents'] = $this->load->view('kriteria_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }
}
