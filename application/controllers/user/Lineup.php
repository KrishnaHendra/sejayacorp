<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class lineup extends CI_Controller {

    public function index($id)
    {
        $data['guest_detail'] = $this->gs_model->getLineup($id);
        $this->load->view('user/lineup', $data);
    }

}

/* End of file lineup.php */
