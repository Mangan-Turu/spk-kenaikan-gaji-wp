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
        $this->load->model('Karyawan_model');
    }

    public function index()
    {
        $vektors = [];

        $get_karyawan = $this->Karyawan_model->get_all();

        foreach ($get_karyawan as $karyawan) {
            $get_nilai_karyawan = $this->Penilaian_model->get_nilai_by_karyawan($karyawan->id);

            $vektor = 1;
            foreach ($get_nilai_karyawan as $val) {
                $nilai   = floatval($val['nilai']);
                $bobot   = floatval($val['nilai_normalisasi']);
                // $pangkat = pow($nilai, $bobot);
                $pangkat = $nilai ** $bobot;

                echo "pow($nilai, $bobot) = $pangkat<br>";

                if ($nilai > 0) {
                    $vektor *= $pangkat;
                }
            }

            echo "<b>Hasil akhir:</b> " . $vektor . '<br><br>';
            $vektors[] = [
                'karyawan_id' => $karyawan->id,
                'vektor'      => $vektor
            ];
        }

        echo json_encode($vektors);
        $total = 0;
        foreach ($vektors as $item) {
            $total += $item['vektor'];
        }

        echo "Total vektor: " . $total;
        // echo json_encode(array_sum($vektors));

        echo '<br><br>';
        foreach ($vektors as $item) {
            $nilaiHasil = $this->nilaiVi($item['vektor'], $total);
            echo "Nilai Vi untuk Karyawan ID {$item['karyawan_id']}: " . $nilaiHasil . ' || ' . $this->keputusan($nilaiHasil) .'<br>';
        }

        return;
    }

    public function nilaiVi($vektor, $totalVektor)
    {
        $nilaiVi = $vektor / $totalVektor;
        return $nilaiVi;
    }

    public function keputusan($nilaiVi)
    {
        if ($nilaiVi > 0.0537) {
            return 'Layak';
        } else {
            return 'Tidak Layak';
        }
    }
}
