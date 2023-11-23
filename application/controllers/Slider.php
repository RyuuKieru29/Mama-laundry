<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('slider_model');
  }

  public function index(){
    $data['content'] = 'backend/slider/slider';
    $data['title'] = 'Daftar Slider';
    $data['slider'] = $this->slider_model->getSlider();
    // var_dump($data['slider']);
    $this->load->view('backend/dashboard', $data);
  }

  public function tambah(){
    $data['content'] = 'backend/slider/tambah_slider';
    $data['title'] = 'Form Daftar Slider';
    $this->load->view('backend/dashboard', $data);
  }
  
  public function simpan(){
    $config['upload_path'] = 'assets/images/slider';
    $config['allowed_types'] = 'jpg|png';
    $config['max_size'] = '2048';
    $this->load->library('upload', $config);
    $this->upload->do_upload('gambar_slider');
    $file_name = $this->upload->data();
    
    $data = array(
      'judul_slider' => $this->input->post('judul_slider'),
      'deskripsi_slider' => $this->input->post('deskripsi_slider'),
      'gambar_slider' => $file_name['file_name'],
      'status_slider' => $this->input->post('status_slider'),
    );

    $query = $this->db->insert('slider', $data);
    if($query = true){
      $this->session->set_flashdata('info', 'Data berhasil disimpan');
      redirect('slider', 'refresh');
    }
  }

  public function edit($id_slider){
    $data['content'] = 'backend/slider/edit_slider';
    $data['title'] = 'Form Edit Slider';
    $data['slider'] = $this->slider_model->edit_slider($id_slider);
    $this->load->view('backend/dashboard', $data);
  }

  public function update(){
    $id_slider = $this->input->post('id_slider');
    $config['upload_path'] = 'assets/images/slider';
    $config['allowed_types'] = 'jpg|png';
    $config['max_size'] = '2048';

    $this->load->library('upload', $config);

    if(!empty($_FILES['gambar_slider']['name'])){
      $this->upload->do_upload('gambar_slider');
      $upload = $this->upload->data();
      $gambar = $upload['file_name'];

      $data = array(
        'gambar_slider' => $gambar,
        'judul_slider' => $this->input->post('judul_slider'),
        'deskripsi_slider' => $this->input->post('deskripsi_slider'),
        'status_slider' => $this->input->post('status_slider'),
      );
      $id = $this->db->get_where('slider', ['id_slider' => $id_slider])->row();
      $query = $this->slider_model->update($id_slider, $data);

      if($query = true){
        $this->session->set_flashdata('info', 'Data berhasil di update');
        unlink('assets/images/slider/'. $id->gambar_slider);
        redirect('slider', 'refresh');
      }
    }
    else{
      $data = array(
        'judul_slider' => $this->input->post('judul_slider'),
        'deskripsi_slider' => $this->input->post('deskripsi_slider'),
        'status_slider' => $this->input->post('status_slider'),
      );
      $query = $this->slider_model->update($id_slider, $data);

      if($query = true){
        $this->session->set_flashdata('info', 'Data berhasil di update');
        redirect('slider', 'refresh');
      }
    }
  }

  public function delete($id_slider){
    $id = $this->db->get_where('slider', ['id_slider' => $id_slider])->row();
    $this->db->where('id_slider', $id_slider);
    $query = $this->db->delete('slider');

    if($query = true){
      unlink('assets/images/slider/'. $id->gambar_slider);
      $this->session->set_flashdata('info', 'Data berhasil dihapus');
      redirect('slider', 'refresh');
    }
  }


}