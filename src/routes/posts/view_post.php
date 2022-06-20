<?php

session_start();

include __DIR__ . '/../../utils/redirect_to.php';

$post_id = isset($_GET['id']) ? $_GET['id'] : -1;

if ($_SESSION['admin']) {
  redirect_to_edit($post_id);

  die();
}

/* if not admin, then show normal post */

include __DIR__ . '/controller/PostsGetter.php';

// get post from database; 

$posts_getter = new PostsGetter();

$post = $posts_getter->get_by_id($post_id);

// render the post from its id;
?>

<!DOCTYPE html>
<html>

<?php
include __DIR__ . '/../../includes/head.php';
?>

<!-- My styles -->
<link rel="stylesheet" href="../../css/navbar_styles.css" media="all">
<link rel="stylesheet" href="../../css/body_styles.css" media="all">
<link rel="stylesheet" href="css/view_post_styles.css">

<body>
  <?php
  include __DIR__ . '/../../includes/navbar.php'
  ?>

  <div class="container post-container default-border">
    <div class="container post-header">
      <button class="btn btn-secondary btn-back"><i class="bi bi-arrow-left"></i></button>
      <div class="title-container">
        <h1 class="post-title"><?php echo $post['title'] ?></h1>
      </div>
    </div>

    <div class="date">
      <?php echo $post['date'] ?>
    </div>

    <div class="container post-body">
      <div class="container post-main-subtitle">
        <?php echo $post['main_subtitle'] ?>
      </div>

      <div class="container post-main-content">
        <?php echo $post['main_content'] ?>
      </div>

      <div class="container post-body">
        <?php echo $post['content'] ?>
      </div>
    </div>
    <div class="container post-footer">
      <hr>

    </div>
  </div>

  <script src="js/goBack.js"></script>
</body>

</html>
