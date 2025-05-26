<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends MY_Controller 
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

    public function tambah()
    {
        $data = [
            'nama_lengkap'     => $this->input->post('nama_lengkap'),
            'nik'              => $this->input->post('nik'),
            'jenis_kelamin'    => $this->input->post('jenis_kelamin'),
            'tempat_lahir'     => $this->input->post('tempat_lahir'),
            'tanggal_lahir'    => $this->input->post('tanggal_lahir'),
            'no_hp'            => $this->input->post('no_hp'),
            'email'            => $this->input->post('email'),
            'jabatan'          => $this->input->post('jabatan'),
            'departemen'       => $this->input->post('departemen'),
            'tanggal_masuk'    => $this->input->post('tanggal_masuk'),
            'status_karyawan'  => $this->input->post('status_karyawan'),
            'alamat'           => $this->input->post('alamat')
        ];
    
        $insert = $this->Karyawan_model->insert($data);
    
        if ($insert) {
            $this->session->set_flashdata('success', 'Data karyawan berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Data karyawan gagal ditambahkan.');
        }
    
        redirect('karyawan');
    }
    
    public function update($id)
    {
        $data = [
            'nama_lengkap'     => $this->input->post('nama_lengkap'),
            'nik'              => $this->input->post('nik'),
            'jenis_kelamin'    => $this->input->post('jenis_kelamin'),
            'tempat_lahir'     => $this->input->post('tempat_lahir'),
            'tanggal_lahir'    => $this->input->post('tanggal_lahir'),
            'no_hp'            => $this->input->post('no_hp'),
            'email'            => $this->input->post('email'),
            'jabatan'          => $this->input->post('jabatan'),
            'departemen'       => $this->input->post('departemen'),
            'tanggal_masuk'    => $this->input->post('tanggal_masuk'),
            'status_karyawan'  => $this->input->post('status_karyawan'),
            'alamat'           => $this->input->post('alamat')
        ];
    
        $update = $this->Karyawan_model->update($id, $data);
    
        if ($update) {
            $this->session->set_flashdata('success', 'Data karyawan berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Data karyawan gagal diperbarui.');
        }
    
        redirect('karyawan');
    }
    
    public function hapus($id)
    {
        $delete = $this->Karyawan_model->delete($id);
    
        if ($delete) {
            $this->session->set_flashdata('success', 'Data karyawan berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data karyawan gagal dihapus.');
        }
    
        redirect('karyawan');
    }
    
}
