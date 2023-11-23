<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_laundry extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('cek_laundry_model');
  }

  public function index(){
    $kode_transaksi = $this->input->post('kode_transaksi');
    $data['kode_transaksi'] = $this->cek_laundry_model->cek_status($kode_transaksi);
    $data['slider'] = $this->db->get('slider')->result();
    $this->load->view('frontend/header', $data);
    // var_dump($data['kode_transaksi']);
    $this->load->view('frontend/cek_laundry', $data);
    $this->load->view('frontend/footer');
  }




}