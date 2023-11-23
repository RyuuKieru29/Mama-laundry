<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

  public function proses_login($username, $password){
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $query = $this->db->get('users');

    if($query->num_rows() > 0){
      foreach($query->result() as $row){
        $data = array(
          'id_user' => $row->id_user,
          'username' => $row->username,
          'password' => $row->password,
        );
        $this->session->set_userdata($data);
      }
      redirect('dashboard');
    }
    else{
      $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Login gagal, silahkan periksa username dan password anda!</div>');
      redirect('panel');
    }
  }

}