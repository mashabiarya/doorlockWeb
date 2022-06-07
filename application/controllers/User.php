<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        if (!is_admin()) {
            redirect('dashboard');
        }

        $this->load->model('User_m', 'base');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "User Management";
        $data['users'] = $this->base->get()->result_array();
        $this->template->load('template', 'user/data', $data);
    }

    private function _validasi($mode)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');
        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($mode == 'add') {
            $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]|alpha_numeric');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
            $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
        } else {
            $db = $this->base->get('user', ['id' => $this->input->post('id', true)]);
            $email = $this->input->post('email', true);
            $uniq_email = $db['email'] == $email ? '' : '|is_unique[user.email]';

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email' . $uniq_email);
        }
    }

    public function add()
    {
        $this->_validasi('add');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah User";
            $this->template->load('template', 'user/form', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
             // 'id'            => $input['id'],
                'name'          => $input['name'],
                'phone'         => $input['phone'],
                'email'         => $input['email'],
                'role'          => $input['role_id'],
                'password'      => password_hash($input['password'], PASSWORD_DEFAULT),
                'date_created'  => time(),
                'image'         => 'default.png'
            ];

            if ($this->base->insert('user', $input_data)) {
                set_pesan('data berhasil disimpan. Silahkan klik tombol aktivasi untuk mengaktifkan User');
                redirect('user');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('user/add');
            }
        }
    }

    public function edit($id)
    {
        // $id = encode_php_tags($getId);
        // $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit User";
            $data['user'] = $this->base->get('user', ['id' => $id]);
            $this->template->load('template', 'user/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'name'          => $input['name'],
             // 'username'      => $input['username'],
                'email'         => $input['email'],
                'phone'         => $input['phone'],
                'role_id'       => $input['role_id']
            ];

            if ($this->base->update('user', 'id', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('user');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('user/edit/' . $id);
            }
        }
    }

    public function delete($id)
    {
        if ($this->base->delete('user', 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('user');
    }


    public function toggle($id)
    {
        $status = $this->base->getUser('user', ['id' => $id])['is_active'];
        $toggle = $status ? 0 : 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
        $pesan = $toggle ? 'user diaktifkan.' : 'user dinonaktifkan.';

        if ($this->base->update('user', 'id', $id, ['is_active' => $toggle])) {
            set_pesan($pesan);
        }
        redirect('user');
    }
}
