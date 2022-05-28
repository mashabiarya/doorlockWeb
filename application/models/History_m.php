<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('card_log');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query;
    }
}
