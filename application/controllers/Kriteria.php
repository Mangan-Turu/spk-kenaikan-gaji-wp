<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Kriteria_model');
        $this->load->model('Kriteria_sub_model');
    }

    public function index()
    {
        $kriteria_sub = $this->Kriteria_sub_model->get_all();
        $grouped = [];
        foreach ($kriteria_sub as $item) {
            $id = $item['kriteria_id'];
            if (!isset($grouped[$id])) {
                $grouped[$id] = [
                    'id' => $item['id'],
                    'kode' => $item['kode'],
                    'nama' => $item['nama'],
                    'nilai' => []
                ];
            }
            $grouped[$id]['nilai'][$item['nilai']] = $item['deskripsi'];
        }

        $data['kriteria_sub'] = $grouped;
        $data['kriteria'] = $this->Kriteria_model->get_all();
        $data['kriteria_options'] = $this->Kriteria_sub_model->getOption();

        $data['contents'] = $this->load->view('kriteria_view', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }

    public function edit($id)
    {
        $data['page_title'] = 'Edit Kriteria';
        $data['kriteria'] = $this->Kriteria_model->get_by_id($id);

        if (!$data['kriteria']) {
            show_404();
        }

        $data['contents'] = $this->load->view('kriteria_edit', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }

    public function tambah()
    {
        $data = [
            'kode'      => $this->input->post('kode'),
            'nama'      => $this->input->post('nama'),
            'atribut'   => $this->input->post('atribut'),
            'bobot'     => $this->input->post('bobot'),      
        ];
    
        $insert = $this->Kriteria_model->insert($data);
    
        if ($insert) {
            $this->session->set_flashdata('success', 'Data Kriteria berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Data Kriteria gagal ditambahkan.');
        }
    
        redirect('kriteria');
    }
    
    public function update($id)
    {
        $data = [
            'kode'      => $this->input->post('kode'),
            'nama'      => $this->input->post('nama'),
            'atribut'   => $this->input->post('atribut'),
            'bobot'     => $this->input->post('bobot'),           
        ];
    
        $update = $this->Kriteria_model->update($id, $data);
    
        if ($update) {
            $this->session->set_flashdata('success', 'Data Kriteria berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Data Kriteria gagal diperbarui.');
        }
    
        redirect('kriteria');
    }
    
    public function hapus($id)
    {
        $delete = $this->Kriteria_model->delete($id);
    
        if ($delete) {
            $this->session->set_flashdata('success', 'Data Kriteria berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data Kriteria gagal dihapus.');
        }
    
        redirect('kriteria');
    }

    public function edit_sub($id)
    {
        $data['page_title'] = 'Edit Kriteria';
        $data['kriteria'] = $this->Kriteria_sub_model->get_by_id($id);
        $data['kriteria_options'] = $this->Kriteria_sub_model->getOption();

        if (!$data['kriteria']) {
            show_404();
        }

        $data['contents'] = $this->load->view('sub_kriteria_edit', $data, true);
        $this->load->view('templates/admin_templates', $data);
    }

    public function tambah_sub()
    {
        $data = [
            'kriteria_id'   => $this->input->post('kriteria_id'),
            'nilai'         => $this->input->post('nilai'),
            'deskripsi'     => $this->input->post('deskripsi'),
        ];
    
        $insert = $this->Kriteria_sub_model->insert($data);
    
        if ($insert) {
            $this->session->set_flashdata('success', 'Data Kriteria berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Data Kriteria gagal ditambahkan.');
        }
    
        redirect('kriteria');
    }
    
    public function update_sub($id)
    {
        $data = [
            'kriteria_id'   => $this->input->post('kriteria_id'),
            'nilai'         => $this->input->post('nilai'),
            'deskripsi'     => $this->input->post('deskripsi'),         
        ];
    
        $update = $this->Kriteria_sub_model->update($id, $data);
    
        if ($update) {
            $this->session->set_flashdata('success', 'Data Kriteria berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Data Kriteria gagal diperbarui.');
        }
    
        redirect('kriteria');
    }
    
    public function hapus_sub($id)
    {
        $delete = $this->Kriteria_sub_model->delete($id);
    
        if ($delete) {
            $this->session->set_flashdata('success', 'Data Kriteria berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data Kriteria gagal dihapus.');
        }
    
        redirect('kriteria');
    }
}
