<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perso_m extends CI_Model
{
    public function get($serial = null)
    {
        $this->db->select('*');
        $this->db->from('perso');
        if ($serial != null) {
            $this->db->where('serial', $serial);
        }
        $this->db->order_by('serial', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function getWhere($serial = null)
    {
        $this->db->select('perso.serial, perso.emp_no, perso.tanggal, perso.expired, perso.active');
        $this->db->from('perso');
        if ($serial != null) {
            $this->db->where('perso.emp_no', $serial);
        }
        // $this->db->join('employees', 'employees.emp_no = card_log.nip');
        $this->db->join('employees', 'emloyees.emp_no = perso.emp_no');
        $query = $this->db->get();
        return $query;
    }

    public function getJoin($serial = null)
    {
        $this->db->select('*');
        $this->db->from('perso');
        if ($serial != null) {
            $this->db->where('serial', $serial);
        }
        $this->db->join('employees', 'employees.emp_no = perso.emp_no');
        $query = $this->db->get();
        return $query;
    }

    public function del($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
