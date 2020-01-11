<?php
defined('BASE_PATH') OR exit('No direct script access allowed');
class register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('register_m', 'register');
        $this->load->library('form_validation');
    }

    // home
    public function index()
    {
        $this->load->view('register');
    }

    // register
    public function register()
    {
        if (($this->input->server('REQUEST_METHOD') == 'POST')){
            $errors = array();

            if (empty($this->input->post['username'])){
                $errors[] = ['usernameErr' => true];

            if (empty($this->input->post['email'])){
                $errors[]= ['emailErr' => true];

        } else {
                $errors[]= ['you need to register'];
        }
            if (empty($errors));
                $this->load->view('register_m');
            }
        }
    }
    // Validate to check if user data exist
    private function registerUser()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[users.user_name]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[4]|valid_email|is_unique[users.email_address]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // if fails
            $this->load->view('register');
        } else    {
            // input data
            $this->load->view('register_m');
            $data = [
                'Username' => $this->input->post('username'),
                'Email' => $this->input->post('email'),
                'Password' => md5($this->input->post('password')),
            ];

            $success = "Your account has been successfully created!";
            $this->load->view('register', compact('success'));

            $result = $this->db->insert('users', $data);

        if ($result == TRUE) {

                $data['message_display'] = 'Registration Successfully !';
                $this->load->view('index', $data);
         } else {
                $data['message_display'] = 'Username already exist!';
                $data['message_display'] = 'Email already exist!';
                $this->load->view('register', $data);
            }

            $this->load->view('register_m');
    }

    }
}