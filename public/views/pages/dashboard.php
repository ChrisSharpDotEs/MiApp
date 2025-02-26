<section class="container py-5">
    <h1 class="fs-4">Mis Posts</h1>
    <hr>
    <?php if (isset($posts)): ?>
        <div class="row">
            <?php foreach ($posts as $post): ?>
                <div class="col-lg-4 col-md-6 p-2">
                    <div class="border rounded p-3 h-100">
                        <?php if ($post['img_url'] != '' || $post['img_url'] != NULL): ?>
                            <img class="img-fluid rounded" src="<?= htmlspecialchars($post['img_url']) ?>" alt="Imagen de <?= htmlspecialchars($post['title']) ?>">
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
</section>