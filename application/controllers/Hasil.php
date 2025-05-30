<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Penilaian_model');
        $this->load->model('Kriteria_model');
        $this->load->model('Karyawan_model');
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

    public function detail($karyawanId)
    {
        $data = [];
        $data['karyawan']       = $this->Karyawan_model->get_by_id($karyawanId);
        $data['karyawan_nilai'] = $this->Penilaian_model->get_by_id($karyawanId);

        $data['contents'] = $this->load->view('hasil_detail_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }

    public function perhitungan()
    {
        $data = [];

        $get_data_karyawan = $this->Penilaian_model->get_all();
        $data['total_karyawan'] = count($get_data_karyawan);

        foreach ($get_data_karyawan as $i => $karyawan) {
            $hasil              = $this->knowledge_lib->HitungNilaiHasil($karyawan['karyawan_id']);
            $get_nilai_karyawan = $this->Penilaian_model->get_nilai_by_karyawan($karyawan['id']);

            $get_data_karyawan[$i]['hasil'] = $hasil['nilaiVi'];
            $get_data_karyawan[$i]['keputusan'] = $hasil['keputusan'];
        }

        $normalisasi_bobot = $this->Kriteria_model->get_all();

        $jumlah_keseluruhan_bobot = 0;
        $list_bobot = [];
        foreach ($normalisasi_bobot as $kriteria) {
            $jumlah_keseluruhan_bobot += $kriteria->bobot;
            $list_bobot[] = $kriteria->bobot;
        }

        $data['karyawans']                      = $get_data_karyawan;
        $data['kriterias']                      = $normalisasi_bobot;
        $data['kriteria_jumlah_keseluruhan']    = $jumlah_keseluruhan_bobot;
        $data['kriteria_list_bobot']            = $list_bobot;
        $data['kriteria_hasil_normalisasi']     = [];

        $data['contents'] = $this->load->view('hasil_perhitungan_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }
}
