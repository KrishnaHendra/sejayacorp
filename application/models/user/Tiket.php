<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Model {

    public function index($id){
        $query = $this->db->query("SELECT * FROM transaksi t JOIN user u ON t.id_user = u.id_user WHERE id_transaksi = '$id'");
        return $query->result_array();
    }
    public function detail($id)
    {
      $this->db->select('*');
      $this->db->from('detail_transaksi');
      $this->db->join('akses', 'akses.id_akses = detail_transaksi.id_akses');
      $this->db->join('event', 'event.id_event = akses.id_event');
      $this->db->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi');
      $this->db->where('detail_transaksi.id_transaksi', $id);
      $this->db->group_by('transaksi.id_transaksi');
      return $this->db->get()->result();
    }
    public function event($id)
    {
      $this->db->select('*,date_format(event.tanggal,"%d %M %Y") as tanggal_event');
      $this->db->from('event');
      $this->db->join('akses', 'akses.id_event = event.id_event');
      $this->db->join('detail_transaksi', 'detail_transaksi.id_akses = akses.id_akses');
      $this->db->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi');
      $this->db->where('transaksi.id_transaksi', $id);
      $this->db->group_by('transaksi.id_transaksi');
      return $this->db->get()->result();
    }
    public function data($id)
    {
      $this->db->select('*,detail_transaksi.qty as qty_tiket');
      $this->db->from('akses');
      $this->db->join('tiket', 'akses.id_tiket = tiket.id_tiket');
      $this->db->join('detail_transaksi', 'detail_transaksi.id_akses = akses.id_akses');
      $this->db->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi');
      $this->db->where('transaksi.id_transaksi', $id);
      return $this->db->get()->result();
    }

}

/* End of file ModelName.php */
