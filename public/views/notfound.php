<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiRenderApp</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/app.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Ensure body takes up full viewport height */
            margin: 0;
            /* Reset default margins */
        }

        .container {
            flex: 1;
            /* Allow container to expand to fill available space */
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Vertically center content */
            align-items: center;
            /* Horizontally center content */
            text-align: center;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .btn {
            margin-top: 1rem;
            /* Space the button a bit */
        }
    </style>
</head>

<body data-bs-theme="dark" style="background-color: #111;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>404</h1>
                <p>Oops! La página que estás buscando no existe.</p>
                <a href="/" class="text-primary">Volver a la página principal</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>