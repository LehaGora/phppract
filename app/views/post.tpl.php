<?php require VIEWS . '/incs/header.php'; ?>

<main class="main py-3">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>
                    <?= h($post['title']) ?>
                </h1>
                <p class="mt-5">
                    <?= $post['content'] ?>
                </p>
            </div>
        </div>
    </div>

</main>

<?php require VIEWS . '/incs/footer.php'; ?>