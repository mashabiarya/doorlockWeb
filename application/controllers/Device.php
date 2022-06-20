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
        $this->template->load('template', 'device/device', $data);
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
            $this->device->add($post);
            if ($this->db->affected_rows() > 0) {
                set_pesan('Data Berhasil Diinput');
            }
            redirect('device');
        }
    }

    public function del($id)
    {
        $where = array('id' => $id);
        $this->device->del('device', $where);
        redirect('device');
    }
}
