<?php

namespace MiApp\Controllers;

use MiApp\Controllers\BaseController;
use MiApp\Models\User;

class WebController extends BaseController
{
    public function __construct() {}
    public function index()
    {
        if (isset($_SESSION) && array_key_exists('data', $_SESSION)) {
            $data = $_SESSION['data'];
            unset($_SESSION['data']);
        } else {
            $data = [
                "title" => "MiApp | Home",
                "appName" => "MiApp",
                "page" => "welcome"
            ];
        }

        return $this->view("", $data);
    }
    public function login()
    {
        if (isset($_SESSION) && array_key_exists('_token', $_SESSION)) {
            header('Location: /');
            exit;
        } else {
            $data = [
                "title" => "MiApp | Home",
                "appName" => "MiApp"
            ];
            return $this->view("/layouts/guest", $data);
        }
    }

    public function clausules() {
        $data = [
            "title" => "MiApp | Condiciones de uso",
            "appName" => "MiApp",
            "page" => "clausule"
        ];
        return $this->view("/layouts/app", $data);
    }
    public function policy() {
        $data = [
            "title" => "MiApp | Política de Cookies",
            "appName" => "MiApp",
            "page" => "cookies"
        ];
        return $this->view("/layouts/app", $data);
    }
}
