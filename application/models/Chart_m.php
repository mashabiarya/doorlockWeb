<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart_m extends CI_Model
{
    public function get($id = null)
    {
        return $this->db->get('card_log')->result();
    }
}
