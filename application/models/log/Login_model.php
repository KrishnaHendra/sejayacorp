<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {
    public function proses_login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user',['email'=>$email])->row_array();
        $admin = $this->db->get_where('admin',['email'=>$email])->row_array();


        if($user){
            if ($password == $user['password']) {
                $data = [
                    'logged_in' => TRUE,
                    'id_user' => $user['id_user'],
                    'nama_user' => $user['nama_user'],
                    'email' => $user['email'],
                    'telepon' => $user['telepon']
                ];
                $this->session->set_userdata($data);
                redirect('index.php/home/home');
            } 
            $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-times-circle"></i> Password Salah!
            </div>');
            redirect('index.php/log/login');
            
        } elseif ($admin) {
            if(password_verify($password,$admin['password'])){
                $data = [
                    'logged_in' => TRUE,
                    'email' => $admin['email'],
                    'nama' => $admin['nama'],
                ];
                $this->session->set_userdata($data);
                redirect('index.php/admin/dashboard');
            }  
            $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-times-circle"></i> Password Salah!
            </div>');
            redirect('index.php/log/login');
        }
        else{
            $this->session->set_flashdata('notif','<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-times-circle"></i> Akun Tidak Ditemukan!
            </div>');
            redirect('index.php/log/login');
        }
    }

    public function registration(){
        $data=[
            'nama_user' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password1'),
            'telepon' => $this->input->post('telepon'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'created_at' => time(),
        ]; 
        $this->db->insert('user', $data);
        $this->session->set_flashdata('notif','<div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="fa fa-check"></i> Akun telah dibuat, silahkan login!
            </div>');
    }

}

/* End of file login_model.php */
