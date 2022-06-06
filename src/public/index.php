<!DOCTYPE html>
<html lang="en">

<?php

session_start();

include 'shared/view/renderer.php';
include 'shared/includes/head.php';

?>

<body>
  <a href="routes/register/register.php">Sign up</a>

  <?php
  render_alert($_SESSION['success'], $_SESSION['message']);
  session_unset();
  ?>

  <?php
  include 'shared/includes/scripts.php';
  ?>
</body>

</html>
