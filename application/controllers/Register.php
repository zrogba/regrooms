<?php
class register extends CI_Controller
{

    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('register_m');
    }

    public function index()
    {
        $this->load->view('register.php');
    }

    public function register()
    {
        if ($this->input->server('REQUEST_METHOD') == 'post') {
            return $this->registerUser();
        }
        $this->load->view('register.php');
    }


    private function registerUser()
    {
        $this->form_validation->set_rules('user_name', 'username', 'trim|required|min_length[4]|is_unique[users.user_name]');
        $this->form_validation->set_rules('user_email', 'email', 'trim|required|min_length[4]|valid_email|is_unique[users.email_address]');
        $this->form_validation->set_rules('user_password', 'password', 'required');
        $this->form_validation->set_rules('user_password2', 'password2', 'password must match');

        if (!$this->form_validation->run()) {
            $_POST=
            $data = [
                'username'  => $this->input->post('user_name'),
                'email' => $this->input->post('user_email')

            ];
            if (empty($this->input->post('password')))
                $data['usernameErr'] = true;
                     [ 'emailErr' => true,];
                     [ 'passwordErr' => true,];
            $this->load->view('register.php');
        }

        print_r([]);
        die();

    }

}