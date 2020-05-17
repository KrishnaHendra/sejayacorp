<?php
/**
 *
 */
class talent_detail extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('dj_model');
  }
  public function index($id_dj)
  {

    $data['dj'] = $this->dj_model->get_dj_detail($id_dj);
    $this->load->view('user/talent_detail', $data);
  }
  public function show($id_dj)
  {
    $data['deje'] = $this->dj_model->show($id_dj);
    $this->load->view('user/talent_detail',$data);
  }
}
