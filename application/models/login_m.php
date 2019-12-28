<?php
/**
 * Created by PhpStorm.
 * User: geraldezeude
 * Date: 27.12.2019
 * Time: 0.16
 */

    class login_m extends CI_Model
    {

    public function loginUser(object $user): ?object
    {
        $response = (object) [];
        $userExists = true;

        $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
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
    $response->email = $user->email;
    $response->error = 'Invalid username/password';
    $response->page = 'login.php';
}

return $response;
}
}