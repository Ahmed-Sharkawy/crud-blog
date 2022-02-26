<?php
require('inc/connection.php');
require('inc/header.php');
require('inc/navbar.php');

if ($_SESSION['isLogin'] == false) {
    header('location: login.php');
    exit();
}
?>

<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>Add new post</h3>
                </div>
                <div>
                    <a href="index.php" class="text-decoration-none">Back</a>
                </div>
            </div>
            <?php if (! empty($_SESSION['errors'])) : ?>
            <div class="alert alert-danger">
                <?php foreach ($_SESSION['errors'] as $errors) : ?>
                    <p><?=$errors?></p>
                <?php endforeach ?>
            </div>
            <?php endif; unset($_SESSION['errors']) ?>
            <form method="POST" action="store-post.php">

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control" id="body" name="body" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>