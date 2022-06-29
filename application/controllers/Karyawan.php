<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('karyawan_m', 'karyawan');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data karyawan';
        $data['karyawan'] = $this->karyawan->get()->result();
        $this->template->load('template', 'karyawan/data', $data);
    }

    public function add()
    {
        $karyawan = new stdClass();
        $karyawan->emp_no = null;
        $karyawan->birth_date = null;
        $karyawan->first_name = null;
        $karyawan->last_name = null;
        $karyawan->gender = null;
        $karyawan->hire_date = null;

        // Mengenerate nip_karyawan
        $kode_terakhir = $this->karyawan->getMax('employees', 'emp_no');
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);

        $data = array(
            'title' => 'Tambah Karyawan',
            'page' => 'add',
            'row' => $karyawan,
            'emp_no' => $number
        );

        $this->template->load('template', 'karyawan/form', $data);
    }

    public function edit($emp_no)
    {
        $karyawan = $this->karyawan->get($emp_no)->row();

        // Menggenerate nip_karyawan
        $kode_terakhir = $this->karyawan->getMax('employees', 'emp_no');
        $kode_tambah = substr($kode_terakhir, -5, 5);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);

        $data = array(
            'title' => 'Edit Karyawan',
            'page' => 'edit',
            'row' => $karyawan,
            'emp_no' => $number
        );

        $this->template->load('template', 'karyawan/form', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->karyawan->add($post);
            if ($this->db->affected_rows() > 0) {
                set_pesan('succes', 'Data Berhasil Dismpan');
            }
            var_dump($post);
            redirect('karyawan');
        }
        if (isset($_POST['edit'])) {
            $this->karyawan->edit($post);
            if ($this->db->affected_rows() > 0) {
                set_pesan('succes', 'Data Berhasil Dismpan');
            }
            var_dump($post);
            redirect('karyawan');
        }
    }

    public function del($emp_no)
    {
        $where = array('emp_no' => $emp_no);
        $this->karyawan->del('employees', $where);
        redirect('karyawan');
    }
}
