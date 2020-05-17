<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class data_event extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$data=$this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
        if(!isset($data)){
            redirect('index.php/log/login');
        }
				$this->load->model('event_model');
	}

	public function index(){

		$data['data']=$this->db->get_where('admin',['email'=>
        $this->session->userdata('email')])->row_array();
        $data['konten'] = 'admin/data_event';
        $data['event'] = $this->event_model->get_event();
        $this->load->view('template_admin', $data);
	}
  public function show()
  {
    $status = $this->input->post('status');
    $data['konten'] = 'admin/data_event';
    $data['event'] = $this->event_model->show($status);
    $this->load->view('template_admin', $data);
  }

	public function tambah(){

        $data = array();

        if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
            // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
            $upload = $this->guest_star_model->upload();


            if($upload['result'] == "success"){ // Jika proses upload sukses
                 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
                $this->guest_star_model->save($upload);

                redirect('index.php/admin/guest_star'); // Redirect kembali ke halaman awal / halaman view data
            }else{ // Jika proses upload gagal
                $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        }

}
// public function delete($id_dj)
// {
// 	$this->dj_model->delete($id_dj);
// 	redirect('index.php/admin/dj');
//
// }

}

/* End of file guest_star.php */
