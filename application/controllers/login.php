<?php
defined('BASE_PATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: X3D
 * Date: 12/26/2019
 * Time: 12:37 AM
 */
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('login_m', 'login');
        $this->load->library('form_validation');
    }

    public function index()
    {
//        $dt = $this->home_m->getUsers();
        $this->load->view('login', '$data');
    }


    public function loginUser() {

        if (($this->input->server('REQUEST_METHOD') == 'POST')) {

            $email    = $this->input->post('email');
            $password = $this->input->post('password');

            $data = array('emailErr' => TRUE, 'passwordErr' => TRUE);

            return $this->load->User($email, $password, $data);

        } else{
            
            $message[]= "success";
            return $this->load->loginUser();
    }
}

    // Check for user login
}
