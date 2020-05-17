<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/admin_model','admin');
        $data=$this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
        if(!isset($data)){
            redirect('log/login');
        }
    }
    

    public function index()
    {
        // nama
        $data['member']=$this->admin->data_member();
        $data['title']='Data Member';
        $data['konten']='admin/data_member';
        $this->load->view('template_admin',$data);
    }

    public function cetak(){
        $data['member']=$this->admin->cetak_member();
        $this->load->view('admin/cetak_member',$data);
    }

}

/* End of file Controllername.php */
