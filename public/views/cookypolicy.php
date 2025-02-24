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

<body data-bs-theme="dark">
    <header>
        <nav class="navbar navbar-expand-sm bg-transparent">
            <div class="container">
                <a class="navbar-brand" href="/">RenderApp</a>
                <button
                    class="navbar-toggler d-lg-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="/" aria-current="page">Home<span class="visually-hidden">(current)</span></a>
                        </li>
                    </ul>
                    <?= $logoutForm ?? ''; ?>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="py-5" id="ContentDetail">
            <div class="container">
                <article>
                    <h1 id="h1Title">Política de cookies</h1>
                    <hr>
                    <p>
                        Este sitio utiliza cookies para facilitar la navegación y crear estadísticas de uso de esta web.
                    </p>
                </article>
            </div>
            <div class="container">
                <div id="MainContent" class="column-content colum-content-news">
                    <article class="py-3">
                        <h2>Qué son las cookies</h2>
                        <p>
                            Las cookies son pequeños bloques de datos enviados por los servidores web y que se almacenan en su
                            navegador para posteriormente ser leídos o actualizados por dichos servidores y que juegan un papel
                            importante para el funcionamiento de un Portal permitiendo, por ejemplo, conocer los hábitos de
                            navegación de un usuario y, de esta forma, ofrecerle un mejor servicio.
                        </p>
                        <p>En ningún caso esta Web podrá modificar cookies enviadas por otros servidores.</p>
                    </article>
                    <article class="py-3">
                        <h2>Cookies utilizadas en esta web</h2>
                        <p>
                            Este sitio web utiliza <strong>cookies propias</strong>, para facilitar la navegación por nuestra Web,
                            <strong>y cookies de terceros</strong> para la elaboración de estadísticas de uso del mismo.
                        </p>
                        <p>Estas son las cookies utilizadas en este sitio web:</p>
                        <ul>
                            <li>
                                Cookies propias de personalización y técnicas, exceptuadas de las obligaciones del artículo 22.2
                                de la LSSI
                                <ul>
                                    <li>lang: identifica el idioma de navegación elegido por el usuario.</li>
                                    <li>CONSENT: indica la aceptación de la política de cookies de este Portal.</li>
                                </ul>
                            </li>
                            <li>Cookies de terceros. Cookies analíticas:
                                <ul>
                                    <li>
                                        Google Analytics (_ga,_gid, _gat, _gali). Utilizadas para elaborar estadísticas
                                        de uso de la web
                                        (véase <a href="https://support.google.com/analytics/answer/11397207"
                                            title="Uso de Cookies para Google Analytics 4">
                                            <span>política de cookies</span></a>)
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </article>
                    <article class="py-3">
                        <h2>Aceptación de la política de cookies</h2>
                        <p>
                            Este sitio web asume que acepta el uso de cookies para navegar por el mismo.
                        </p>
                        <p>
                            Este sitio web contiene enlaces a sitios web de terceros cuyas políticas de privacidad son
                            ajenas a nuestra Web. Al acceder a tales sitios web usted puede decidir si acepta sus políticas
                            de privacidad y de cookies.
                        </p>
                        <p>
                            El usuario tiene la posibilidad de configurar su navegador para ser avisado en pantalla de la
                            recepción de cookies y para impedir la instalación de cookies en su disco duro. Por favor,
                            consulte las instrucciones y manuales de su navegador para ampliar esta información.
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </main>
    <script src="./public/js/app.js" type="module"></script>
</body>

</html>