<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

    public function getSlider(){
      $result = $this->db->get('slider')->result();
      return $result;
    }

    public function edit_slider($id_slider){
      $this->db->where('id_slider', $id_slider);
      return $this->db->get('slider')->row_array();
    }

    public function update($id_slider, $data){
      $this->db->where('id_slider', $id_slider);
      $this->db->update('slider', $data);
    }



}