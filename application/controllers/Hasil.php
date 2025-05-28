<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penilaian_model');
        $this->load->library('Knowledge_lib');
    }

    public function index()
    {
        $data = [];

        $get_data_karyawan = $this->Penilaian_model->get_all();
        $data['total_karyawan'] = count($get_data_karyawan);

        foreach ($get_data_karyawan as $i => $karyawan) {
            $hasil = $this->knowledge_lib->HitungNilaiHasil($karyawan['karyawan_id']);
            $get_data_karyawan[$i]['hasil'] = $hasil['nilaiVi'];
            $get_data_karyawan[$i]['keputusan'] = $hasil['keputusan'];
        }

        $data['karyawans'] = $get_data_karyawan;

        $data['contents'] = $this->load->view('hasil_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }
}
