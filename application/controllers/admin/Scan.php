<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class scan extends CI_Controller {

    public function index()
    {
        $data['konten'] = 'admin/scan';
		$data['transaksi'] = $this->admin->get_transaksi();
		$this->load->view('template_admin', $data);
    }
    public function update()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $this->admin->update_transaksi($id,$status);
        
        if($status == 'batal')
        {
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

				$this->email->subject('Pembelian Dibatalkan');
				$this->email->message("Pemesanan tiket anda dibatalkan , mohon maaf atas ketidaknyamanannya.");

				$this->email->send();
        }
        
        
        
        redirect('index.php/admin/scan');
    }

}

/* End of file scan.php */
