<?php

session_start();

include 'shared/view/renderer.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Yetid</title>
</head>

<body>
  <a href="routes/register/register.php">Sign up</a>

  <?php
  render_alert($_SESSION['success'], $_SESSION['message']);
  session_unset();
  ?>

</body>

</html>
