<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>">Sports</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>">Tech</a></li>
                <?php
                if ($this->session->userdata('logged_in') == NULL) {
                ?>
                    <li class="nav-item"><a class="nav-link" href=<?= site_url('article/login') ?>>Login</a></li>
                <?php
                } else {
                ?>
                <li class="nav-item"><a class="nav-link" href=<?= site_url('article/new') ?>>Create Article</a></li>
                <li class="nav-item"><a class="nav-link" href=<?= site_url('article/logout') ?>>Logout</a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>