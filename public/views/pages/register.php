<article class="p-4" style="width: 400px;">
    <a href="/" class="nav-link"><h1 class="fs-4 text-center"><?= $appName ?></h1></a>
    <form action="/register" method="post" id="register-form">
        <input type="hidden" name="_token" value="<?= session_id() ?>" hidden>
        <input type="text" name="auth" value="true" hidden>
        <div class="mb-3">
            <label for="nameId" class="form-label">Nombre</label>
            <input type="text" class="form-control shadow-sm" name="username" id="nameId" placeholder="Nombre de usuario" required />
        </div>
        <div class="mb-3">
            <label for="emailId" class="form-label">Email</label>
            <input type="email" class="form-control shadow-sm" name="email" id="emailId" placeholder="abc@mail.com" autocomplete="email" required />
        </div>
        <div class="mb-3">
            <label for="passwordId" class="form-label">Contraseña</label>
            <input type="password" class="form-control shadow-sm" name="password" id="passwordId" autocomplete="current-password" required />
        </div>
        <div class="mb-5">
            <label for="passwordCheckId" class="form-label">Repite la contraseña</label>
            <input type="password" class="form-control shadow-sm" name="confirmPassword" id="passwordCheckId" autocomplete="current-password" required />
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
            <label class="form-check-label" for="flexCheckDefault">
                Al marcar esta casilla confirmas haber leído nuestra <a href="/proteccion-datos">Política de protección de datos.</a>
            </label>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary rounded-0 w-100" type="submit">Registrarse</button>
        </div>
    </form>
    <div>
        <span id="passwordError" class="text-danger fw-bold"></span>
    </div>
</article>