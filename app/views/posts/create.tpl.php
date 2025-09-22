<?php require VIEWS . '/incs/header.php'; ?>

<main class="main py-3">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-5">
                    <?= $title ?>
                </h1>
                <form action="/posts" method="POST">

                    <div class="mb-3">
                        <label for="title" class="form-label">Post title</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Post title" value="<?= old('title') ?>">
                        <?php if (isset($errors['title'])) : 
                            foreach ( $errors['title'] as $value ) : ?>
                            <div class="invalid-feedback d-block">
                                <?= $value ?>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="Excerpt" class="form-label">Excerpt</label>
                        <textarea name="excerpt" class="form-control" id="Excerpt" rows="2" placeholder="Post excerpt"><?= old('excerpt') ?></textarea>
                        <?php if (isset($errors['excerpt'])) : 
                            foreach ( $errors['excerpt'] as $value ) : ?>
                            <div class="invalid-feedback d-block">
                                <?= $value ?>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="Content" class="form-label">Content</label>
                        <textarea name="content" class="form-control" id="Content" rows="3" placeholder="Post content"><?= old('content') ?></textarea>
                        <?php if (isset($errors['content'])) : 
                            foreach ( $errors['content'] as $value ) : ?>
                            <div class="invalid-feedback d-block">
                                <?= $value ?>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>

                    <button type="submit" class="btn btn-success">Create</button>
                </form>
            </div>
        </div>
    </div>

</main>

<?php require VIEWS . '/incs/footer.php'; ?>