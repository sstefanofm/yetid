<?php

session_start();

include __DIR__ . '/controller/posts_getter.php';

$post_id = $_GET['id'];

$post_getter = new PostsGetter();

$post = $post_getter->get_one($post_id, $_SESSION['username']);

?>

<!DOCTYPE html>
<html>

<?php
include __DIR__ . '/../../includes/head.php';
?>

<!-- My styles -->
<link rel="stylesheet" href="../../css/navbar_styles.css" media="all">
<link rel="stylesheet" href="../../css/body_styles.css" media="all">
<link rel="stylesheet" href="css/view_post_styles.css" media="all">

<body>
  <?php
  include __DIR__ . '/../../includes/navbar.php'
  ?>

  <div class="container post-container default-border">
    <div class="container post-header">
      <button class="btn btn-secondary btn-back"><i class="bi bi-arrow-left"></i></button>
      <div class="title">
        <h2><?php echo $post['title'] ?></h2>
      </div>
      <div class="options">
        <button class="btn btn-warning btn-edit"><i class="bi bi-pencil"></i></button>
        <button class="btn btn-danger btn-delete"><i class="bi bi-trash"></i></button>
      </div>
    </div>

    <div class="container post-body">
      <?php echo $post['post'] ?>
    </div>
  </div>

</body>

</html>
