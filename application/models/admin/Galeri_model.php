<?php
/**
 *
 */
class galeri_model extends CI_Model
{
  function get_galeri()
  {
    return $this->db->join('event', 'event.id_event = galeri.id_event')
                    ->get('galeri')
                    ->result();
  }
  function show_galeri()
  {
    return $this->db->join('event', 'event.id_event = galeri.id_event')
                    ->get('galeri')
                    ->result();
  }
  function show_guest()
  {
    return $this->db->join('event', 'event.id_event = guest.id_event')
                    ->get('guest')
                    ->result();
  }
  function show($id_event)
  {
    return $this->db->query("SELECT * FROM galeri WHERE id_event = '$id_event'")
                    ->result();
  }
  function get_event()
  {
    return $this->db->get('event')
                    ->result();
  }
  function show_event()
  {
    return $this->db->query("SELECT * FROM event WHERE status_event = 'selesai'")
                    ->result();
  }
  public function upload(){

		$config['upload_path'] = './assets/images/galeri/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '0';
		$config['max_filename'] = '255';
		$config['encrypt_name'] = FALSE;
		$config['remove_space'] = TRUE;

		$this->load->library('upload', $config); // Load konfigurasi uploadnya
    $this->upload->initialize($config);
		if($this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
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
			'id_event' => $this->input->post('id_event'),
			'gambar' => $upload['file']['file_name']
		);

		$this->db->insert('galeri', $data);
	}
  public function delete($id_galeri)
  {
    $hapus = $this->db->query("DELETE FROM galeri WHERE id_galeri = '$id_galeri'");
    return $hapus;
  }
}
