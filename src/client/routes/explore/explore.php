<?php

session_start();

include __DIR__ . '/view/PostsRenderer.php';
include __DIR__ . '/../../shared/pagination/PagesNumbers.php';

// max number of results coming from the database (when using "LIMIT $row_start, $max_results")
$max_results = 7;

$posts_renderer = new PostsRenderer();
$pages_numbers = new PagesNumbers($posts_renderer, $max_results);

// from which row of the sql table the results start (when using "LIMIT $row_start, $max_results")
$row_start = ($page_number - 1) * $max_results;

$order_by = isset($_SESSION['order_by']) ? $_SESSION['order_by'] : "DESC";

$posts_renderer->load_posts($row_start, $max_results, $order_by);

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
<link rel="stylesheet" href="css/explore_styles.css" media="all">
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
      <button class="btn btn-order-by">
        <?php
        if (strcmp($_SESSION['order_by'], "DESC") == 0 || !isset($_SESSION['order_by'])) {
          echo "Recent";
        } else {
          echo "Old";
        }
        ?> &nbsp;&nbsp;<span class="order-sign">^</span>&nbsp;</button>

      <div class="order-by-content hidden">
        <button class="btn btn-option btn-recent">Most recent</button>
        <button class="btn btn-option btn-old">Most old</button>
      </div>
    </div>

    <div class="posts-body default-border">
      <?php
      for ($i = 0; $i < $max_results; $i++) {
        if (!$posts_renderer->is_empty()) {
          $posts_renderer->render_next();
        }
      }
      ?>
    </div>

    <div class="posts-footer default-border">
      <?php
      $pages_numbers->render();
      ?>
    </div>
  </div>

  <script src="../../js/orderByButton.js"></script>
  <script src="../../js/goToCreatePost.js"></script>
  <script src="../../js/goToHome.js"></script>
  <script src="js/goToPage.js"></script>
  <script src="js/clickPost.js"></script>

  <?php
  include __DIR__ . '/../../includes/scripts.php';
  ?>
</body>

</html>