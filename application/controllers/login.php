<?php

class Login extends CI_Controller
{

    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->view('login_m');
    }

    public function index()
    {

        $this->load->view('index.php');
    }
}