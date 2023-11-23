<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->model('konsumen_model');
  }

  public function index(){
    $data['content'] = 'backend/konsumen/konsumen';
    $data['title'] = 'Data Konsumen';
    $data['konsumen'] = $this->konsumen_model->getAllData();
    $this->load->view('backend/dashboard', $data);
  }
  
  public function tambah(){
    $data['content'] = 'backend/konsumen/tambah_konsumen';
    $data['title'] = 'Form Tambah Konsumen';
    $data['kode_konsumen'] = $this->konsumen_model->generate_kode();
    $this->load->view('backend/dashboard', $data);
  }

  public function simpan(){
    $data = array(
      'kode_konsumen'   => $this->input->post('kode_konsumen'),
      'nama_konsumen'   => $this->input->post('nama_konsumen'),
      'alamat_konsumen' => $this->input->post('alamat_konsumen'),
      'no_telp'         => $this->input->post('no_telp'),
    );
    $query = $this->db->insert('konsumen', $data);

    if($query = true){
      $this->session->set_flashdata('info', 'Data konsumen berhasil disimpan');
      redirect('konsumen');
    }
  }

  public function edit($id){
    $data['content'] = 'backend/konsumen/edit_konsumen';
    $data['title'] = 'Form Ubah Konsumen';
    $data['konsumen'] = $this->konsumen_model->edit($id);
    // var_dump($data['konsumen']);
    // die;
    $this->load->view('backend/dashboard', $data);
  }

  public function update(){
    $kode_konsumen = $this->input->post('kode_konsumen');
    $data = array(
      'kode_konsumen'   => $this->input->post('kode_konsumen'),
      'nama_konsumen'   => $this->input->post('nama_konsumen'),
      'alamat_konsumen' => $this->input->post('alamat_konsumen'),
      'no_telp'         => $this->input->post('no_telp'),
    );
    $query = $this->konsumen_model->update($kode_konsumen, $data);

    if($query = true){
      $this->session->set_flashdata('info', 'Data konsumen berhasil diupdate');
      redirect('konsumen');
    }
  }

  public function delete($id){
    $query = $this->konsumen_model->delete($id);
    
    if($query = true){
      $this->session->set_flashdata('info', 'Data konsumen berhasil dihapus');
      redirect('konsumen');
    }
  }



}