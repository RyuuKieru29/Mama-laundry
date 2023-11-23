<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen_model extends CI_Model {

  public function __construct(){
    parent::__construct();
    
    if(empty($this->session->userdata('username'))){
      redirect('panel');
    }

  }

  public function generate_kode(){
    $this->db->select('RIGHT(konsumen.kode_konsumen, 3) as kode');
    $this->db->order_by('kode_konsumen', 'desc');
    $this->db->limit(1);
    $query = $this->db->get('konsumen');

    if($query->num_rows() > 0){
      $data = $query->row();
      $kode = intval($data->kode) + 1;
    }
    else{
      $kode = 1;
    }

    $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
    $kode = "K".$kodemax;
    return $kode;
  }

  public function getAllData(){
    $result = $this->db->get('konsumen')->result();
    return $result;
  }

  public function edit($id){
    $this->db->select('*');
    $this->db->from('konsumen');
    $this->db->where('kode_konsumen', $id);
    return $this->db->get()->row_array();
  }

  public function update($kode_konsumen, $data){
    $this->db->where('kode_konsumen', $kode_konsumen);
    $this->db->update('konsumen', $data);
  }

  public function delete($id){
    $this->db->where('kode_konsumen', $id);
    $this->db->delete('konsumen');
  }



}