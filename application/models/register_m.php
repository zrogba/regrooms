<?php

class register_m extends CI_Model
{
    public function insert($data)
    {
        $data=array(
        'username' => '?', 'email'=>  '?', 'password' => '?',
    );
        $response = $this->db->insert('users', $data);

        $sql = "INSERT INTO users ('username','email','password')VALUES (?, ?, ?)";
        $res = $this->db->query($sql, $response)->result();

        if(empty($res[0]))
            $response = false;

    else if(!$res($this->$response, $res[0]->password2))
            $response = false;

        if($res)
        {
            $response = $res[0];
            $response->page = 'login_m';
        }
    else
    {
        $response->username = $data->username;
        $response->error = 'Username already exists';
        $response->email = $data->email;
        $response->error = 'Email already exists';
        $response->password = $data->Password;
        $response->error = 'Password must match';
        $response->page = 'register.php';
    }

    return $response;
    }
}