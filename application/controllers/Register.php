<?php
class Register extends CI_Controller
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
//        $dt = $this->home_m->getUsers();
        $this->load->view('register.php');
    }

    public function register()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            return $this->registerPost();
        }
        $this->load->view('register.php');
    }

    private function registerPost()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        if (!$this->form_validation->run()) {
            $data = [
                'emailErr' => true,
                'email' => $this->input->post('email')
            ];
            if (empty($this->input->post('password')))
                $data['passwordErr'] = true;

            $this->load->view('register.php', $data);
        }

        print_r([]);
        die();

    }

}