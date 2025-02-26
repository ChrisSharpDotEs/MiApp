<section class="text-center text-light py-5">
    <h1 class="display-1">¡Bienvenido!</h1>
    <p>Esta es mi aplicación de PHP</p>
    <?php if(!isset($_SESSION['_token'])): ?>
    <div><a href="/login" class="btn btn-primary rounded-0 p-3">Comenzar</a></div>
    <?php endif ?>
    <div class="py-5">
        <p>
            Esta aplicación solo es una muestra simple de mis conocimientos en PHP y JavaScript.
        </p>
    </div>
</section>