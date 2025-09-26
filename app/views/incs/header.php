<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?>-<?= $text ?? '' ?></title>
        <base href="<?= PATH ?>/">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="icon" href="img/favicon.ico">
    </head>
    <body>
    <div class="wrapper">

        <header class="header">
            <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="info">Info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="posts/create">New Post</a>
                            </li>
                        </ul>

                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <?php if ( check_auth() ) : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="register"><?= $_SESSION['user']['name']; ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout">Logout</a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="register">Register</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login">Login</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?= get_alerts(); ?>
                </div>
            </div>
        </div>