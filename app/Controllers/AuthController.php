<?php
namespace MiApp\Controllers;

use MiApp\Models\User;

class AuthController extends BaseController
{
    public function __construct() {}
    public function index(){
        return $this->view("/pages/login");
    }

    public function authorize($email, $password) {
        $user = new User();
        $userDTO = $user->get($email, $password);
        
        if ($userDTO) {
            $hashAlmacenado = $userDTO['password'];
            if (password_verify($password, $hashAlmacenado)) {
                $user = new User($email, $password);
                $user->id = $userDTO['id'];
                $user->name = $userDTO['name'];
                $user->email = $userDTO['email'];
                $user->token = $this->generateToken();
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

    private function generateToken()
    {
        return bin2hex(random_bytes(32));
    }
}
