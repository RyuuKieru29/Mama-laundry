<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('laporan_model');
    $this->load->helper('tglIndo_helper');
  }

  public function index(){
    $data['content'] = 'backend/laporan/laporan';
    $data['title'] = 'Laporan Transaksi';
    $this->load->view('backend/dashboard', $data);
  }

  public function cetak_laporan(){
    $this->load->library('dompdf_gen');
    $tgl_mulai = $this->input->post('tgl_mulai');
    $tgl_akhir = $this->input->post('tgl_akhir');
    $data['laporan'] = $this->laporan_model->filter_laporan($tgl_mulai, $tgl_akhir);
    $this->session->set_userdata('tgl_mulai', $tgl_mulai);
    $this->session->set_userdata('tgl_akhir', $tgl_akhir);
    $this->load->view('backend/laporan/cetak_laporan', $data);

    $paper_size = 'A4';
    $orientation = 'landscape';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("Laporan Transaksi", array('Attachment' => 0));

  }


}