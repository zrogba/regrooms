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
    public function registerUser()
    {
        if (($this->input->server('REQUEST_METHOD') == 'POST')){
            $errors[] = array();
            $username = ($this->input->post['username']);
            $email = ($this->input->post['email']);

            if (empty($this->input->post[$username])){
                $errors[] = ['usernameErr' => true];

            if (empty($this->input->post[$email])){
                $errors = ['emailErr' => true];

        } else {
                $errors = ['you need to register'];
        }
            if (empty($errors));
                $this->load->view('register_m');
            }
        }
    }
    // Validate to check if user data exist
    private function user_validation()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $errors[] = ['required' => 'You must provide a Username.'];

        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[4]|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $errors[] = ['required' => 'You must provide a Email.']|['is_unique' => 'This email already exists.'];

        if ($this->form_validation->run() == FALSE) {
            // if fails
            $this->load->view('registerUser');
        } else    {
            // input data
            $this->load->view('register');
            $data = [
                'Username' => $this->input->post('username'),
                'Email' => $this->input->post('email'),
                'Password' => md5($this->input->post('password')),
            ];

            $message[] = "Your account has been successfully created!";
            $this->load->view('register', compact('success'));

            $result = $this->db->insert('users', $data);

        if ($result == TRUE) {

                $message[] = 'Registration Successfully !';
                $this->load->view('index', $data);
         } else {
                $message[] = 'Username already exist!';
                $message[] = 'Email already exist!';
                $this->load->view('register', $data);
            }

            $this->load->view('register_m');
    }

    }
}