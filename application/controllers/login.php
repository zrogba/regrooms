<?php
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
        $this->load->view('login');
    }
}
    function login() {

        if (($this->input->server('REQUEST_METHOD') == 'POST')) {
            $this->load->model('login_m', '$data');

            if (empty($this->input->post['email'])){
                $errors[] = ['emailErr' => true];

            if (empty($this->input->post['Password'])){
                $errors[] = ['passwordErr' => true];

                 array(
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                );
            } else{
            $message[]= "success";
            $this->login_m->validate();

            } } else {
                $errors = ['you need to register'];
            }
            if (empty($errors));
            $this->load->view('register_m');
        }
    
}

            function loginUser() {
                
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[4]|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $errors[] = ['required' => 'You must provide a Email.']|['is_unique' => 'This email already exists.'];

            if ($this->form_validation->run()) {
                // if fails
                $result = $this->login_m->loginUser($this->input->post('user.email'), $this->input->post('user.password'));
                if($result == FALSE)
                {
                // input data
                $this->load->view('login');
                array (
                    'Email' => $this->input->post('email'),
                    'Password' => md5($this->input->post('password')),
                );

                $message[] = "You have successfully logged in!";
                $this->load->view('index', compact('success'));

            }
                if ($result == TRUE) {

                    $message[] = 'logged in Successfully !';
                    $this->load->view('index');

                } else {
                    $message[] = 'Username already exist!';
                    $message[] = 'Email already exist!';
                    $this->load->view('register');
                }


}
}