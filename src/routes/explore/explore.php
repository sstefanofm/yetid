<?php

session_start();

include __DIR__ . '/view/PostsRenderer.php';

$posts_renderer = new PostsRenderer();

$page_number = (!isset($_GET['page']) || $_GET['page'] <= 0) ? 1 : (int) $_GET['page'];

// max number of results coming from the database (when using "LIMIT $row_start, $max_results")
$max_results = 7;
// from which row of the sql table the results start (when using "LIMIT $row_start, $max_results")
$row_start = ($page_number - 1) * $max_results;

$total_posts = $posts_renderer->count_total_posts();
$max_pages = ceil($total_posts / $max_results);

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
