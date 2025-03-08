<?php
session_start();

require_once 'vendor/autoload.php';

$request = $_SERVER['REQUEST_URI'];

$method = $_SERVER['REQUEST_METHOD'];

$routes = [
    "/" => [
        "controller" => "WebController",
        "GET" => "index"
    ],
    "/login" => [
        "controller" => "AuthController",
        "GET" => "index",
        "POST" => "authorize"
    ],
    "/logout" => [
        "controller" => "AuthController",
        "POST" => "logout"
    ],
    "/register" => [
        "controller" => "RegisterController",
        "GET" => "index"
    ],
    "/posts" => [
        "controller" => "PostController",
        "GET" => "index"
    ]
];
if (array_key_exists($request, $routes)) {
    $controller = $routes[$request]['controller'];
    $action = $routes[$request][$method];

    if (isset($_POST) && array_key_exists('login', $_POST)) {
        $params = $_POST;
    }
} else {
    $controller = "WebController";
    $action = "notfound";
}

$controllerName = ucfirst($controller);

include('./app/Controllers/' . $controllerName . '.php');

$controllerName = "MiApp\\Controllers\\$controllerName";

$controller = new $controllerName();

$controller->$action($params ?? NULL);
