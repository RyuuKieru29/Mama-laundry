<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

  public function total_konsumen(){
    $result = $this->db->get('konsumen')->num_rows();
    return $result;
  }

  public function transaksi_baru(){
    $this->db->where('status', 'baru');
    $result = $this->db->get('transaksi')->num_rows();
    return $result;
  }

  public function total_transaksi(){
    $result = $this->db->get('transaksi')->num_rows();
    return $result;
  }

}