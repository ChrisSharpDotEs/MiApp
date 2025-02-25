
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
</head>

<body data-bs-theme="dark">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh;">
        <?= $error_message ?>
        <div class="border rounded">
            <article class="p-4">
                <h1 class="fs-4 text-center">RenderApp</h1>
                <form action="/auth" method="post">
                    <input type="text" hidden value="login" name="action">
                    <div class="mb-3">
                        <label for="emailId" class="form-label">Email</label>
                        <input type="email" class="form-control shadow-sm" name="email" id="emailId" placeholder="abc@mail.com" autocomplete="email" required />
                    </div>
                    <div class="mb-3">
                        <label for="passwordId" class="form-label">Contraseña</label>
                        <input type="password" class="form-control shadow-sm" name="password" id="passwordId" autocomplete="current-password" required />
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                    </div>
                </form>
            </article>
        </div>
    </div>
</body>

</html>