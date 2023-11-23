<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->model('paket_model');
  }

  public function index(){
    $data['content'] = 'backend/paket/paket';
    $data['title'] = 'Data Paket';
    $data['paket'] = $this->paket_model->getAllData();
    $this->load->view('backend/dashboard', $data);
  }

  public function tambah(){
    $data['content'] = 'backend/paket/tambah_paket';
    $data['title'] = 'Form Tambah Paket';
    $data['kode_paket'] = $this->paket_model->generate_kode();
    $this->load->view('backend/dashboard', $data);
  }

  public function simpan(){
    $data = array(
      'kode_paket' => $this->input->post('kode_paket'),
      'nama_paket' => $this->input->post('nama_paket'),
      'harga_paket' => $this->input->post('harga_paket'),
    );
    $query = $this->db->insert('paket', $data);

    if($query = true){
      $this->session->set_flashdata('info', 'Data paket berhasil disimpan');
      redirect('paket');
    }
  }

  public function edit($id){
    $data['content'] = 'backend/paket/edit_paket';
    $data['title'] = 'Edit Paket';
    $data['paket'] = $this->paket_model->edit($id);
    $this->load->view('backend/dashboard', $data);
  }

  public function update(){
    $kode_paket = $this->input->post('kode_paket');
    $data = array(
      'kode_paket' => $this->input->post('kode_paket'),
      'nama_paket' => $this->input->post('nama_paket'),
      'harga_paket' => $this->input->post('harga_paket'),
    );
    $query = $this->paket_model->update($kode_paket, $data);

    if($query = true){
      $this->session->set_flashdata('info', 'Data berhasil diubah');
      redirect('paket');
    }
  }

  public function delete($id){
    $query = $this->paket_model->delete($id);

    if($query = true){
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
      redirect('paket');
    }
  }



}