<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
    <main id="container" class="container">
        <div class="content mt-5">
        <?php echo validation_errors(); ?>
            <form action="<?= site_url('article/new');?>" method="post">
                <label for="title">Title:</label><br>
                <input class="form-control" type="text" id="title" name="title"><br>
                <label for="summary">Summary:</label><br>
                <input class="form-control" type="text" id="summary" name="summary"><br>
                <label for="content">Content:</label><br>
                <textarea class="form-control" id="content" name="content" rows="4" cols="50"></textarea><br><br>
                <input class="btn btn-primary" type="submit" value="Submit">
            </form>
        </div>
    </main>
