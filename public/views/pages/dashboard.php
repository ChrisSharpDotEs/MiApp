<section class="container py-5">
    <h1 class="fs-4">Panel de control</h1>
    <hr>
    <div class="row">
        <?php if (isset($posts)): ?>
            <div class="row">
                <?php foreach ($posts as $post): ?>
                    <div class="col-md-4">
                        <div class="post-panel">
                            <?php if($post['img_url'] != '' || $post['img_url'] != NULL): ?>
                            <img class="img-fluid" src="<?= htmlspecialchars($post['img_url']) ?>" alt="Imagen de <?= htmlspecialchars($post['title']) ?>">
                            <?php endif ?>
                            <div class="py-3">
                                <h3><?= htmlspecialchars($post['title']) ?></h3>
                                <p><?= htmlspecialchars($post['description']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>