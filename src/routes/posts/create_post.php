<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php
include __DIR__ . '/../../includes/head.php';
?>

<!-- My styles -->
<link rel="stylesheet" href="../../css/navbar_styles.css" media="all">
<link rel="stylesheet" href="../../css/body_styles.css" media="all">
<link rel="stylesheet" href="css/create_post_styles.css" media="all">

<body>
  <?php
  include __DIR__ . '/../../includes/navbar.php';
  ?>

  <div class="post-container default-border">
    <div class="post-options default-border">
      <button class="btn btn-add"><span class="add-sign">&nbsp;+&nbsp;</span>ADD</button>

      <div class="add-content hidden">
        <button class="btn btn-title">Title</button>
        <button class="btn btn-paragraph">Paragraph</button>
        <button class="btn btn-image">Image</button>
      </div>
    </div>

    <div class="post"></div>
  </div>

  <script src="js/addButtonToggle.js"></script>
  <script src="js/addElements.js"></script>

</body>

</html>
