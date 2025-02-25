<?php
namespace MiApp\Helpers;
use MiApp\Controllers\AuthController;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == 'login') {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $auth = new AuthController();
    $user = $auth->authorize($email, $password);

    if ($user) {
        $_SESSION['usuario'] = $user->email;
        $_SESSION['_token'] = $user->token;
        $_SESSION['message']  = "¡Bienvenido {$user->getName()}!";
        header("Location: /");
        exit();
    } else {
        $_SESSION['error_message'] = "Usuario o contraseña incorrectos";
        header("Location: /login");
        exit();
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["action"] == 'logout' && $_POST["_token"] == $_SESSION["_token"]) {
    $auth = new AuthController();
    $auth->logout();
}