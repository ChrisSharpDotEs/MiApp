<main class="jumbotron flex-fill">
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
    <section class="d-flex justify-content-center align-items-center">
        <div class="text-center py-5">
            <h1 class="display-1">¡Bienvenido!</h1>
            <p>Esta es mi aplicación de PHP</p>
            <?php if (!isset($_SESSION['_token'])): ?>
                <div><a href="/login" class="d-none btn btn-primary rounded-0 p-3">Comenzar</a></div>
            <?php endif ?>
            <div class="py-5">
                <p>
                    Esta aplicación solo es una muestra simple de mis conocimientos en PHP y JavaScript.
                </p>
                <p>
                    El proyecto sigue una estructura MVC, puede ver el código en: 
                </p>
                <a href="https://github.com/ChrisSharpDotEs/MiApp" class="btn btn-primary text-dark">Github</a>
            </div>
        </div>
    </section>
</main>