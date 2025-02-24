<?php
session_start();
require_once 'vendor/autoload.php';


$uri = $_SERVER['REQUEST_URI'];
$ruta = trim($uri, '/');

if ($ruta == 'login') {
    include './public/views/login.php';
} elseif ($ruta == 'auth'){
    include './app/Helpers/AuthHelper.php';
} elseif ($ruta == '' ) {
    include './public/views/welcome.php';
} elseif($ruta == 'politica-de-cookies') {
    include './public/views/cookypolicy.php';
} elseif($ruta == 'dashboard') {
    include './public/views/dashboard.php';
} else {
    include './public/views/notfound.php';
     // Página principal por defecto
}
?>