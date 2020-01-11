<?php

/**
 * Created by PhpStorm.
 * User: X3D
 * Date: 12/26/2019
 * Time: 12:37 AM
 */
class Home extends CI_Controller
{

    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_m');
    }

    public function index()
    {
//        $dt = $this->home_m->getUsers();
        $this->load->view('index');
    }
    public function login()
    {
        $this->load->view('login');
        $this->load->model('login_m');
    }
    public function register() {
        $this->load->view('register');
        $this->load->model('register_m');
}
}