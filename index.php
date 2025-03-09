<?php
session_start();
require_once 'vendor/autoload.php';
include('Routes/Router.php');
use MiApp\Routes\Router;

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();

list($controller, $action) = $router->matchRoute($request, $method);

$controllerName = ucfirst($controller);
$controllerFile = './app/Controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    include $controllerFile;
    $controllerClass = "MiApp\\Controllers\\$controllerName";
    $controllerInstance = new $controllerClass();

    $params = ($_POST && isset($_POST['login'])) ? $_POST : null;

    $controllerInstance->$action($params ?? null);
} else {
    http_response_code(404);
    echo "Controller not found.";
}
