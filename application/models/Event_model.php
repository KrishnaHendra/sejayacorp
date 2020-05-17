<?php
/**
 *
 */
class event_model extends CI_Model
{
  public function get_event()
  {
    $data = $this->db->query("SELECT * FROM event WHERE status_event = 'aktif'");
    return $data->result();
  }
  public function show($status)
  {
    $data = $this->db->query("SELECT * FROM event WHERE status_event = '$status'");
    return $data->result();
  }
}
