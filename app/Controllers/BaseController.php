<?php

namespace MiApp\Controllers;

class BaseController
{
    private $appVariables = [
        "appName" => "MiApp",
    ];

    function view($view, $data = [])
    {
        extract($this->appVariables);
        extract($data);
        if(str_contains($view, "layouts")){
            include "public/views/$view.php";
        } else {
            include 'public/views/layouts/app.php';
        }
    }
    function notfound() {
        include 'public/views/pages/notfound.php';
    }
}
