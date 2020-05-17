<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class editable_home extends CI_Controller {

    public function index()
    {
        $data['sponsor'] = $this->home_model->getSponsor();
        $data['faq'] = $this->home_model->getFaq();
        $data['konten'] = $this->home_model->getKonten();
        $data['all'] = $this->home_model->getAll() ;
        $data['jadwal'] = $this->home_model->getJadwal();
        $data['tiket'] = $this->home_model->getTiket();
        $data['kelas'] = $this->home_model->getKelasTiket();
        $data['guest'] = $this->gs_model->getGuest();
        $this->load->view('editable_template', $data);
    }

    public function tambah_sponsor()
     {
         $config['upload_path'] = './assets/img/logo';
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_width'] = '4480'; // pixel
         $config['max_height'] = '4480'; // pixel
         $config['file_name'] = $_FILES['fotopost']['name'];

         $path = './assets/picture/';

         $this->upload->initialize($config);

             if (!empty($_FILES['fotopost']['name'])) {
                 if ( $this->upload->do_upload('fotopost') ) {
                     $gambar = $this->upload->data();
                     //@unlink($path.$this->input->post('filelama'));
                     $this->editable_model->tambahSponsor($gambar);
                     $this->session->set_flashdata('hijau', 'Berhasil ubah data');
                     redirect('index.php/admin/editable_home');
                 }else {
                     $this->session->set_flashdata('merah', 'Gagal ubah data');
                     redirect('index.php/admin/editable_home','refresh');
                 }
             }else {
                 $this->session->set_flashdata('merah', 'Gagal Upload gambar');
                 redirect('index.php/admin/editable_home','refresh');
             }
     }

    public function edit_sponsor($id)
     {
         $config['upload_path'] = './assets/img/sponsor';
         $config['allowed_types'] = 'jpg|png|jpeg|gif';
         $config['max_width'] = '4480'; // pixel
         $config['max_height'] = '4480'; // pixel
         $config['file_name'] = $_FILES['fotopost']['name'];

         $path = './assets/picture/';

         $this->upload->initialize($config);

             if (!empty($_FILES['fotopost']['name'])) {
                 if ( $this->upload->do_upload('fotopost') ) {

                    $items = $this->editable_model->getSponsor($id)->row();
                    if ($items->logo_sponsor != null) {
                        $target_file = './assets/img/sponsor/'.$items->logo_sponsor;
                        unlink($target_file);
                    }

                     $gambar = $this->upload->data();
                     //@unlink($path.$this->input->post('filelama'));
                     $this->editable_model->editSponsor($gambar, $id);
                     $this->session->set_flashdata('hijau', 'Berhasil ubah data');
                     redirect('index.php/admin/editable_home');
                 }else {
                     $this->session->set_flashdata('merah', 'Gagal ubah data');
                     redirect('index.php/admin/editable_home','refresh');
                 }
             }else {
                 $this->session->set_flashdata('merah', 'Gagal Upload gambar');
                 redirect('index.php/admin/editable_home','refresh');
             }
     }

    public function addNewEvent()
    {
      $config['upload_path'] = './assets/img/logo';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['poster']['name'];

      $path = './assets/picture/';

      $this->upload->initialize($config);

          if (!empty($_FILES['poster']['name'])) {
              if ( $this->upload->do_upload('poster') ) {
                  $poster = $this->upload->data();
                  //@unlink($path.$this->input->post('filelama'));
                  $this->editable_model->tambahEvent($poster);
                  redirect('index.php/admin/editable_home');
              }
                      

    }

    }
    
    public function hapusEvent($id)
    {
        $this->editable_model->hapusEvent($id);
        redirect('index.php/admin/editable_home', 'refresh');
    }

    public function editEvent($id)
    {
        $this->form_validation->set_rules('nama_event', 'nama_event', 'trim|required');
        $this->form_validation->set_rules('about_event', 'about_event', 'trim|required');
        $this->form_validation->set_rules('venue', 'venue', 'trim|required');
        $this->form_validation->set_rules('location_venue', 'location_venue', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');


        if ($this->form_validation->run() == TRUE) {
            $this->editable_model->ubahEvent($id);
            redirect('index.php/admin/editable_home','refresh');
        } else {
            redirect('index.php/admin/editable_home','refresh');
        }

    }

    public function tambahFaq()
    {
        $this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'trim|required');
        $this->form_validation->set_rules('jawaban', 'jawaban', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
             $this->editable_model->addFaq();
             $this->session->flashdata('alert');
             redirect('index.php/admin/editable_home','refresh');
        } else {
             $this->session->flashdata('alert');
             redirect('index.php/admin/editable_home','refresh');
        }
    }

    public function editFaq($id){
        $this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'trim|required');
        $this->form_validation->set_rules('jawaban', 'jawaban', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $this->editable_model->updateFaq($id);
            $this->session->flashdata('alert');
            redirect('index.php/admin/editable_home','refresh');
        } else {
            $this->session->flashdata('alert');
            redirect('index.php/admin/editable_home','refresh');
        }

    }

    public function tambahDetailJadwal()
    {
        $config['upload_path'] = './assets/img/schedule';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_width'] = '4480'; // pixel
        $config['max_height'] = '4480'; // pixel
        $config['file_name'] = $_FILES['fotopost']['name'];

        $path = './assets/picture/';

        $this->upload->initialize($config);
        $id_event = $this->input->post('id_event');

            if (!empty($_FILES['fotopost']['name'])) {
                if ( $this->upload->do_upload('fotopost') ) {
                    $gambar = $this->upload->data();
                    //@unlink($path.$this->input->post('filelama'));
                    $this->editable_model->tambah_detail_jadwal($gambar, $id_event);
                    $this->session->set_flashdata('hijau', 'Berhasil ubah data');
                    redirect('index.php/admin/editable_home');
                }else {
                    $this->session->set_flashdata('merah', 'Gagal Upload gambar');
                    redirect('index.php/admin/editable_home','refresh');
                }
            }else {
                $this->editable_model->tambah_jadwal_noImage($id_event);
                redirect('index.php/admin/editable_home','refresh');
            }
    }

    public function editDetailJadwal($id)
    {
        $config['upload_path'] = './assets/img/schedule';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_width'] = '4480'; // pixel
        $config['max_height'] = '4480'; // pixel
        $config['file_name'] = $_FILES['fotopost']['name'];

        $path = './assets/picture/';

        $this->upload->initialize($config);
        $id_event = $this->input->post('id_event');

            if (!empty($_FILES['fotopost']['name'])) {
                if ( $this->upload->do_upload('fotopost') ) {

                    $items = $this->editable_model->getDetailJadwal($id)->row();
                    if ($items->gambar != null) {
                        $target_file = './assets/img/schedule/'.$items->gambar;
                        unlink($target_file);
                    }

                    $gambar = $this->upload->data();
                    //@unlink($path.$this->input->post('filelama'));
                    $this->editable_model->edit_detail_jadwal($gambar, $id, $id_event);
                    $this->session->set_flashdata('hijau', 'Berhasil ubah data');
                    redirect('index.php/admin/editable_home');
                }else {
                    $this->session->set_flashdata('merah', 'Gagal ubah data');
                    redirect('index.php/admin/editable_home','refresh');
                }
            }else {

                $this->session->set_flashdata('merah', 'Gagal Upload gambar');
                redirect('index.php/admin/editable_home','refresh');
            }
    }

    public function hapusDetailJadwal($id)
    {
        $this->editable_model->hapus_detail_jadwal($id);
        redirect('index.php/admin/editable_home','refresh');
    }

}

/* End of file editable_home.php */
