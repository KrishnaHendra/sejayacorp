<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

	public function get_tiket()
	{
		return $this->db->join('event', 'event.id_event = tiket.id_event')->get('tiket')->result();
	}
	public function tambah_tiket()
	{
		$data  = [
			'kelas' => $this->input->post('kelas'),
			'id_event' => $this->input->post('id_event')
		];
		$this->db->insert('tiket', $data);
	}
	public function delete_tiket($id_tiket)
	{
		$hapus = $this->db->query("DELETE FROM tiket WHERE id_tiket = '$id_tiket'");
		return $hapus;
	}
	public function delete_akses($id_akses)
	{
		$hapus = $this->db->query("DELETE FROM akses WHERE id_akses = '$id_akses'");
		return $hapus;
	}
	public function tambah_akses()
	{
		$data = [
			'akses' => $this->input->post('akses'),
			'id_event' => $this->input->post('id_event'),
			'id_tiket' => $this->input->post('id_tiket'),
			'harga' => $this->input->post('harga'),
			'stok' => $this->input->post('stok')
		];
		$this->db->insert('akses', $data);
	}
	public function get_event()
	{
		return $this->db->get('event')->result();
	}
	public function get_akses()
	{
		return $this->db->join('event', 'event.id_event = akses.id_event')->join('tiket', 'tiket.id_tiket = akses.id_tiket')->get('akses')->result();
	}
	public function show_admin()
	{
        $this->db->select('*');
        $this->db->from('admin a');
        return $this->db->get();
    }

    public function add_admin(){
        $admin = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
            'aktif' => 1,
            'created_at' => time()
        ];
        $this->db->insert('admin',$admin);
    }

    public function delete_admin($id_admin){
        $hapus = $this->db->query("DELETE FROM admin WHERE id_admin = $id_admin");
        return $hapus;
    }


    public function get_transaksi(){
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('user u', 't.id_user = u.id_user');
        return $this->db->get()->result_array();
    }

    public function data_member(){
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result_array();
    }

    public function cetak_member(){
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result_array();
    }

    public function update_transaksi($id,$status){
        if($status == 'BATAL'){
            $this->db->select('t.id_transaksi, stok, t.qty, dt.id_akses');
            $this->db->from('transaksi t');
            $this->db->join('detail_transaksi dt', 't.id_transaksi = dt.id_transaksi');
            $this->db->join('akses a', 'dt.id_akses = a.id_akses');
            $this->db->where('t.id_transaksi', $id);
            $transaksi = $this->db->get()->result_array();
            
            foreach ($transaksi as $t ) {
                $id_akses = $t['id_akses'];
                $qty = $t['qty'];
                $stok = $t['stok'];
            }
            
            $data = array(
                'stok' => $qty + $stok
            );
            
            $this->db->where('id_akses', $id_akses);
            $this->db->update('akses', $data);
        }
        
        $data = array(
            'status' => $status
        );
        
        $this->db->where('id_transaksi', $id);
        $this->db->update('transaksi', $data);
    }

	public function getEmail($id)
	{
		$user = $this->db->query("SELECT email FROM user WHERE id_user = '$id'")->result_array();
		foreach ($user as $u ) {
				$email = $u['email'];
				return $email;
		}
	}
}

