<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_m extends CI_Model
{
    public function get($nip_karyawan = null)
    {
        $this->db->select('*');
        $this->db->from('employees');
        if ($nip_karyawan != null) {
            $this->db->where('nip_karyawan', $nip_karyawan);
        }
        $this->db->order_by('nip_karyawan', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function getMax($table, $field, $nip_karyawan = null)
    {
        $this->db->select_max($field);
        if ($nip_karyawan != null) {
            $this->db->like($field, $nip_karyawan, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    public function add($post)
    {
        $params = [
            'nip_karyawan' => $post['nip_karyawan'],
            'first_name' => $post['first_name'],
            'last_name' => $post['last_name'],
            'gender' => $post['gender'],
            'birth_date' => $post['birth_date'],
            'hire_date' => $post['hire_date']
        ];
        $this->db->insert('employees', $params);
    }

    public function edit($post)
    {
        $params = [
            'first_name' => $post['first_name'],
            'last_name' => $post['last_name']
        ];
        $this->db->where('nip_karyawan', $post['nip_karyawanedit']);
        $this->db->update('employees', $params);
    }

    public function del($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
