<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {
  

  public function filter_laporan($tgl_mulai, $tgl_akhir){
    // Tambahkan satu hari pada tanggal akhir
    $tgl_akhir = date('Y-m-d', strtotime($tgl_akhir . ' +1 day'));
    
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen', 'left');
    $this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket', 'left');
    //$this->db->where('transaksi.tgl_masuk >=', $tgl_mulai);
    // $this->db->where('transaksi.tgl_masuk <=', $tgl_akhir);
    $this->db->where("transaksi.tgl_masuk BETWEEN '$tgl_mulai' AND '$tgl_akhir'");
    $result =  $this->db->get()->result();
    return $result;
  }



}