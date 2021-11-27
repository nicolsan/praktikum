<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <style type="text/css">
        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        nav {
            background-color: #333;
            margin: 10px;
            overflow: hidden;
        }

        nav ul {
            margin: 0 15px 0 15px;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            list-style-type: none;
        }

        nav li:hover {
            background-color: #666;
        }

        nav>ul>li>a {
            color: #aaa;
            background-color: #fff0;
            display: block;
            line-height: 2em;
            padding: 0.5em 0.5em;
            text-decoration: none;
        }

        footer {
            margin: 10px;
            background-color: #26272b;
            padding: 45px 0 20px;
            font-size: 15px;
            line-height: 24px;
            color: #737373;
        }

        footer h6 {
            color: #fff;
            font-size: 16px;
            text-transform: uppercase;
            margin-top: 5px;
            letter-spacing: 2px;
        }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        .content {
            margin: 0 15px 0 15px;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="<?= base_url(); ?>">Home</a></li>
            <li><a href="<?= base_url(); ?>">Features</a></li>
            <li><a href="<?= base_url(); ?>">Sports</a></li>
            <li><a href="<?= base_url(); ?>">Tech</a></li>
            <?php
            if ($this->session->userdata('logged_in') == NULL) {
            ?>
                <li><a href=<?= site_url('article/login') ?>>Login</a></li>
            <?php
            } else {
            ?>
                <li><a href=<?= site_url('article/logout') ?>>Logout</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>

    <main id="container">
        <div class="content">
            <h1>Welcome to Newsland!</h1>
            <p>Great Stories is happening here.</p>
            <?php
            if (!isset($articles)) {
                echo "<h2>No Articles</h2>";
            } else {
                foreach ($articles as $article) {
            ?>
                    <article>
                        <h2><?= $article["title"] ?></h2>
                        <p><?= $article["summary"] ?><a href=<?= site_url('article/read/'.$article['id']) ?>>Read more. </a></p>
                    </article>
            <?php
                }
            }
            ?>
        </div>
    </main>

    <footer>
        <div class="content">
            <h6>About</h6>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer.</p>
        </div>
    </footer>

</body>

</html>