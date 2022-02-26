<?php
require('inc/connection.php');
require('inc/header.php');
require('inc/navbar.php');

if (isset($_GET['id'])) {
    $git_id = $_GET['id'];
}else {
    header('location: index.php');
}
$qurey = "SELECT title, body FROM `posts` WHERE `id` = $git_id ";
$result = $con->query($qurey);
if ($result->num_rows > 0) {
    $post = $result->fetch_assoc();
}

?>

<div class="container-fluid pt-4">
    <div class="row">
        <?php if (isset($post)) : ?>

        <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3><?= $post['title'] ?></h3>
                </div>
                <div>
                    <a href="index.php" class="text-decoration-none">Back</a>
                </div>
            </div>
            <div>
                <?= $post['body'] ?>
            </div>
        </div>
        <?php else : echo "ahmed" ; endif?>
    </div>
</div>

<?php require('inc/footer.php'); ?>