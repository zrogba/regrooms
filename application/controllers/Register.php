<?php

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('register_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('register');
    }
}
// register
    function register()
{
    $usernameErr = $emailErr = $passwordErr = $password2Err = "";
    $username = $email = $password = $password2 = "";

    if (($this->input->server('REQUEST_METHOD') == 'post')) {// check if empty
        if($this->input->post('submit'))
        {
            $username=$this->input->post('username');
            $email=$this->input->post('email');
            $password=$this->input->post('password');
        }
        if (empty($username)) {
            [$usernameErr => true];
        } else {
            echo "username required";
        }

        if (empty($email)) {
            [$emailErr => true];
        } else {
            echo "email required";
        }

        if (empty($password)) {
            if ([$password] != [$password2]) {
                [$password2Err => true];
            } else {
                echo "password must match";
            }
            if (empty(array())) { // If there were no errors
                $this->load->model('register_m');

            }
            echo 'you need to register';

        }
        // Validate to check if user data exist
        function registerUser()
        {

            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[users.username]');
            $this->form_validation->set_rules('password', 'Password', 'required');

            $this->form_validation->set_rules('Confirm password', 'Password Confirmation', 'required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[4]|valid_email|is_unique[users.email]');

            if ($this->form_validation->run() == FALSE) {
                // if fails
                $this->load->view('header');
                $this->load->view('register');
                $this->load->view('footer');

            } else {
                if ($this->input->post('registerUser') == "register") {

                }
                $data = array(
                    'username' => $this->input->post('$username'),
                    'email' => $this->input->post('$email'),
                    'password' => $this->input->post('$password'),
                );
                // insert into database

                $id = $this->register_m->insert($data);

                if ($id == TRUE) {
                }
                echo 'Registration Successfully !';
                $this->load->view('index', $data);

            }


        }
    }
    }

