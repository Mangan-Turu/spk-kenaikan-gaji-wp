<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Knowledge extends CI_Controller
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
        $alternatif_id = 1;

        // Ambil data nilai dan normalisasi berdasarkan karyawan
        $get_nilai_karyawan = $this->Penilaian_model->get_nilai_by_karyawan($alternatif_id);

        $vektor = [];
        foreach ($get_nilai_karyawan as $val) {
            $nilai     = floatval($val['nilai_sub']);
            $pangkat   = floatval($val['nilai_normalisasi']);

            // Pastikan nilai valid
            if ($nilai > 0 && $pangkat !== null) {
                $vektor[] = pow($nilai, $pangkat);
            } else {
                $vektor[] = 0; // fallback jika ada nilai tidak valid
            }
        }

        // Hitung total jumlah vektor
        $vektor_sum = array_sum($vektor);

        // Output
        echo json_encode([
            'vektor' => $vektor,
            'total'  => $vektor_sum
        ]);
        die;
    }
}
