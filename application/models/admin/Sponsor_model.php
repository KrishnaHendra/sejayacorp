<?php
/**
 *
 */
class sponsor_model extends CI_Model
{
  public function get_sponsor()
  {
    return $this->db->get('sponsor')->result();
  }
  public function delete($id_sponsor)
  {
    $hapus =  $this->db->query("DELETE FROM sponsor WHERE id_sponsor = '$id_sponsor'");
    return $hapus;
  }
  public function upload(){

    $config['upload_path'] = './assets/images/sponsor/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']	= '0';
    $config['max_filename'] = '255';
    $config['encrypt_name'] = FALSE;
    $config['remove_space'] = TRUE;

    $this->load->library('upload', $config); // Load konfigurasi uploadnya
    $this->upload->initialize($config);
    if($this->upload->do_upload('logo_sponsor')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }

  // Fungsi untuk menyimpan data ke database
  public function save($upload){
    $data = array(
      'nama_sponsor' => $this->input->post('nama_sponsor'),
      'logo_sponsor' => $upload['file']['file_name']
    );

    $this->db->insert('sponsor', $data);
  }
}
