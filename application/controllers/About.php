<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('about_model');
  }

  public function index(){
    $data['content'] = 'backend/about/about';
    $data['title'] = 'Data About';
    $data['about'] = $this->db->get('about')->result();
    // var_dump($data['about']);
    $this->load->view('backend/dashboard', $data);
  }

  public function tambah(){
    $data['content'] = 'backend/about/tambah_about';
    $data['title'] = 'Form Data About';
    $this->load->view('backend/dashboard', $data);
  }

  public function simpan(){
    $config['upload_path'] = 'assets/images/about';
    $config['allowed_types'] = 'jpg|png';
    $config['max_size'] = '2048';
    $this->load->library('upload', $config);
    $this->upload->do_upload('gambar_about');
    $file_name = $this->upload->data();
    
    $data = array(
      'judul_about' => $this->input->post('judul_about'),
      'deskripsi_about' => $this->input->post('deskripsi_about'),
      'gambar_about' => $file_name['file_name'],
    );

    $query = $this->db->insert('about', $data);
    if($query = true){
      $this->session->set_flashdata('info', 'Data berhasil disimpan');
      redirect('about', 'refresh');
    }
  }

  public function edit($id_about){
    $data['content'] = 'backend/about/edit_about';
    $data['title'] = 'Form Edit About';
    $data['about'] = $this->about_model->edit_about($id_about);
    $this->load->view('backend/dashboard', $data);
  }

  public function update(){
    $id_about = $this->input->post('id_about');
    $config['upload_path'] = 'assets/images/about';
    $config['allowed_types'] = 'jpg|png';
    $config['max_size'] = '2048';

    $this->load->library('upload', $config);

    if(!empty($_FILES['gambar_about']['name'])){
      $this->upload->do_upload('gambar_about');
      $upload = $this->upload->data();
      $gambar = $upload['file_name'];

      $data = array(
        'gambar_about' => $gambar,
        'judul_about' => $this->input->post('judul_about'),
        'deskripsi_about' => $this->input->post('deskripsi_about'),
      );
      $id = $this->db->get_where('about', ['id_about' => $id_about])->row();
      $query = $this->about_model->update($id_about, $data);

      if($query = true){
        $this->session->set_flashdata('info', 'Data berhasil di update');
        unlink('assets/images/about/'. $id->gambar_about);
        redirect('about', 'refresh');
      }
    }
    else{
      $data = array(
        'judul_about' => $this->input->post('judul_about'),
        'deskripsi_about' => $this->input->post('deskripsi_about'),
      );
      $query = $this->about_model->update($id_about, $data);

      if($query = true){
        $this->session->set_flashdata('info', 'Data berhasil di update');
        redirect('about', 'refresh');
      }
    }
  }

  public function delete($id_about){
    $id = $this->db->get_where('about', ['id_about' => $id_about])->row();
    $this->db->where('id_about', $id_about);
    $query = $this->db->delete('about');

    if($query = true){
      unlink('assets/images/about/'. $id->gambar_about);
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
      redirect('about', 'refresh');
    }
  }






}