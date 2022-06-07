<!DOCTYPE html>
<html lang="en">

<?php

session_start();

include 'shared/view/renderer.php';
include 'shared/includes/head.php';

?>
<link rel="stylesheet" href="css/navbar_styles.css" media="all">
<link rel="stylesheet" href="css/body_styles.css" media="all">

<body>
  <?php
  include 'shared/includes/navbar.php';
  ?>

  <?php
  render_alert($_SESSION['success'], $_SESSION['message']);
  session_unset();
  ?>

  <?php
  include 'shared/includes/scripts.php';
  ?>
</body>

</html>
