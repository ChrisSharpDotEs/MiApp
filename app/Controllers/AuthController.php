<?php
namespace MiApp\Controllers;

use MiApp\Models\User;

class AuthController extends BaseController
{
    public function __construct() {}
    public function index(){
        if (isset($_SESSION) && array_key_exists('_token', $_SESSION)) {
            header('Location: /');
            exit;
        } else {
            $data = [
                "title" => "MiApp | Home"
            ];
            return $this->view("/layouts/guest", $data);
        }
    }

    public function authorize($request) {
        $email = $request['email'];
        $password = $request['password'];

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
                $data = [
                    "title" => "MiApp | Home",
                    "page" => "welcome",
                    "message" => "¡Bienvenido " . $user->name . "!"
                ];
                $_SESSION['data'] = $data;
                $_SESSION['_token'] = bin2hex(random_bytes(32));

                header('Location: /');
                exit();
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
