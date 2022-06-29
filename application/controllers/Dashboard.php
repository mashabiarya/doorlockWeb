<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('history_m', 'history');
        $this->load->model('chart_m', 'chart');
        $this->load->model('device_m', 'device');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['stat_mesin1'] = $this->device->get(1)->result()[0]->status_keterangan;
        $data['stat_mesin2'] = $this->device->get(20)->result()[0]->status_keterangan;
        $this->template->load('template', 'dashboard/dashboard', $data);
    }

    public function chart()
    {
        $data['title'] = 'Pegawai Masuk';
        $data = $this->chart_m->get();
        echo json_encode($data);
    }

    public function chart_pegawai_masuk()
    {
        echo json_encode($this->chart->get_absensi());
    }

    public function chart_rssi_snr()
    {
        $mac_mesin = $this->input->post('mac_mesin');
        echo json_encode($this->chart->get_rssi_snr_mesin($mac_mesin));
    }

    public function percobaan()
    {
        echo " ini adalah function percobaan";
    }
}
