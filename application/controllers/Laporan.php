<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __CONSTRUCT() {
        parent::__CONSTRUCT();
        $this->load->model('user/tiket','tiket');

    }

	public function index($id){
        $data['tiket']=$this->tiket->index($id);
        $data['detail_tiket']=$this->tiket->detail($id);
        $data['data_tiket']=$this->tiket->data($id);
        $data['event']=$this->tiket->event($id);
        $this->load->library('Mypdf');
        $this->mypdf->generate('tiket_pdf',$data);
    }
}
