<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Kriteria_model');
    }

    public function index()
    {
        $data['kriteria'] = $this->Kriteria_model->get_all();
        $data['contents'] = $this->load->view('kriteria_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }
}
