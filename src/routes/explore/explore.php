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
<link rel="stylesheet" href="../../css/posts_styles.css" media="all">
</head>

<body>
  <?php
  include __DIR__ . '/../../includes/navbar.php';
  ?>

  <div class="posts-container default-border">
    <div class="posts-header default-border">
      <button class="btn btn-colors btn-home">Home</button>
      <button class="btn btn-colors btn-explore">Explore</button>
      <?php
      if ($_SESSION['logged_in']) {
      ?>
        <button class="btn btn-colors btn-create"><span class="add-sign">[+]</span>&nbsp;Create</button>
      <?php
      }
      ?>
      <button class="btn btn-order-by">Order by &nbsp;&nbsp;<span class="order-sign">^</span>&nbsp;</button>

      <div class="order-by-content hidden">
        <button class="btn btn-option btn-recent">Most recent</button>
        <button class="btn btn-option btn-old">Most old</button>
      </div>
    </div>

    <div class="posts-body default-border">
      <?php
      for ($i = 0; $i < $max_results; $i++) {
        if (!$render_post->is_empty()) {
          $render_post->render_next();
        }
      }
      ?>
    </div>

    <div class="posts-footer default-border">
      <div class="pages-numbers">
        <?php
        if ($page_number > 1) {
          for ($i = 1; $i < $page_number; $i++) {
        ?>
            <button class="btn btn-page"><?php echo $i ?></button>
        <?php
          }
        }
        ?>
        <button class="btn btn-page current-page"><?php echo $page_number ?></button>
        <?php
        for ($i = $page_number + 1; $i < $max_pages + 1; $i++) {
        ?>
          <button class="btn btn-page"><?php echo $i ?></button>
        <?php
        }
        ?>
      </div>
    </div>
  </div>

  <script src="http://localhost/stf/yetid/src/js/orderByButton.js"></script>
  <script src="http://localhost/stf/yetid/src/js/goToCreatePost.js"></script>
  <script src="http://localhost/stf/yetid/src/js/goToPage.js"></script>
  <script src="http://localhost/stf/yetid/src/js/goToHome.js"></script>

  <?php
  include __DIR__ . '/../../includes/scripts.php';
  ?>
</body>

</html>
