<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('history_m', 'history');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data History';
        $data['history'] = $this->history->get()->result();
        $this->template->load('template', 'history/history', $data);
    }

    public function detail($nip)
    {
        $data['title'] = 'Detail History';
        $data['detail'] = $this->history->getJoin($nip)->row();
        $this->template->load('template', 'history/detail', $data);
    }

    public function del($id)
    {
        $where = array('id' => $id);
        $this->history->del('card_log', $where);
        redirect('history');
    }
}
