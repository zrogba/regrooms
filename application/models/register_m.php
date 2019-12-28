<?php

class Register_m extends CI_Model
{

    public function registerUser(object $user): ?object
    {
        $response = (object) [];
        $userExists = true;

        $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
        $res = $this->db->query($sql, [$user->email])->result();

        if(empty($res[0]))
            $userExists = false;

        else if(!require_password($user->password, $res[0]->password))
            $userExists = false;

        if($userExists)
        {
            $response = $res[0];
            $response->page = 'index.php';
        }
else
{
    $response->email = $user->email;
    $response->error = 'Email already exists';
    $response->page = 'register.php';
}

return $response;
}
}