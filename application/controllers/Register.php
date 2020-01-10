<?php
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
        if (($this->input->server('REQUEST_METHOD') == 'post') && $this->registerUser()) {

            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $data['username'] = $username;
            $data['email'] = $email;
            $data['password'] = $password;

            $this->load->view('register_m');

            if (empty($this->input["email"]["username"])) {

                $usernameErr = true;
                $emailErr = true;
                return $this->load->view('register_m');
            }
        } else {

            return $this->load->view('register');

        }
    }

    private function registerUser()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[users.user_name]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[4]|valid_email|is_unique[users.email_address]');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // if fails
            $this->load->view('register');
        }
        else    {
            // input data

            $this->load->model('register_m');
            $this->load->register_m->RegisterUser();
            $success = "Your account has been successfully created!";
            $this->load->view('register', compact('success'));

            $result = $this->input->registerUser();

        if ($result == TRUE) {

                $data['message_display'] = 'Registration Successfully !';
                $this->load->view('login_m', $data);
         } else {
                $data['message_display'] = 'Username already exist!';
                $data['message_display'] = 'Email already exist!';
                $this->load->view('registration_form', $data);
            }
            
        }
        return $this->load->view('home/index');
    }

}