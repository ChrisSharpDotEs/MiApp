<?php

namespace MiApp\Controllers;

use MiApp\Models\User;

class AuthController extends BaseController
{
    public function __construct() {}
    public function index()
    {
        if (isset($_SESSION) && array_key_exists('_token', $_SESSION)) {
            header('Location: /');
            exit;
        } else {
            $data = [
                "title" => "MiApp | Home",
                "page" => "login"
            ];
            return $this->view("/layouts/guest", $data);
        }
    }

    public function store($request) {
        print_r($request);
    }
    public function authorize($request)
    {
        $email = $request['email'];
        $password = $request['password'];

        $user = new User();
        $userDTO = $user->get($email, $password);

        if ($userDTO) {
            $user = User::getUser($userDTO);
            $hashAlmacenado = $userDTO['password'];
            if (password_verify($password, $hashAlmacenado)) {
                $data = [
                    "title" => "MiApp | Home",
                    "page" => "welcome",
                    "message" => "¡Bienvenido " . $userDTO['name'] . "!"
                ];
                $_SESSION['data'] = $data;
                $_SESSION['user_id'] = $userDTO['id'];
                $_SESSION['_token'] = bin2hex(random_bytes(32));

                $user->setToken($_SESSION['_token']);
                header('Location: /');
                exit();
            } else {
                $_SESSION['error_message'] = "Datos incorrectos.";
                header('Location: /login');
                exit();
            }
        } else {
            $_SESSION['error_message'] = "Ha ocurrido un error inesperado";
            header('Location: /login');
            exit();
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
        exit();
    }

    private function generateToken()
    {
        return bin2hex(random_bytes(32));
    }
}
