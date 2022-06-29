<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Device extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Device_m', 'device');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Device';
        $data['device'] = $this->device->get()->result();
        $data['stat_mesin1'] = $this->device->get(1)->result()[0]->status_keterangan;
        $data['stat_mesin2'] = $this->device->get(20)->result()[0]->status_keterangan;
        $this->template->load('template', 'device/device', $data);
    }

    private function _validasi($page)
    {
        // $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        // $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|trim');
        // $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($page == 'add') {
            $this->form_validation->set_rules('macAddr', 'MacAddr', 'required|trim|is_unique[device.macAddr]');
            // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
            // $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]|trim');
            // $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]|trim');
        } else {
            $db = $this->admin->get('user', ['id_user' => $this->input->post('id_user', true)]);
            $username = $this->input->post('username', true);
            $email = $this->input->post('email', true);

            $uniq_username = $db['username'] == $username ? '' : '|is_unique[user.username]';
            $uniq_email = $db['email'] == $email ? '' : '|is_unique[user.email]';

            $this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_numeric' . $uniq_username);
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email' . $uniq_email);
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail History';
        $data['device'] = $this->history->getJoin($id)->row();
        $this->template->load('template', 'device/device', $data);
    }

    public function regis()
    {
        $device = new stdClass();
        $device->id = null;
        $device->nama = null;
        $device->macAddr = null;
        $device->stus_keterangan = null;
        $device->lastOnline = null;
        $device->lokasi = null;

        $data = array(
            'title' => 'Registrasi Device',
            'page' => 'add',
            'row' => $device
        );
        // $data['device'] = $this->device->get()->result();
        $this->template->load('template', 'device/regis', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $cek_mac = $this->device->getMac($post);
            if ($cek_mac->row() > 0) {
                set_pesan('Mac Address Sudah Terdaftar', false);
                redirect('device/regis');
            } else {
                $this->device->add($post);
                // var_dump($post);
                if ($this->db->affected_rows() > 0) {
                    set_pesan('Data Berhasil Diinput');
                }
            }
            redirect('device');
        } elseif (isset($_POST['edit'])) {
            // $cek_mac = $this->device->getMac($post);
            $this->device->edit($post);
            // var_dump($post);
            if ($this->db->affected_rows() > 0) {
                set_pesan('Data Berhasil Diinput');
            }
        }
        redirect('device');
    }

    public function edit($id)
    {
        $device = $this->device->get($id)->row();

        // Menggenerate nip_karyawan
        // $kode_terakhir = $this->device->getMax('device', 'id');
        // $kode_tambah = substr($kode_terakhir, -5, 5);
        // $kode_tambah++;
        // $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);

        $data = array(
            'title' => 'Edit Device',
            'page' => 'edit',
            'row' => $device,
        );

        $this->template->load('template', 'device/regis', $data);
    }

    public function del($id)
    {
        $where = array('id' => $id);
        $this->device->del('device', $where);
        redirect('device');
    }
}
