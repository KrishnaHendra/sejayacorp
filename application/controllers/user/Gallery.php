<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class gallery extends CI_Controller {

    function __construct()
    {
      parent::__construct();
      $this->load->model('admin/galeri_model');
    }
    public function index()
    {
        $data['gambar'] = $this->galeri_model->show_galeri();
        $data['event'] = $this->galeri_model->show_event();
        $data['guest'] = $this->galeri_model->show_guest();
        $this->load->view('user/detail_gallery', $data);
    }

}

/* End of file gallery.php */
