<?php require VIEWS . '/incs/header.php'; ?>

<main class="main py-3">

    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?= $pagination ?>

                <?php foreach ($posts as $post) : ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?= $post['id'] ?>
                            </h4>
                            <h5 class="card-title">
                                <a href="posts?id=<?= $post['id'] ?>"> <?= h($post['title']) ?> </a>
                            </h5>
                            <p class="card-text">
                                <?= $post['excerpt'] ?>
                            </p>
                            <a href="posts?id=<?= $post['id'] ?>"> Подробнее </a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?= $pagination ?>

            </div>

            <?php require VIEWS . '/incs/sidebar.php'; ?>
        </div>
    </div>

</main>

<?php require VIEWS . '/incs/footer.php'; ?>
