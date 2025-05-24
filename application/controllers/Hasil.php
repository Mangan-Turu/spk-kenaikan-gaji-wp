<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hasil extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = [];
        $data['contents'] = $this->load->view('hasil_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }
}
