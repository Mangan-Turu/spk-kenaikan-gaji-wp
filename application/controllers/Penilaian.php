<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Penilaian_model');
    }

    public function index()
    {
        $get_data_karyawan = $this->Penilaian_model->get_all();
        
        $data['karyawan'] = $get_data_karyawan;

        $data['contents'] = $this->load->view('penilaian_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }
}
