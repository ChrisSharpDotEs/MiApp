<?php
session_start();
require_once 'vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$ruta = trim($uri, '/'); // Elimina las barras diagonales

if ($ruta == 'login') {
    include './public/views/login.php';
} elseif ($ruta == 'auth'){
    include './app/Helpers/AuthHelper.php';
} elseif ($ruta == '' ) {
    include './public/views/welcome.php';
} else {
    include './public/views/notfound.php';
     // Página principal por defecto
}
?>