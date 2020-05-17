<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    public function index()
	{
        $this->form_validation->set_rules('email','Email','trim|required|valid_email',[
            'required' => 'Email tidak boleh kosong!',
            'valid_email' => 'Email anda tidak benar!'
        ]);
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]',[
            'required' => 'Password tidak boleh kosong!',
            'min_length' => 'Password terlalu pendek!'
        ]);

        if($this->form_validation->run()==FALSE){
            $this->load->view('log/login');
        }else{
            $this->login->proses_login();
        }
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');
        $this->session->set_flashdata('notif','<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <i class="fa fa-check-circle"></i> You Have Been Logged Out!
        </div>');
        session_destroy();
        redirect('index.php/log/login');
    }

    public function banned(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');
        $this->session->set_flashdata('notif','<div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <i class="fa fa-check-circle"></i> <b>Anda tidak bisa masuk ! HUBUNGI ADMIN!</b>
        </div>');
        redirect('index.php/log/login');
    }

    public function registration(){
        
        $this->form_validation->set_rules('name', 'Nama', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]',[
            'is_unique' => 'Email Anda telah terdaftar!'
            ]);
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'trim|required|min_length[5]|matches[password1]');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
        if($this->form_validation->run()==FALSE){
            $this->load->view('log/register');
        }else{
            $this->login->registration();
            redirect('index.php/log/login');
        }
    }
}

/* End of file login.php */
