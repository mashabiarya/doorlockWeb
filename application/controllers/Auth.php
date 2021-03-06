<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_m', 'auth');
        // $this->load->model('Base_model', 'base');
    }

    private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $this->_has_login();

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Aplikasi';
            $this->template->load('temp/tempauth', 'auth/login', $data);
        } else {
            $input = $this->input->post(null, true);

            $cek_email = $this->auth->cek_email($input['email']);
            if ($cek_email > 0) {
                $password = $this->auth->get_password($input['email']);
                if (password_verify($input['password'], $password)) {
                    $user_db = $this->auth->userdata($input['email']);
                    if ($user_db['is_active'] != 1) {
                        set_pesan('akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin.', false);
                        redirect('auth');
                    } else {
                        $userdata = [
                            'user'  => $user_db['id'],
                            'role_id'  => $user_db['role_id'],
                            'timestamp' => time()
                        ];
                        $this->session->set_userdata('login_session', $userdata);
                        redirect('dashboard');
                    }
                } else {
                    set_pesan('password salah', false);
                    redirect('auth');
                }
            } else {
                set_pesan('username belum terdaftar', false);
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login_session');

        set_pesan('anda telah berhasil logout');
        redirect('auth');
    }

    public function register()
    {
        $this->_has_login();
        // $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Buat Akun';
            $this->template->load('temp/tempauth', 'auth/registration', $data);
        } else {
            $input = $this->input->post(null, true);
            unset($input['password2']);
            $input['password']      = password_hash($input['password'], PASSWORD_DEFAULT);
            $input['role_id']          = '2';
            $input['image']          = 'default.jpg';
            $input['is_active']     = 0;

            $query = $this->auth->insert('user', $input);
            if ($query) {
                set_pesan('daftar berhasil. Selanjutnya silahkan hubungi admin untuk mengaktifkan akun anda.');
                redirect('auth');
            } else {
                set_pesan('gagal menyimpan ke database', false);
                redirect('register');
            }
        }
    }

    public function reset()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
        $this->form_validation->set_rules('password2', 'Password', 'matches[password]|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        // function cek_password()
        // {
        //     if (stristr($str, '@uni-email-1.com') !== false) return true;
        //     if (stristr($str, '@uni-email-2.com') !== false) return true;
        //     if (stristr($str, '@uni-email-3.com') !== false) return true;
        //     $this->form_validation->set_message('email', 'Please provide an acceptable email address.');
        //     return FALSE;
        // }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->template->load('temp/tempauth', 'auth/reset', $data);
        } else {
            $input = $this->input->post(null, true);
            unset($input['password2']);
            $input['password']      = password_hash($input['password'], PASSWORD_DEFAULT);
            $input['role_id']          = '2';
            $input['image']          = 'default.jpg';
            $input['is_active']     = 1;

            $this->db->where('email', $input['email']);
            $query = $this->db->update('user', $input);
            if ($query) {
                set_pesan('Reset password berhasil.');
                redirect('auth');
            } else {
                set_pesan('gagal menyimpan ke database', false);
                redirect('reset');
            }
        }
    }
}
