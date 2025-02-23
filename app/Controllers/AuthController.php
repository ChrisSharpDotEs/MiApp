<?php
namespace MiApp\Controllers;

use MiApp\Models\User;

class AuthController 
{
    public function __construct() {}

    public function authorize($email, $password) {
        $user = new User($email, $password);
        $userDTO = $user->get();
        
        if ($userDTO) {
            $hashAlmacenado = $userDTO['password'];
            if (password_verify($password, $hashAlmacenado)) {
                $user = new User($email, $password);
                $user->name = $userDTO['name'];
                return $user;
            }
        }
        return null;
    }

    public function logout() {
        session_destroy();
        header("Location: /");
        exit();
    }
}
