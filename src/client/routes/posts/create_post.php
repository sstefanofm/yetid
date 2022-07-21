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

      <div class="add-content hidden">
        <button class="btn btn-subtitle">Subtitle</button>
        <button class="btn btn-paragraph">Paragraph</button>
      </div>
    </div>

    <div class="container post-header">
      <label class="title-label form-label" for="title">Add a title to your post</label>
      <input class="post-title input-title form-control" type="text" name="title" placeholder="The title goes here" required>
      <p class="error hidden">Title must have 5 or more characters</p>
      <hr>
    </div>

    <div class="post-body">
      <div class="input-wrapper">
        <input class="input-subtitle form-control" type="text" placeholder="Add a subtitle" required>
      </div>
      <div class="input-wrapper">
        <textarea class="textarea-content form-control" placeholder="Add your content here..." required></textarea>
      </div>

      <div class="content"></div>
    </div>

    <div class="container container-upload">
      <button class="btn btn-success btn-upload" disabled>Upload</button>
    </div>
  </div>

  <script src="js/validateTitle.js"></script>
  <script src="js/addButtonToggle.js"></script>
  <script src="js/addElements.js"></script>
  <script src="js/uploadPost.js"></script>
  <script src="../../js/goToHome.js"></script>
  <script src="../../js/goToExplore.js"></script>

</body>

</html>
