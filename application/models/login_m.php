<?php

class login_m extends CI_Model
    {

    public function login($data)
    {
        $this->db->where("email",$email);
        $this->db->where('password', $password);

        $sql = "SELECT * WHERE users WHERE email, password = ? LIMIT 1";
        $res = $this->db->query($sql, [$user->email])->result();

        if(empty($res[0]))
            $userExists = false;

        else if(!password_verify($user->password, $res[0]->password))
            $userExists = false;

        if($userExists)
        {
            $response = $res[0];
            $response->page = 'index';
        }
        else
        {
            $response->email = $email->email;
            $response->error = 'Invalid Email/password';
            $response->page = 'login';
        }

        return $response['message']= 'you are logged in';
        }
        }