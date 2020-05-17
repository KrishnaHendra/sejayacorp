<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class guest_star extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$data=$this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
        if(!isset($data)){
            redirect('log/login');
        }
	}

	public function index(){

		$data['data']=$this->db->get_where('admin',['email'=>
		$this->session->userdata('email')])->row_array();

		$data['konten'] = 'admin/data_gs';
		$data['guest'] = $this->gs_model->get_guest();
		$data['event'] = $this->gs_model->get_event();

		//get_kategori untuk dropdown tambah/edit buku
		$this->load->view('template_admin', $data);

	}

	public function show()
	{
		$data['data']=$this->db->get_where('admin',['email'=>
		$this->session->userdata('email')])->row_array();

		$data['konten'] = 'admin/data_gs';
		$show = $this->input->post('show');
		$data['guest'] = $this->gs_model->show($show);
		$data['event'] = $this->gs_model->get_event();

		//get_kategori untuk dropdown tambah/edit buku
		$this->load->view('template_admin', $data);
	}

	public function tambah(){

			$data = array();

			if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
				// lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
				$upload = $this->gs_model->upload();

				if($upload['result'] == "success"){ // Jika proses upload sukses
					 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
					$this->gs_model->save($upload);

					redirect('index.php/admin/guest_star'); // Redirect kembali ke halaman awal / halaman view data
				}else{ // Jika proses upload gagal
					$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
				}
			}

	}

	public function delete($id_guest){

			$this->gs_model->delete($id_guest);
			$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			<i class="fa fa-check-circle"></i> Guest Star Berhasil Dihapus
			</div>');
			redirect('index.php/admin/guest_star/');
	}

	public function get_data($id)
	{

			$data = $this->gs_model->get_data($id);
			echo json_encode($data);

	}

}

/* End of file guest_star.php */
