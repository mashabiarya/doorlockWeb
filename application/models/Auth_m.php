<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{

    public function cek_email($email)
    {
        $query = $this->db->get_where('user', ['email' => $email]);
        return $query->num_rows();
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function get_password($email)
    {
        $data = $this->db->get_where('user', ['email' => $email])->row_array();
        return $data['password'];
    }

    public function userdata($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }
}
