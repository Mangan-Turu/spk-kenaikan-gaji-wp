<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    protected $for_role = 'admin';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Users_model');
        $this->load->model('Kriteria_model');
        $this->load->model('Kriteria_sub_model');
        $this->load->model('Penilaian_model');
        $this->load->model('Karyawan_model');
    }

    public function index()
    {
        $data['total_karyawan'] = $this->Karyawan_model->count_all();
        $data['total_kriteria'] = $this->Kriteria_model->count_all();
        $data['total_pembobotan'] = $this->Kriteria_sub_model->count_all();
        $data['total_penilaian'] = $this->Penilaian_model->count_all();

        $data['contents'] = $this->load->view('dashboard_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }
}
