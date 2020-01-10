<?php

class register_m extends CI_Model
{

    public function registerUser($user, $username, $email, $password)
    {
        $response = $this->insert->user($username, $email, $password);
        $userExists = true ['success'];

        $sql = "INSERT * INTO users(username, email, password) VALUES (?,?,?,?)";
        $res = $this->db->query($sql, [$user->email])->result();

        if(empty($res[0]))
            $userExists = false;

    else if(!require_password($user->password, $res[0]->password))
            $userExists = false;

        if($userExists)
        {
            $response = $res[0];
            $response->page = 'login_m';
        }
    else
    {
        $response->username = $user->username;
        $response->error = 'Username already exists';
        $response->email = $user->email;
        $response->error = 'Email already exists';
        $response->password2 = $user->password2;
        $response->error = 'Password must match';
        $response->page = 'register.php';
    }

    return $response;
    }
}