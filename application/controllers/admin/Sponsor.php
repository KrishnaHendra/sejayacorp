<?php
/**
 *
 */
class sponsor extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $data=$this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
        if(!isset($data)){
            redirect('index.php/log/login');
        }
        $this->load->model('admin/sponsor_model');
  }
  public function index()
  {
    $data['data']=$this->db->get_where('admin',['email'=>
        $this->session->userdata('email')])->row_array();
        $data['konten'] = 'admin/data_sponsor';
        $data['sponsor'] = $this->sponsor_model->get_sponsor();
        $this->load->view('template_admin', $data);
  }
  public function tambah()
  {
    $data = array();

    if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
        // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
        $upload = $this->sponsor_model->upload();


        if($upload['result'] == "success"){ // Jika proses upload sukses
             // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
            $this->sponsor_model->save($upload);

            redirect('index.php/admin/sponsor'); // Redirect kembali ke halaman awal / halaman view data
        }else{ // Jika proses upload gagal
            $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
        }
    }
  }

  public function delete($id_sponsor)
  {
    $this->sponsor_model->delete($id_sponsor);
    redirect('index.php/admin/sponsor');
  }
}
