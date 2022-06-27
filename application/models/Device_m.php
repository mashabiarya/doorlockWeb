<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Device_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('device');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $this->db->order_by('id', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function getJoin($id = null)
    {
        $this->db->select('*');
        $this->db->from('device');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $this->db->join('card_log', 'card_log.macAddr = device.macAddr');
        // $this->db->join('card_log', 'card_log.macAddr = device.macAddr');
        $query = $this->db->get();
        return $query;
    }

    public function getMac($post)
    {
        $this->db->select('*');
        $this->db->from('device');
        $this->db->where('macAddr', $post['macAddr']);
        $query = $this->db->get();
        return $query;
    }

    public function getJoin2($id = null)
    {
        $this->db->select('*');
        $this->db->from('card_log');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $this->db->join('employees', 'employees.nip_karyawan = card_log.nip');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = array(
            'nama' => $post['device'],
            'macAddr' => $post['macAddr'],
            'lokasi' => $post['lokasi']
        );
        $this->db->insert('device', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['device'],
            'lokasi' => $post['lokasi']
        ];
        if ($post['macAddr'] != null) {
            $params = ['macAddr' => $post['macAddr']];
        }
        $this->db->where('id', $post['id']);
        $this->db->update('device', $params);
    }


    public function del($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
