<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="-">
    <title><?= $config['base']['app']['name'] ?></title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= asset('css/style.css'); ?>" rel="stylesheet">
    <meta name="theme-color" content="#7952b3">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">CRUD PHP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <?php 
                    // menampilkan menu untuk yang sudah login atau belum
                    if (is_login()) { // Apakah sudah login atau belum
                    ## MENU JIKA SUDAH LOGIN ##
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('dashboard.php') ?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('user/index.php') ?>">Pengguna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url('auth/logout.php') ?>">Logout</a>
                        </li>
                    <?php 
                    } else { // 
                    ## MENU JIKA BELUM LOGIN ##
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('auth/login.php') ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= base_url('auth/register.php') ?>">Register</a>
                        </li>
                    <?php } ?>
                    
                </ul>
            </div>
        </div>
    </nav>

    <!-- Begin page content -->
    <main class="flex-shrink-0">
        <div class="container my-5">