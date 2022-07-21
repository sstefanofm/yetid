<!DOCTYPE html>
<html lang="en">

<?php

session_start();

include __DIR__ . '/utils/renderer.php';
include __DIR__ . '/includes/head.php';

?>
<link rel="stylesheet" href="css/navbar_styles.css" media="all">
<link rel="stylesheet" href="css/body_styles.css" media="all">
<link rel="stylesheet" href="css/posts_styles.css" media="all">

<body>
  <?php
  include __DIR__ . '/includes/navbar.php';
  ?>

  <?php
  if (!$_SESSION['message_showed']) {
    render_alert($_SESSION['success'], $_SESSION['message']);
    $_SESSION['message_showed'] = true;
  }
  ?>

  <?php
  include __DIR__ . '/includes/posts.php';
  ?>

  <?php
  include __DIR__ . '/includes/scripts.php';
  ?>
</body>

</html>
