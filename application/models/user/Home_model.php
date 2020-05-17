<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class home_model extends CI_Model {

    public function getDj()
    {
      return $this->db->get('dj')->result_array();
    }
    public function getGaleri()
    {
      return $this->db->get('galeri')->result_array();
    }

    public function getTiket()
    {
        $this->db->select('*');
        $this->db->from('event e');
        $this->db->join('tiket t', 't.id_event = e.id_event');
        return $this->db->get()->result_array();
    }

    public function getAkses($id)
    {
        $this->db->from('akses');
        $this->db->where('id_tiket', $id);
        return $this->db->get()->result_array();
    }

    public function getMaps($id)
    {
        $this->db->from('event');
        $this->db->where('id_event', $id);
        return $this->db->get()->result_array();
    }

    public function getKelasTiket()
    {
        $this->db->select('*');
        $this->db->from('tiket');
        return $this->db->get()->result_array();
    }

    public function getKonten()
    {
        $event = $this->db->query('SELECT MAX(id_event) as event_now FROM event')->result_array();
        foreach ($event as $e ) {
            $id = $e['event_now'];
        }

        $this->db->select('*');
        $this->db->from('event');
        $this->db->where('status_event', 'aktif');
        return $this->db->get()->result_array();
    }
    public function getAll() 
    {
      return $this->db->get('event')->result_array();
    }

    public function getSponsor()
    {
        return $this->db->get('sponsor')->result_array();
    }

    public function getHistoryPesan()
    {
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('user u', 't.id_user = u.id_user');
        $this->db->where('t.id_user', $_SESSION['id_user']);
        return $this->db->get()->result_array();
    }

    public function getFaq()
    {
        return $this->db->get('faq')->result_array();
    }

    public function getJadwal()
    {
        $this->db->select('*');
        $this->db->from('jadwal j');
        $this->db->join('event e', 'j.id_event = e.id_event');
        $this->db->order_by('waktu', 'asc');

        return $this->db->get()->result_array();
    }

    public function getTiketCart($id)
    {
        $this->db->select('*');
        $this->db->from('akses a');
        $this->db->join('tiket t', 'a.id_tiket = t.id_tiket');
        $this->db->join('event e', 't.id_event = e.id_event');
        $this->db->where('id_akses', $id);
        $this->db->limit(1);
        return $this->db->get()->row();

        // if ($result->num_rows() > 0) {
        //     return $result->row();
        // } else {
        //     return array();
        // }
    }

    public function pesan()
    {

        foreach ($this->cart->contents() as $items) {
            $qty = $this->cart->total_items();
            $id_akses  = $items['id'];
        }

        $jumlah = $qty;
        $kode = 'Synch'.time();

        $this->load->library('ciqrcode'); //pemanggilan library QR CODE
    		$config['cacheable']	= true; //boolean, the default is true
    		$config['cachedir']		= './assets/'; //string, the default is application/cache/
    		$config['errorlog']		= './assets/'; //string, the default is application/logs/
    		$config['imagedir']		= './assets/images/qr/'; //direktori penyimpanan qr code
    		$config['quality']		= true; //boolean, the default is true
    		$config['size']			= '1024'; //interger, the default is 1024
    		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
    		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
    		$this->ciqrcode->initialize($config);

        $user = $this->session->userdata('nama_user');
        $qrqr = time();
    		$image_name=$qrqr.'.png'; //buat name dari qr code sesuai dengan nim

    		$params['data'] = $kode; //data yang akan di jadikan QR CODE
    		$params['level'] = 'H'; //H=High
    		$params['size'] = 10;
    		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
    		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

        $bukti = 'kosong';
        $data = array(
            'id_user'           => $this->input->post('id_user'),
            'kode_transaksi'    => $kode,
            'tanggal'           => time(),
            'qty'               => $this->cart->total_items(),
            'total'             => $this->cart->total(),
            'status'            => 1,
            'bukti'             => $bukti,
            'qr_code'           => $image_name
        );
        $this->db->insert('transaksi', $data);
        $id_transaksi = $this->db->insert_id();

        foreach ($this->cart->contents() as $items) {
            $data = array(
                'id_transaksi'      => $id_transaksi,
                'id_akses'          => $items['id'],
                'qty'               => $items['qty']
            );
            $this->db->insert('detail_transaksi', $data);
        }
    }
    public function upload_bukti($gambar, $id)
    {
      $data = array(
        'bukti' => $gambar['file_name']
      );
      $this->db->where('id_transaksi' ,$id);
      $this->db->update('transaksi' ,$data);
    }



}

/* End of file home_model.php */
