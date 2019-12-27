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
        $this->load->view('index.php');
    }
    public function login()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST')
        {
            return $this->loginPost();
        }
        $this->load->view('login.php');
    }

    
    private function loginPost()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        if(!$this->form_validation->run())
        {
            $data = [
                'emailErr' => true,
                'email' => $this->input->post('email')
            ];
            if(empty($this->input->post('password')))
                $data['passwordErr'] = true;

            $this->load->view('login.php', $data);
        }

        print_r([]);die();

    }

}