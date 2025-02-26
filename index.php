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
        "controller" => "WebController",
        "GET" => "login"
    ]
];
if(array_key_exists($request, $routes)) {
    $controller = $routes[$request]['controller'];
    $action = $routes[$request][$method];
} else {
    $controller = "WebController";
    $action = "notfound";
}

$controllerName = ucfirst($controller);

include('./app/Controllers/' . $controllerName . '.php');

$controllerName = "MiApp\\Controllers\\$controllerName";

$controller = new $controllerName();

$controller->$action();