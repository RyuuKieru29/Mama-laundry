<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_laundry_model extends CI_Model {

  public function cek_status($kode_transaksi){
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('konsumen', 'transaksi.kode_konsumen = konsumen.kode_konsumen');
    $this->db->join('paket', 'transaksi.kode_paket = paket.kode_paket');
    $this->db->where('transaksi.kode_transaksi', $kode_transaksi);
    return $this->db->get()->result();
  }





}