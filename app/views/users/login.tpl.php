<?php require VIEWS . '/incs/header.php'; ?>

<main class="main py-3">

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <p><?=$title ?></p>

                <form action="/login" method="POST">

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                        <?php if (isset($errors['email'])) : 
                            foreach ( $errors['email'] as $value ) : ?>
                            <div class="invalid-feedback d-block">
                                <?= $value ?>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                        <?php if (isset($errors['password'])) : 
                            foreach ( $errors['password'] as $value ) : ?>
                            <div class="invalid-feedback d-block">
                                <?= $value ?>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>

                    <button type="submit" class="btn btn-success">Login</button>
                </form>

            </div>
        </div>
    </div>

</main>

<?php require VIEWS . '/incs/footer.php'; ?>