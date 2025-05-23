<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller 
{
    protected $page_title = '';

    public function __construct()
    {
        parent::__construct();       

        $this->load->model('Karyawan_model');
        $this->page_title = '<i class="icon-list"></i> Karyawan';
    }

    public function index()
    {
        $data['page_title'] = $this->page_title;
        $data['karyawan'] = $this->Karyawan_model->get_all();
        $data['contents'] = $this->load->view('karyawan_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }

    public function edit($id)
    {
        $data['page_title'] = 'Edit Karyawan';
        $data['karyawan'] = $this->Karyawan_model->get_by_id($id);

        if (!$data['karyawan']) {
            show_404();
        }

        $data['contents'] = $this->load->view('karyawan_edit', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }

    public function update($id)
    {
        $data = [
            'nama_lengkap'   => $this->input->post('nama_lengkap'),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
            'tempat_lahir'   => $this->input->post('tempat_lahir'),
            'tanggal_lahir'  => $this->input->post('tanggal_lahir'),
            'no_hp'          => $this->input->post('no_hp'),
            'email'          => $this->input->post('email'),
            'departemen'     => $this->input->post('departemen')
        ];

        $this->Karyawan_model->update($id, $data);
        redirect('karyawan');
    }

    public function hapus($id)
    {
        $this->Karyawan_model->delete($id);
        redirect('karyawan');
    }

}
