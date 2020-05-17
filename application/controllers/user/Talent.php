<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class talent extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->model('dj_model');
  }

    public function index()
    {
        $data['faq'] = $this->home_model->getFaq();
        $data['dj'] = $this->dj_model->get_dj();
        $this->load->view('user/talent', $data);
      }
      public function show_malang()
      {
        $data['faq'] = $this->home_model->getFaq();
        $data['dj'] = $this->dj_model->show_malang();
        $this->load->view('user/talent', $data);
      }
      public function show_jember()
      {
        $data['faq'] = $this->home_model->getFaq();
        $data['dj'] = $this->dj_model->show_jember();
        $this->load->view('user/talent', $data);
    }

}

/* End of file talent.php */
