<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $data=$this->db->get_where('admin',['email'=>$this->session->userdata('email')])->row_array();
        if(!isset($data)){
            redirect('log/login');
        }
    }

	public function index()
	{
		$data['data']=$this->db->get_where('admin',['email'=>
		$this->session->userdata('email')])->row_array();
        //nama
        $data['transaksi']=$this->admin->get_transaksi();
        $data['konten']='admin/transaksi_masuk';
		$this->load->view('template_admin',$data);
    }

    public function update(){
        $this->load->model('admin_model','admin');
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $this->admin->update_transaksi($id,$status);
				$config = [
				'mailtype'  => 'html',
				'charset'   => 'utf-8',
				'protocol'  => 'smtp',
				'smtp_host' => 'sejayacorp.com',
				'smtp_user' => 'admin@sejayacorp.com',  // Email gmail
				'smtp_pass'   => 'Synchronize88#',  // Password gmail
				'smtp_crypto' => 'ssl',
				'smtp_port'   => 465,
				'crlf'    => "\r\n",
				'newline' => "\r\n"
		];


				$this->load->library('email', $config);

				$this->email->set_newline("\n\n");

				$this->email->from('admin@sejayacorp.com', 'Sejaya Corp');
				$email = $this->input->post('email');
				$this->email->to($email);

				$this->email->subject('Pembelian Berhasil');
				$this->email->message("Terima kasih sudah membeli tiket melalui website kami, Download tiket anda pada halaman Profile.");

				$this->email->send();


				$this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">�</span></button>
				<i class="fa fa-check-circle"></i> Berhasil membeli tiket!
				</div>');

                redirect('index.php/admin/transaksi');
    }


}
