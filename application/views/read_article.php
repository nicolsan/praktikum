<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
    <main id="container" class="container">
        <div class="content">
            <h1 class="mt-2"><?= $article[0]["title"]?></h1>
            <p><?= $article[0]["content"]?></p>
        </div>
        <div>
            <?php
            if ($this->session->userdata('logged_in') != NULL) {
            ?>
                <a class="btn btn-secondary" href="<?= site_url('article/edit/'.$article[0]['id'])?>">Edit</a>
                <a class="btn btn-danger" href="<?= site_url('article/delete/'.$article[0]['id'])?>">Delete</a>
            <?php
            }
            ?>
        </div>
    </main>
