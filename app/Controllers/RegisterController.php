<?php

namespace MiApp\Controllers;

use MiApp\Models\User;

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
    
    public function store($request) {
        print_r($request);
    }

    private function generateToken()
    {
        return bin2hex(random_bytes(32));
    }
}
