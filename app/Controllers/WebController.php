<?php
namespace MiApp\Controllers;

use MiApp\Controllers\BaseController;
use MiApp\Models\User;

class WebController extends BaseController 
{
    public function __construct() {}
    public function index() {
        $data = [
            "title" => "MiApp | Home",
            "appName" => "MiApp",
            "page" => "welcome"
        ];
        return $this->view("/pages/welcome", $data);
    }
    public function login() {
        $data = [
            "title" => "MiApp | Home",
            "appName" => "MiApp"
        ];
        return $this->view("/layouts/guest", $data);
    }

}