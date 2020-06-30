<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load Login_model
        $this->load->model('login_model');
        //cek session dan level user
        if ($this->login_model->is_role() != "pelanggan") {
            redirect("login/");
        }
    }

    function index()
    {
        //mengambil nama user
        $data['nama'] = $this->session->userdata['nama'];

        $this->load->view('template/header', $data);
        $this->load->view('pelanggan/sidebar');
        $this->load->view('pelanggan/dashboard');
        $this->load->view('template/footer');
    }
}
