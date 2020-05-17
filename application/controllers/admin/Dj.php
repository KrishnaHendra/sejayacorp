<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dj extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$data=$this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
        if(!isset($data)){
            redirect('index.php/log/login');
        }
	}

	public function index(){

		$data['data']=$this->db->get_where('admin',['email'=>
        $this->session->userdata('email')])->row_array();

        $data['konten'] = 'admin/dj';
		$data['dj'] = $this->dj_model->get_dj();

        //get_kategori untuk dropdown tambah/edit buku
        $this->load->view('template_admin', $data);

	}

	public function tambah(){

        $data = array();

        if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
            // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
            $upload = $this->dj_model->upload();


            if($upload['result'] == "success"){ // Jika proses upload sukses
                 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
                $this->dj_model->save($upload);

                redirect('index.php/admin/dj'); // Redirect kembali ke halaman awal / halaman view data
            }else{ // Jika proses upload gagal
                $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        }

}
function delete($id_dj)
{
	$this->dj_model->delete($id_dj);
	redirect('index.php/admin/dj');
}



}
