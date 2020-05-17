<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }

    public function index()
    {
        $this->load->view('user/landing_test');
    }

    public function getAkses()
    {
        $id = $this->input->post('id');
        $dataTipe = $this->home_model->getAkses($id);
        echo json_encode($dataTipe);
    }

    public function getMaps()
    {
        $id = $this->input->post('id');
        $dataTipe = $this->home_model->getMaps($id);
        echo json_encode($dataTipe);
    }

    public function home()
    {
        $data['galeri'] = $this->home_model->getGaleri();
        $data['tiket'] = $this->home_model->getTiket();
        $data['guest'] = $this->gs_model->getGuest();
        $data['konten'] = $this->home_model->getKonten();
        $data['sponsor'] = $this->home_model->getSponsor();
        $data['jadwal'] = $this->home_model->getJadwal();
        $data['faq'] = $this->home_model->getFaq();
        $data['kelas'] = $this->home_model->getKelasTiket();
        $this->load->view('template', $data);
    }

    public function add_item()
    {
        if(!isset($_SESSION['logged_in'])){
            redirect('index.php/log/login','refresh');
        } else {
            $qty = $this->input->post('qty');
            $id = $this->input->post('id_akses');
            $tiket = $this->home_model->getTiketCart($id);
            $event = $this->input->post('event');

            $data = array(
                'id'      => $id,
                'qty'     => $qty,
                'price'   => $tiket->harga,
                'name'    => $tiket->kelas,
                'akses'   => $tiket->akses,
                'event'   => $event,
            );
            if ($tiket->stok > 0 && $tiket->stok > $qty ) {
              $this->cart->insert($data);
            }
            else {
              redirect('index.php/home/home');
            }
        }
        redirect('index.php/user/checkout','refresh');
    }

    public function plusQty($id)
    {
        $tiket = $this->home_model->getTiketCart($id);
        $event = $this->input->post('event');
        $data = array(
            'id'      => $id,
            'qty'     => 1,
            'price'   => $tiket->harga,
            'name'    => $tiket->kelas,
            'akses'   => $tiket->akses,
            'event'   => $tiket->id_event,
        );

        $this->cart->insert($data);
        redirect('index.php/user/checkout','refresh');
    }

    public function minQty($id)
    {
        $tiket = $this->home_model->getTiketCart($id);
        $event = $this->input->post('event');
        $data = array(
            'id'      => $id,
            'qty'     => -1,
            'price'   => $tiket->harga,
            'name'    => $tiket->kelas,
            'akses'   => $tiket->akses,
            'event'   => $tiket->id_event,
        );

        $this->cart->insert($data);
        redirect('index.php/user/checkout','refresh');
    }

    public function pesan()
      {
          $this->form_validation->set_rules('id_user', 'id_user', 'trim|required');

          if ($this->form_validation->run() == TRUE) {
              $this->home_model->pesan();
              $this->cart->destroy();

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
              $email = $this->session->userdata('email');
              $this->email->to($email);

              $this->email->subject('Konfirmasi Pembelian');
              $this->email->message("Terima kasih sudah membeli tiket melalui website kami, Lakukan pembayaran dan dapatkan e -tiket anda");

              $this->email->send();


              $this->session->set_flashdata('terbeli','<div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">�</span></button>
              <i class="fa fa-check-circle"></i> Berhasil membeli tiket!
              </div>');
              redirect('index.php/user/profil','refresh');
          } else {
              $this->session->set_flashdata('gagal_pesan', 'Pesanan Gagal Dibuat');
              redirect('index.php/user/checkout','refresh');
          }
      }

    public function hapusCart()
    {
        $this->cart->destroy();
        redirect('index.php/user/checkout','refresh');
    }

}

/* End of file home.php */
