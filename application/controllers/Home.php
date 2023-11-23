<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function index(){
    $data['slider'] = $this->db->get('slider')->result();
    $data['about'] = $this->db->get('about')->result();
    $data['paket'] = $this->db->get('paket')->result();
    // var_dump($data['paket']);
    $this->load->view('frontend/header', $data);
    $this->load->view('frontend/home', $data);
    $this->load->view('frontend/footer');
  }




}