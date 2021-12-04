<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
    <main id="container" class="container">
        <div class="content mt-5">
        <?php echo validation_errors(); ?>
            <form action="<?= site_url('article/login');?>" method="post">
                <label for="username">Username:</label><br>
                <input class="form-control" type="text" id="username" name="username"><br>
                <label for="password">Password:</label><br>
                <input class="form-control" type="password" id="password" name="password"><br>
                <input class="btn btn-primary"type="submit" value="Submit">
            </form>
        </div>
    </main>
