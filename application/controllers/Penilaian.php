<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Penilaian_model');
        $this->load->model('Kriteria_sub_model');
    }

    public function index()
    {
        $get_data_karyawan = $this->Penilaian_model->get_all();

        $kriteria_ids = [];
        foreach ($get_data_karyawan as $karyawan) {
            foreach ($karyawan['kriterias'] as $kriteria) {
                $kriteria_ids[] = intval($kriteria['kriteria_id']);
            }
        }

        $kriteria_ids = array_unique($kriteria_ids);

        $get_data_kriteria_sub = [];
        foreach ($kriteria_ids as $kriteria_id) {
            $get_data_kriteria_sub[$kriteria_id] = $this->Kriteria_sub_model->get_by_kriteria($kriteria_id);
        }

        $data['karyawans']      = $get_data_karyawan;
        $data['kriteria_sub']   = $get_data_kriteria_sub;

        $data['contents'] = $this->load->view('penilaian_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }

    public function simpan()
    {
        $action = $this->input->post('action');

        if ($action === 'kosongkan') {
            $this->Penilaian_model->kosongkan_penilaian();
            $this->session->set_flashdata('success', 'Penilaian berhasil dikosongkan.');
        } elseif ($action === 'simpan') {
            $data = $this->input->post();
            unset($data['action']);

            if (empty($data)) {
                $this->session->set_flashdata('error', 'Tidak ada data yang dikirim.');
            } else {
                $this->Penilaian_model->update_bulk($data);
                $this->session->set_flashdata('success', 'Penilaian berhasil disimpan.');
            }
        }

        redirect('penilaian');
    }
}
