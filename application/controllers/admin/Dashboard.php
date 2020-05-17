
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $data=$this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
        if(!isset($data)){
            redirect('index.php/log/login');
        }
    }

	public function index()
	{
        //nama
        $data['konten']='admin/dashboard';
        $this->load->view('template_admin',$data);

	}
}
