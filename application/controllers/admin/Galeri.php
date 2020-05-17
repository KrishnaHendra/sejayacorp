<?php
/**
 *
 */
class galeri extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $data=$this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
        if(!isset($data)){
            redirect('index.php/log/login');
        }
        $this->load->model('admin/galeri_model');
  }
  public function index()
  {
    $data['data']=$this->db->get_where('admin',['email'=>
        $this->session->userdata('email')])->row_array();
        $data['konten'] = 'admin/data_galeri';
        $data['galeri'] = $this->galeri_model->get_galeri();
        $data['event'] = $this->galeri_model->get_event();
        //get_kategori untuk dropdown tambah/edit buku
        $this->load->view('template_admin', $data);
  }
  public function show()
  {
    $data['data']=$this->db->get_where('admin',['email'=>
        $this->session->userdata('email')])->row_array();
        $data['konten'] = 'admin/data_galeri';
        $id_event = $this->input->post('id_event');
        $data['galeri'] = $this->galeri_model->show($id_event);
        $data['event'] = $this->galeri_model->get_event();
        //get_kategori untuk dropdown tambah/edit buku
        $this->load->view('template_admin', $data);
  }
  public function tambah(){

        $data = array();

        if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
            // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
            $upload = $this->galeri_model->upload();


            if($upload['result'] == "success"){ // Jika proses upload sukses
                 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
                $this->galeri_model->save($upload);

                redirect('index.php/admin/galeri'); // Redirect kembali ke halaman awal / halaman view data
            }else{ // Jika proses upload gagal
                $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        }

}
public function delete($id_galeri)
{
  $this->galeri_model->delete($id_galeri);
  redirect('index.php/admin/galeri');
}
}
