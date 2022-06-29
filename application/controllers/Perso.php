<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perso extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('perso_m', 'perso');
        $this->load->model('perso', 'perso');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Personalisasi';
        $data['perso'] = $this->perso->get()->result();
        // $data['device'] = $this->device->get()->result();
        $this->template->load('template', 'perso/perso', $data);
    }

    // public function filter()
    // {
    //     $post = $this->input->post(null, TRUE);
    //     $history = $this->history->getWhere($post['filter'])->result();
    //     $data = array(
    //         'title' => 'Filter History',
    //         'history' => $history
    //     );

    //     $this->template->load('template', 'history/filter', $data);
    // }

    public function detail($emp_no)
    {
        $data['title'] = 'Detail Personalisasi';
        $data['detail'] = $this->perso->getJoin($emp_no)->row();
        $this->template->load('template', 'perso/detail', $data);
    }

    public function del($id)
    {
        $where = array('id' => $id);
        $this->perso->del('perso', $where);
        redirect('perso');
    }
}
