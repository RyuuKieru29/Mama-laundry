<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->model('transaksi_model');
  }

  public function tambah(){
    $data['content'] = 'backend/transaksi/tambah_transaksi';
    $data['title'] = 'Form Tambah Transaksi';
    $data['konsumen'] = $this->db->get('konsumen')->result();
    $data['paket'] = $this->db->get('paket')->result();
    $data['kode_transaksi'] = $this->transaksi_model->generate_kode();
    $this->load->view('backend/dashboard', $data);
  }

  public function getHargaPaket(){
    $kode_paket = $this->input->post('kode_paket');
    $data = $this->transaksi_model->getHargaPaket($kode_paket);
    echo json_encode($data);
  }

  public function getNamaKonsumen(){
    $kode_konsumen = $this->input->post('kode_konsumen');
    $data = $this->transaksi_model->getNamaKonsumen($kode_konsumen);
    echo json_encode($data);
  }

  public function simpan(){
    $data = array(
      'kode_transaksi' => $this->input->post('kode_transaksi'),
      'kode_konsumen' => $this->input->post('kode_konsumen'),
      'kode_paket' => $this->input->post('kode_paket'),
      'tgl_masuk' => $this->input->post('tgl_masuk'),
      'tgl_ambil' => '',
      'berat' => $this->input->post('berat'),
      'grand_total' => $this->input->post('grand_total'),
      'bayar' => $this->input->post('bayar'),
      'status' => $this->input->post('status'),
    );
    $query = $this->db->insert('transaksi', $data);

    if($query = true){
      $this->session->set_flashdata('info', 'Data transaksi berhasil disimpan');
      redirect('transaksi/tambah', 'refresh');
    }
  }

  public function riwayat(){
    $data['content'] = 'backend/transaksi/riwayat_transaksi';
    $data['title'] = 'Riwayat Transaksi';
    $data['transaksi'] = $this->transaksi_model->getAllRiwayat();
    $this->load->view('backend/dashboard', $data);
  }

  public function update_status(){
    $kode_transaksi = $this->input->post('kt');
    $status = $this->input->post('stt');
    $tgl_ambil = date('Y-m-d h:i:s');
    $status_bayar = 'Lunas';

    if($status == "Baru" OR $status == "Proses"){
      $this->transaksi_model->update_status($kode_transaksi, $status);
    }
    else{
      $this->transaksi_model->update_status1($kode_transaksi, $status, $tgl_ambil, $status_bayar);
    }
  }

  public function edit($kode_transaksi){
    $data['content'] = 'backend/transaksi/edit_transaksi';
    $data['title'] = 'Form Edit Transaksi';
    $data['transaksi'] = $this->transaksi_model->edit($kode_transaksi);
    $data['konsumen'] = $this->db->get('konsumen')->result();
    $data['paket'] = $this->db->get('paket')->result();
    $this->load->view('backend/dashboard', $data);
  }

  public function update(){
    $kode_transaksi = $this->input->post('kode_transaksi');
    $data = array(
      'kode_transaksi' => $this->input->post('kode_transaksi'),
      'kode_konsumen'  => $this->input->post('kode_konsumen'),
      'kode_paket'     => $this->input->post('kode_paket'),
      'tgl_masuk'      => $this->input->post('tgl_masuk'),
      'tgl_ambil'      => '',
      'berat'          => $this->input->post('berat'),
      'grand_total'    => $this->input->post('grand_total'),
      'bayar'          => $this->input->post('bayar'),
      'status'         => $this->input->post('status'),
    );
    $query = $this->transaksi_model->update($kode_transaksi, $data);

    if($query = true){
      $this->session->set_flashdata('info', 'Data transaksi berhasil disimpan');
      redirect('transaksi/riwayat', 'refresh');
    }
  }

  public function detail($kode_transaksi){
    $this->load->library('dompdf_gen');
    $data['transaksi'] = $this->transaksi_model->detail($kode_transaksi);
    // var_dump($data['transaksi']);
    $this->load->view('backend/transaksi/detail_transaksi', $data);

    $paper_size = 'A5';
    $orientation = 'landscape';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    ob_end_clean();
    $this->dompdf->stream("Detail Transaksi", array('Attachment' => 0));
  }




}