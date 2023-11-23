<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('dashboard_model');
  }

  public function index(){

    $this->security_model->getSecurity();

    $data['content'] = 'backend/home';
    $data['title'] = 'Laundry Online';
    $data['total_konsumen'] = $this->dashboard_model->total_konsumen();
    $data['transaksi_baru'] = $this->dashboard_model->transaksi_baru();
    $data['total_transaksi'] = $this->dashboard_model->total_transaksi();
    $this->load->view('backend/dashboard', $data);
  }



}