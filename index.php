<?php

use MiApp\Controllers\PostController;

//TO-DO Refactorizar

session_start();
require_once 'vendor/autoload.php';
require_once './app/Helpers/AuthManager.php';
require_once './app/Controllers/PostController.php';

$appName = "MiApp";

$authManager = new AuthManager();


$loginMessage = $authManager->getLoginMessage();
$token = $authManager->getToken();
$logoutForm = $authManager->getLogoutForm();
$dashboardLink = $authManager->getDashboardLink();
$loginButton = $authManager->getLoginButton();

$uri = $_SERVER['REQUEST_URI'];
$ruta = trim($uri, '/');
$routes = [
    "login" => "login"
];

if ($ruta == 'login') {
    $title = "$appName | Sign in";
    include './public/views/layouts/guest.php';
} elseif ($ruta == 'auth'){
    include './app/Helpers/AuthHelper.php';
} elseif ($ruta == '' ) {
    $title = "$appName | Home";
    $page = "welcome";
} elseif($ruta == 'politica-de-cookies') {
    $title = "$appName | Cookies";
    $page = "cookiepolicy";
} elseif($ruta == 'dashboard') {
    
    $pc = new PostController();
    $posts = $pc->all();
    
    $title = "$appName | Posts";
    $page = "dashboard";
} else {
    include './public/views/notfound.php';
}
if(isset($page)) include './public/views/layouts/app.php';