<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php
include __DIR__ . '/../../includes/head.php';
include __DIR__ . '/../../utils/renderer.php';
?>

<!-- My styles -->
<link rel="stylesheet" href="../../css/navbar_styles.css" media="all">
<link rel="stylesheet" href="../../css/body_styles.css" media="all">
<link rel="stylesheet" href="css/create_post_styles.css" media="all">

<body>
  <?php
  include __DIR__ . '/../../includes/navbar.php';
  ?>

  <?php
  if (!$_SESSION['message_showed']) {
    render_alert($_SESSION['success'], $_SESSION['message']);
    $_SESSION['message_showed'] = true;
  }
  ?>

  <div class="post-container default-border">
    <div class="post-options default-border">
      <button class="btn btn-colors btn-home">Home</button>
      <button class="btn btn-colors btn-explore">Explore</button>
      <button class="btn btn-add"><span class="add-sign">&nbsp;+&nbsp;</span>ADD</button>

      <!-- Using this to get the user id to upload the post to the database -->
      <p class="hidden"><?php echo $_SESSION['username'] ?></p>

      <div class="add-content hidden">
        <button class="btn btn-title">Title</button>
        <button class="btn btn-paragraph">Paragraph</button>
        <button class="btn btn-image">Image</button>
      </div>
    </div>

    <div class="post"></div>

    <div class="container container-upload">
      <button class="btn btn-upload">Upload</button>
    </div>
  </div>

  <script src="js/addButtonToggle.js"></script>
  <script src="js/addElements.js"></script>
  <script src="js/uploadPost.js"></script>
  <script src="../../js/goToHome.js"></script>
  <script src="../../js/goToExplore.js"></script>

</body>

</html>
