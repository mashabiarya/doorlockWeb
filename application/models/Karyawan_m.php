<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_m extends CI_Model
{
    public function get($emp_no = null)
    {
        $this->db->select('*');
        $this->db->from('employees');
        if ($emp_no != null) {
            $this->db->where('emp_no', $emp_no);
        }
        $this->db->order_by('emp_no', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function getMax($table, $field, $emp_no = null)
    {
        $this->db->select_max($field);
        if ($emp_no != null) {
            $this->db->like($field, $emp_no, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    public function add($post)
    {
        $params = [
            'emp_no' => $post['emp_no'],
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
        $this->db->where('emp_no', $post['emp_noedit']);
        $this->db->update('employees', $params);
    }

    public function del($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
