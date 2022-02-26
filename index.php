<?php
require('inc/connection.php');
require('inc/header.php');
require('inc/navbar.php');

if ($_SESSION['isLogin'] == false) {
    header('location: login.php');
    exit();
}

$qurey  = "SELECT id, title, created_at FROM `posts`";
$result = $con->query($qurey);

if ($result->num_rows > 0) {
    $result = $result->fetch_all(1);
}
?>

<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>All posts</h3>
                </div>
                <div>
                    <a href="create-post.php" class="btn btn-sm btn-success">Add new post</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Published At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as  $value) : ?>
                        <tr>

                            <td><?= $value['title'] ?></td>
                            <td><?= $value['created_at'] ?></td>
                            <td>
                                <a href="show-post.php?id=<?= $value['id'] ?>" class="btn btn-sm btn-primary">Show</a>
                                <a href="edit-post.php?id=<?= $value['id'] ?>" class="btn btn-sm btn-secondary">Edit</a>
                                <a href="delete-post.php?id=<?= $value['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('do you really want to delete post?')">Delete</a>
                            </td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>