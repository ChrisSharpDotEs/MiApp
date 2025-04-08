<main class="jumbotron" style="min-height: 90vh;">
    <?php include("./public/views/components/navigation.php"); ?>
    <?php if (isset($message)): ?>
        <div class="container">
            <div class="d-flex justify-content-between alert alert-success my-4" role="alert">
                <div>
                    <div>
                        <?= $message ?? '' ?>
                    </div>
                </div>
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    <?php endif ?>
    <section class="py-5">
        <div class="container">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1 class="display-1 mb-4">Trekkin & <br><span class="text-primary">Camping</span></h1>
                <p class="px-4 text-center text-secondary display-4 mb-4">Un blog para los amantes de la montaña</p>
                <?php if (!isset($_SESSION['_token'])): ?>
                    <div class="d-md-none d-block">
                        <a href="/register" class="btn btn-outline-primary p-3 mx-2">Registrarse</a>
                        <a href="/login" class="btn btn-primary p-3 mx-2 text-light">Iniciar sesión</a>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>
</main>