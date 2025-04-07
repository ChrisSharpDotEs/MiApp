<?php

namespace MiApp\Controllers;

use MiApp\Models\User;
use MiApp\Helpers\Validator;

class RegisterController extends BaseController
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
                "page" => "register"
            ];
            return $this->view("/layouts/guest", $data);
        }
    }

    public function store($request)
    {
        $username = $request['username'];
        $email = $request['email'];
        $password = $request['password'];
        $confirmPassword = $request['confirmPassword'];

        if($password !== $confirmPassword) {
            $_SESSION['error_message'] = "Las contraseñas no coinciden.";
            header('Location: /login');
            exit(); 
        }
        $isValidEmail = Validator::validateEmail($email);
        $isValidPassword = Validator::validatePassword($password);

        if(!$isValidEmail) {
            $_SESSION['error_message'] = "El email no es válido.";
            header('Location: /login');
            exit(); 
        }
        if(!$isValidPassword){
            $_SESSION['error_message'] = "La contraseña no es válida.";
            header('Location: /login');
            exit(); 
        }

        $user = new User();
        if($user->exists($email)) {
            $_SESSION['error_message'] = "El usuario ya existe.";
            header('Location: /login');
            exit(); 
        }
        
        // Creamos el usuario
        $user->create($username, $email, $password);
        $user->_reconnect();

        //Comprobamos que se haya creado y exista
        $userDTO = $user->get($email);
        
        if($userDTO) {
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
            }
        } else {
            $_SESSION['error_message'] = "Ha ocurrido un error inesperado";
            header('Location: /login');
            exit();
        }
    }

    private function generateToken()
    {
        return bin2hex(random_bytes(32));
    }
}
