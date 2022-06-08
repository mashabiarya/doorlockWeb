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

        $this->load->model('User_m', 'user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "User Management";
        $data['users'] = $this->user->get()->result_array();
        $this->template->load('template', 'user/data', $data);
    }

    private function _validasi($mode)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required|trim');

        if ($mode == 'add') {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
            $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
        } else {
            $db = $this->user->get('user', ['id' => $this->input->post('id', true)]);
            $email = $this->input->post('email', true);
            $uniq_email = $db['email'] == $email ? '' : '|is_unique[user.email]';

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email' . $uniq_email);
        }
    }

    public function add()
    {
        $this->_validasi('add');

        if ($this->form_validation->run() == false) {
            $user = new stdClass();
            $user->name = null;
            $user->phone = null;
            $user->email = null;
            $user->image = null;
            $user->password = null;
            $user->hire_date = null;
            $data = array(
                'title' => 'Tambah User',
                'page' => 'add',
                'row' => $user
            );

            $this->template->load('template', 'user/form', $data);
            $post = $this->input->post(null, true);
            var_dump($post);
        }
    }

    public function edit($id)
    {
        // $id = encode_php_tags($getId);
        // $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit User";
            $data['user'] = $this->user->get('user', ['id' => $id]);
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

            if ($this->user->update('user', 'id', $id, $input_data)) {
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
        if ($this->user->delete('user', 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('user');
    }

    public function proses()
    {
        if (isset($_POST['add'])) {
            $post = $this->input->post(null, true);
            $this->user->add($post);
            if ($this->db->affected_rows() > 0) {
                set_pesan('succes', 'Data Berhasil Dismpan');
            }
            var_dump($post);
            redirect('user');
        }
    }


    public function toggle($id)
    {
        $status = $this->user->getUser('user', ['id' => $id])['is_active'];
        $toggle = $status ? 0 : 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
        $pesan = $toggle ? 'user diaktifkan.' : 'user dinonaktifkan.';

        if ($this->user->update('user', 'id', $id, ['is_active' => $toggle])) {
            set_pesan($pesan);
        }
        redirect('user');
    }
}
