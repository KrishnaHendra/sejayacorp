<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class tiket extends CI_Controller {


    public function index()
    {
        $data['data']=$this->db->get_where('admin',['email'=>
		$this->session->userdata('email')])->row_array();
		//nama
    $this->load->model('admin/admin_model');
		$data['konten']='admin/tiket';
    $data['tiket'] = $this->admin_model->get_tiket();
    $data['akses'] = $this->admin_model->get_akses();
    $data['event'] = $this->admin_model->get_event();
		$this->load->view('template_admin',$data);
    }
    public function tambah()
    {
      $this->load->model('admin/admin_model');
      $this->admin_model->tambah_tiket();
      redirect('index.php/admin/tiket');
    }
    public function delete_tiket($id_tiket)
    {
      $this->load->model('admin/admin_model');
      $this->admin_model->delete_tiket($id_tiket);
      redirect('index.php/admin/tiket');
    }
    public function delete_akses($id_akses)
    {
      $this->load->model('admin/admin_model');
      $this->admin_model->delete_akses($id_akses);
      redirect('index.php/admin/tiket');
    }
    public function tambah_akses()
    {
      $this->load->model('admin/admin_model');
      $this->admin_model->tambah_akses();
      redirect('index.php/admin/tiket');
    }
}

/* End of file tiket.php */
