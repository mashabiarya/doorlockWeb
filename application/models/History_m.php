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

    public function getWhere($id = null)
    {
        $this->db->select('card_log.id, card_log.uidCard, card_log.macAddr, card_log.timestamp, card_log.rssi, card_log.snr, card_log.nip, card_log.datime');
        $this->db->from('card_log');
        if ($id != null) {
            $this->db->where('card_log.macAddr', $id);
        }
        $this->db->join('device', 'device.macAddr = card_log.macAddr');
        $query = $this->db->get();
        return $query;
    }

    public function getJoin($id = null)
    {
        $this->db->select('*');
        $this->db->from('card_log');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $this->db->join('employees', 'employees.emp_no = card_log.nip');
        $query = $this->db->get();
        return $query;
    }

    public function del($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
