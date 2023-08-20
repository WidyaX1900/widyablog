<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>addcss/home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>addcss/navbar.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>addcss/blog.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top navbar-light">
        <div class="container-fluid navbar-left">
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <h2>Widya Blog</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse px-4 navbar-right" id="navbarNav">
            <ul class="navbar-nav d-flex justify-content-between">
                <?php if ($page === 'home') : ?>
                    <li class=" nav-item">
                        <a class="nav-link active fw-bold" aria-current="page" href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url(); ?>blog/">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                <?php elseif ($page === 'blog') : ?>
                    <li class=" nav-item">
                        <a class="nav-link" aria-current="page" href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="<?= base_url(); ?>blog/">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                <?php else : ?>
                    <li class=" nav-item">
                        <a class="nav-link" aria-current="page" href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item active fw-bold">
                        <a class="nav-link" href="#">About</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        </div>
    </nav>