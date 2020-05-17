<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class logout extends CI_Controller {

    public function index()
    {
        session_destroy();
        redirect('index.php/home','refresh');
    }

}

/* End of file logout.php */
