<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->model('login_model');
  }

  public function index(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $this->login_model->proses_login($username, $password);
  }

  public function logout(){
    // $this->session->sess_destroy();
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('password');
    redirect('panel');
  }





}