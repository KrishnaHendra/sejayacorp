<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class checkout extends CI_Controller {

    public function index()
    {
        if(!isset($_SESSION['logged_in'])){
            redirect('index.php/log/login','refresh');
        } else {
            $this->load->view('user/checkout');
        }
    }

}

/* End of file checkout.php */
