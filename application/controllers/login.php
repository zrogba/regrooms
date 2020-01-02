<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: X3D
 * Date: 12/26/2019
 * Time: 12:37 AM
 */
class Login extends CI_Controller
{

    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->load->model('register_m');

            return $this->LoginUser();
        }
        $this->load->view('login.php');
    }
    public function index()
    {
//        $dt = $this->home_m->getUsers();
        $this->load->view('index.php');
    }

    private function loginUser()
    {
        $this->form_validation->set_rules('user_email', 'email', 'trim|required|min_length[4]|valid_email|is_unique[users.email_address]');
        $this->form_validation->set_rules('user_password', 'password', 'required');

        if (!$this->form_validation->run() == FALSE){

            $this->load->view('register.php');
        }

        print_r([]);die();

    }

}