<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Knowledge extends MY_Controller
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
        $alternatif = 3;
        $get_nilai_karyawan = $this->Penilaian_model->get_nilai_by_karyawan($alternatif);

        $vektor = 1;
        foreach ($get_nilai_karyawan as $val) {
            $nilai   = floatval($val['nilai_sub']);
            $bobot   = floatval($val['nilai_normalisasi']);

            $pangkat = round(pow($nilai, $bobot), 4);

            echo "pow($nilai, $bobot) = $pangkat<br>";

            if ($nilai > 0) {
                $vektor *= $pangkat;
            }
        }

        echo "<br><b>Hasil akhir:</b> " . round($vektor, 4);

        return;
    }
}
