<article class="p-4" style="min-width: 400px;">
    <a href="/" class="nav-link"><h1 class="fs-4 text-center"><?= $appName ?></h1></a>
    <form action="/auth" method="post">
        <input type="hidden" name="_token" value="<?= session_id() ?>" hidden>
        <input type="text" name="login" value="true" hidden>
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
            <input type="password" class="form-control shadow-sm" name="passwordCheck" id="passwordCheckId" autocomplete="current-password" required />
        </div>
        <div class="mb-3">
            <button class="btn btn-primary rounded-0 w-100" type="submit">Iniciar sesión</button>
        </div>
    </form>
</article>