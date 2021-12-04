<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
    <main id="container" class="container">
        <div class="content mt-5">
        <?php echo validation_errors(); ?>
            <form action="<?= site_url('article/edit/'.$article[0]['id']);?>" method="post">
                <input type="hidden" id="id" name="id" value="<?= $article[0]['id']?>"><br>
                <label for="title">Title:</label><br>
                <input class="form-control" type="text" id="title" name="title" value="<?= $article[0]['title']?>"><br>
                <label for="summary">Summary:</label><br>
                <input class="form-control" type="text" id="summary" name="summary" value="<?= $article[0]['summary']?>"><br>
                <label for="content">Content:</label><br>
                <textarea id="content" name="content" rows="4" cols="50"><?= $article[0]['content']?>"</textarea><br><br>
                <input class="btn btn-primary" type="submit" value="Submit">
            </form>
        </div>
    </main>

    <footer>
        <div class="content">
            <h6>About</h6>
            <p>Copyright 2021. Nicolas Sanjaya</p>
        </div>
    </footer>

</body>

</html>