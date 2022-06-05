<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Device extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('device_m', 'device');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data History';
        $data['history'] = $this->history->get()->result();
        $this->template->load('template', 'device/hdevice', $data);
    }
}
