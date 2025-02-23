<?php
namespace MiApp\Controllers;

use MiApp\Models\User;

class AuthController
{
    public function __construct() {}

    public function authorize($email, $password)
    {
        $user = new User($email, $password);
        $result = $user->get();
        
        if(mysqli_num_rows($result) == 1) {
            $userDTO = mysqli_fetch_assoc($result);
            $user->name = $userDTO['name'];
            return $user;
        } else {
            return null;
        }
    }
    public function logout() {
        session_destroy();
        header("Location: /");
        exit();
    }
}
