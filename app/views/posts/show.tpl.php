<?php require VIEWS . '/incs/header.php'; ?>

<main class="main py-3">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5>
                    <?= h($post['id']) ?>
                </h5>
                <h1>
                    <?= h($post['title']) ?>
                </h1>
                <p class="mt-5">
                    <?= $post['content'] ?>
                </p>
                <form action="/posts" method="POST">
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="id" value="<?= $post['id'] ?>">
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>

</main>

<?php require VIEWS . '/incs/footer.php'; ?>