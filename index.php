<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
        
    <div class="wrapper1">
        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.php">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="main py-3">

            <div class="container">
                <div class="row">
                    <div class="col-md-8">

                        <?php foreach ($posts as $post) : ?>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="post/<?= $post['slug'] ?>"><?= $post['title'] ?></a></h5>
                                    <p class="card-text"><?= $post['desc'] ?></p>
                                    <a href="post/<?= $post['slug'] ?>">Go somewhere</a>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                    <div class="col-md-4">
                        <h3>Recent Posts</h3>
                        <ul class="list-group">
                            <?php foreach ($recent_posts as $recent_post) : ?>
                                <li class="list-group-item"><a href="post/<?= $recent_post['slug'] ?>"><?= $recent_post['title'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

        </main>

        <footer class="footer">
            <div class="text-bg-dark p-3 text-center">
                &copy; Copyright <?= date('Y') ?>
            </div>
        </footer>
    </div>

    <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
