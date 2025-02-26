<header>
    <nav class="navbar navbar-expand-sm bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="#"><?= $appName ?? '' ?></a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active border-bottom" href="/" aria-current="page" data-path-item="/">Home</a>
                    </li>
                    <?= $dashboardLink ?? '' ?>
                </ul>
                <?= $logoutForm ?? ''; ?>
                <?php if (isset($_SESSION['_token'])): ?>
                    <form action="/auth" method="post">
                        <input type="hidden" name="action" value="logout" hidden>
                        <input type="hidden" name="_token" value="<?= $_SESSION['_token'] ?>" hidden>
                        <button type="submit" class="btn btn-outline-light rounded-0">Cerrar Sesión</button>
                    <?php endif ?>
                    </form>
            </div>
        </div>
    </nav>
</header>