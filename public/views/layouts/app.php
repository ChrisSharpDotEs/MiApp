<?php
function isLogged()
{
    return isset($_SESSION) && array_key_exists('usuario', $_SESSION);
}
if (isLogged()) {
    $loginMessage =
        "<div class=\"container\">
            <div class=\"d-flex justify-content-between alert alert-success\" role=\"alert\">
                <div>
                    <div>
                        " . $_SESSION['message'] . "
                    </div>
                </div>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>
        </div>";

    $token = $_SESSION["_token"];
    $logoutForm =
        "<form action=\"/auth\" method=\"post\">
        <input type=\"hidden\" name=\"action\" value=\"logout\" hidden >
        <input type=\"hidden\" name=\"_token\" value=\"$token\" hidden >
        <button type=\"submit\" class=\"btn btn-outline-light rounded-0\">Cerrar Sesión</button>
    </form>";
}

if (!isLogged()) {
    $loginButton = "<div><a href=\"/login\" class=\"btn btn-primary rounded-0 p-3\">Comenzar</a></div>";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RenderApp | Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/app.css">
</head>

<body data-bs-theme="dark" style="background-color: #111;">
    <div class=" d-none modals-container">

        <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered"
                role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="aviso-cookies">
                            <h3>Política de Cookies</h3>
                            <p>
                                Este sitio web utiliza cookies propias y de terceros con las siguientes finalidades:
                            <ul>
                                <li>
                                    <strong>Cookies funcionales:</strong> Estas cookies son esenciales para el correcto
                                    funcionamiento del sitio web. Permiten recordar tus preferencias (como el idioma) y
                                    facilitan la navegación. Sin estas cookies, es posible que algunas funcionalidades
                                    no estén disponibles.
                                </li>
                                <li>
                                    <strong>Cookies analíticas:</strong> Utilizamos cookies analíticas para analizar el
                                    rendimiento del sitio web y comprender cómo interactúan los usuarios con él. Esta
                                    información nos ayuda a mejorar la experiencia del usuario, identificar áreas de
                                    mejora y optimizar el contenido.
                                </li>
                            </ul>
                            En ningún caso utilizamos cookies publicitarias o para rastrear información personal identificable.
                            Al continuar navegando por este sitio web, aceptas el uso de las cookies descritas anteriormente.
                            Puedes configurar o rechazar el uso de cookies a través de la configuración de tu navegador.
                            Sin embargo, ten en cuenta que deshabilitar las cookies funcionales puede afectar negativamente
                            la funcionalidad del sitio web.
                            <a href="/politica-de-cookies">Política de Cookies</a>.
                            </p>
                            <div class="d-flex justify-content-between gap-2">
                                <button class="btn btn-primary rounded-0" data-bs-dismiss="modal">Aceptar todas</button>
                                <button class="btn btn-primary rounded-0" data-bs-dismiss="modal">Rechazar todas</button>
                                <button class="btn btn-primary rounded-0 d-none" data-bs-dismiss="modal">Configurar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main>
        
    </main>
    <footer class="bg-dark py-3">
        <div class="container-fluid">
            <div class="d-flex flex-wrap justify-content-center align-items-center py-3 my-4 border-top">
                <div class="p-2">
                    <a href="/" class="text-decoration-none text-light">
                        <span class="">© 2025 MiApp, Test</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <script src="./public/js/app.js" type="module"></script>
</body>

</html>