<?php

session_start();

include '../../shared/view/renderer.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sign up to Yetid</title>
</head>

<body>
  <?php
  render_alert($_SESSION['success'], $_SESSION['message']);
  ?>

  <form action="controller/save_user.php" method="POST">
    <input type="text" name="username"> <br>
    <input type="password" name="password"> <br>
    <input type="submit" name="submit"> <br>
  </form>
</body>

</html>
