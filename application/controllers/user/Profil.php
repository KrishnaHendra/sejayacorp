<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class profil extends CI_Controller {

    public function index()
    {
        $data['transaksi'] = $this->home_model->getHistoryPesan();
        $this->load->view('user/profil', $data);
    }
    public function upload_bukti($id)
    {
      $config['upload_path'] = './assets/images/bukti';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['bukti_transfer']['name'];

      $path = './assets/picture/';
      $this->upload->initialize($config);
      $this->upload->do_upload('bukti_transfer');
      $gambar = $this->upload->data();
      $this->home_model->upload_bukti($gambar, $id);
      $this->session->set_flashdata('hijau', 'Berhasil ubah data');
      redirect('index.php/user/profil');

    }

}

/* End of file profil.php */
