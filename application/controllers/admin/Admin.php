<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$data=$this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
        if(!isset($data)){
            redirect('log/login');
        }
	}

	public function index()
	{
		$data['data']=$this->db->get_where('admin',['email'=>
		$this->session->userdata('email')])->row_array();
		//nama
		$data['admin']=$this->admin->show_admin()->result();
		$data['konten']='admin/data_admin';
		$this->load->view('template_admin',$data);
	}

	public function add_admin(){
		$this->admin->add_admin();
		$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		<i class="fa fa-check-circle"></i> <strong>Akun Admin Baru Berhasil Dibuat</strong>
		</div>');
		redirect('index.php/admin/admin');	
	}

	public function delete_admin($id_admin){
		$this->admin->delete_admin($id_admin);
		$this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
		<i class="fa fa-check-circle"></i> Akun Admin Berhasil Dihapus
		</div>');
		redirect('index.php/admin/admin');
	}

	public function data_gs(){
		$data['data']=$this->db->get_where('admin',['email'=>
		$this->session->userdata('email')])->row_array();
		//nama
		$data['konten']='admin/data_gs';
		$this->load->view('template_admin',$data);
	}

	public function add_gs(){
		  $config = [
			'upload_path' => './assets/images/gs/',
			'allowed_types' => 'gif|jpg|png|jpeg',
			'max_size' => 1000, 'max_width' => 1000,
			'max_height' => 1000
		  ];
		  $this->load->library('upload', $config);
		  if (!$this->upload->do_upload()) //jika gagal upload
		  {
			  $data = array('error' => $this->upload->display_errors()); //tampilkan error
			  $data = 'admin/data_gs';
			  $this->load->view('template_admin', $data);
		  } else
		  //jika berhasil upload
		  {
			  $file = $this->upload->data();
			  //mengambil data di form
			  $data = [
				  'nama' => $this->input->post('nama'),
				  'genre' => $this->input->post('genre'),
				  'gambar' => $file['gambar'],
			      'deskripsi' => $this->input->post('deskripsi')
			 ];
			  $this->admin->input($data); //memasukan data ke database
			  redirect('index.php/admin/data_gs'); //mengalihkan halaman
	
		  }
	}
}
