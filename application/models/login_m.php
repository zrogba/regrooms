<?php

class login_m extends CI_Model
    {

    public function loginUser($user, $email, $password)
    {
        $response = $this->get->user($email, $password);
        $userExists = true;

        $sql = "SELECT * FROM users WHERE email, password = ? LIMIT 1";
        $res = $this->db->query($sql, [$user->email])->result();

        if(empty($res[0]))
            $userExists = false;

        else if(!password_verify($user->password, $res[0]->password))
            $userExists = false;

        if($userExists)
        {
            $response = $res[0];
            $response->page = 'index.php';
        }
        else
        {
            $response->email = $email->email;
            $response->error = 'Invalid Email/password';
            $response->page = 'login';
        }

        return $response = ['you are logged in'];
        }
        }