<?php

session_start();

include __DIR__ . '/controller/PostsGetter.php';

$post_id = $_GET['id'];

$posts_getter = new PostsGetter();

$post = $posts_getter->get_one($post_id, $_SESSION['username']);

?>

<!DOCTYPE html>
<html>

<?php
include __DIR__ . '/../../includes/head.php';
?>

<!-- My styles -->
<link rel="stylesheet" href="../../css/navbar_styles.css" media="all">
<link rel="stylesheet" href="../../css/body_styles.css" media="all">
<link rel="stylesheet" href="css/edit_post_styles.css" media="all">

<body>
  <?php
  include __DIR__ . '/../../includes/navbar.php'
  ?>

  <div class="container post-container default-border">
    <div class="container post-header">
      <button class="btn btn-secondary btn-back"><i class="bi bi-arrow-left"></i></button>
      <div class="title-container">
        <input class="post-title form-control" type="text" placeholder="Title goes here" value="<?php echo $post['title'] ?>"></input>
      </div>
      <div class="options">
        <button class="btn btn-warning btn-edit"><i class="bi bi-pencil"></i></button>
        <button class="btn btn-danger btn-delete"><i class="bi bi-trash"></i></button>
      </div>
      <div class="date">
        <?php echo $post['date'] ?>
      </div>
    </div>

    <div class="container post-body">
      <?php echo $post['content'] ?>
    </div>

    <div class="container post-footer">
      <hr>

    </div>
  </div>

  <script src="js/goBack.js"></script>
  <script src="js/edit.js"></script>
  <script src="js/deletePost.js"></script>
</body>

</html>
