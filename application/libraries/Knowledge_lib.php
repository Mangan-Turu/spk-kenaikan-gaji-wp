<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Knowledge_lib
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance(); // akses instance CI
        $this->CI->load->model('Penilaian_model');
        $this->CI->load->model('Karyawan_model');
    }

    public function nilaiVi($vektor, $totalVektor)
    {
        return $vektor / $totalVektor;
    }

    public function keputusan($nilaiVi)
    {
        return ($nilaiVi > 0.0537) ? 'Layak' : 'Tidak Layak';
    }

    public function HitungNilaiHasil($karyawanId)
    {
        $get_nilai_karyawan = $this->CI->Penilaian_model->get_nilai_by_karyawan($karyawanId);

        $vektor = 1;
        foreach ($get_nilai_karyawan as $nilaiItem) {
            $nilai = floatval($nilaiItem['nilai']);
            $bobot = floatval($nilaiItem['nilai_normalisasi']);
            if ($nilai > 0) {
                $vektor *= $nilai ** $bobot;
            }
        }

        $total = 0;
        $all_karyawan = $this->CI->Karyawan_model->get_all();
        foreach ($all_karyawan as $karyawan) {
            $nilai_kar = $this->CI->Penilaian_model->get_nilai_by_karyawan($karyawan->id);
            $v = 1;
            foreach ($nilai_kar as $n) {
                $val = floatval($n['nilai']);
                $bobot = floatval($n['nilai_normalisasi']);
                if ($val > 0) {
                    $v *= $val ** $bobot;
                }
            }
            $total += $v;
        }

        $nilaiVi = $this->nilaiVi($vektor, $total);
        $keputusan = $this->keputusan($nilaiVi);

        return [
            'nilaiVi' => $nilaiVi,
            'keputusan' => $keputusan
        ];
    }
}
