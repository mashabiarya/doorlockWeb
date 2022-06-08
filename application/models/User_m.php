<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getUser($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    function getCount($id = null)
    {
        $this->db->select('*');
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    // public function add($post)
    // {
    //     $params = [
    //         'id' => $post['id'],
    //         'name' => $post['name'],
    //         'phone' => $post['phone'],
    //         'email' => $post['email'],
    //         'image' => $post['image'],
    //         'password' => $post['password'],
    //         'role_id' => $post['role_id'],
    //         'is_active' => $post['is_active'],
    //         'date_created' => $post['date_created']
    //     ];
    //     $this->db->insert('user', $params);
    // }

    public function add($post)
    {
        $params = [
            'name'          => $post['name'],
            'phone'         => $post['phone'],
            'email'         => $post['email'],
            'role_id'          => 2,
            'password'      => password_hash($post['password'], PASSWORD_DEFAULT),
            'date_created'  => date('Y-m-d'),
            'image'         => 'default.jpg'
        ];
        $this->db->insert('user', $params);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }
}
