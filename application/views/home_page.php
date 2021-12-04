<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
    <main id="container" class="container">
        <div class="content">
            <h1 class="mt-2">Welcome to Newsland!</h1>
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

