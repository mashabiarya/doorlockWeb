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
        $data['stat_mesin2'] = $this->device->get(2)->result()[0]->status_keterangan;
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

    public function edit($id)
    {
        $device = $this->device->get($id)->row();

        // Menggenerate nip_karyawan
        $kode_terakhir = $this->device->getMax('device', 'id');
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);

        $data = array(
            'title' => 'Edit Device',
            'page' => 'edit',
            'row' => $device,
            'id' => $number
        );

        $this->template->load('template', 'device/edit', $data);
    }

    public function del($id)
    {
        $where = array('id' => $id);
        $this->device->del('device', $where);
        redirect('device');
    }
}
