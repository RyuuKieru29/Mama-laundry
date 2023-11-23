<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_model extends CI_Model {

  public function generate_kode(){
    $this->db->select('RIGHT(paket.kode_paket, 3) as kode');
    $this->db->order_by('kode_paket', 'desc');
    $this->db->limit(1);
    $query = $this->db->get('paket');

    if($query->num_rows() > 0){
      $data = $query->row();
      $kode = intval($data->kode) + 1;
    }
    else{
      $kode = 1;
    }

    $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
    $kode = "PK".$kodemax;
    return $kode;
  }

  public function getAllData(){
    $result = $this->db->get('paket')->result();
    return $result;
  }

  public function edit($id){
    $this->db->select('*');
    $this->db->from('paket');
    $this->db->where('kode_paket', $id);
    return $this->db->get()->row_array();
  }

  public function update($kode_paket, $data){
    $this->db->where('kode_paket', $kode_paket);
    $this->db->update('paket', $data);
  }

  public function delete($id){
    $this->db->where('kode_paket', $id);
    $this->db->delete('paket');
  }


}